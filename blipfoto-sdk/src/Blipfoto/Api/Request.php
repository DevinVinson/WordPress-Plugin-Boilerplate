<?php

namespace wbp_Blipfoto\Api;

use wbp_Blipfoto\wpb_Api\wpb_Client;
use wbp_Blipfoto\wpb_Api\wpb_File;
use wbp_Blipfoto\wpb_Api\wpb_Response;
use wbp_Blipfoto\wpb_Exceptions\wpb_NetworkException;
use wbp_Blipfoto\wpb_Traits\wpb_Helper;

class wpb_Request {

	use wpb_Helper;

	protected $client;
	protected $method;
	protected $resource;
	protected $params;
	protected $files;
	protected $curl;
	protected $headers;

	/**
	 * Create new Client instance.
	 *
	 * @param Client $client
	 * @param string $method (optional)
	 * @param string $resource (optional)
	 * @param array $params (optional)
	 * @param array $files (optional)
	 */
	public function __construct(Client $client, $method = 'GET', $resource = null, array $params = [], array $files = []) {
		$this->client = $client;
		$this->method($method);
		$this->resource($resource);
		$this->params($params);
		$this->files($files);
		$this->headers = [];
	}

	/**
	 * Get and optionally set the method.
	 *
	 * @param string $method (optional)
	 * @return string
	 */
	public function method() {
		return $this->getset('method', func_get_args());
	}

	/**
	 * Get and optionally set the resource.
	 *
	 * @param string $resource (optional)
	 * @return string
	 */
	public function resource() {
		return $this->getset('resource', func_get_args());
	}

	/**
	 * Get and optionally set the params.
	 *
	 * @param array $params (optional)
	 * @return string
	 */
	public function params() {
		return $this->getset('params', func_get_args());
	}

	/**
	 * Get and optionally set an array of files to be uploaded.
	 *
	 * @param array $files (optional)
	 * @return array
	 */
	public function files() {
		return $this->getset('files', func_get_args());
	}

	/**
	 * Get and optionally set a header.
	 *
	 * @param string $name
	 * @param mixed $value (optional)
	 * @return mixed
	 */
	public function header() {
		$args = func_get_args();
		$name = $args[0];
		if (count($args) == 2) {
			$this->headers[$name] = $args[1];
		}
		return $this->headers[$name];
	}

	/**
	 * Get the curl handle.
	 *
	 * @return resource|null
	 */
	public function curl() {
		return $this->curl;
	}

	/**
	 * Return the request url.
	 *
	 * @return string
	 */
	public function url() {
		$url = $this->client->endpoint() . $this->resource . '.json';
		if (in_array($this->method, ['GET', 'DELETE']) && $this->params !== null) {
			$url .= '?' . http_build_query($this->params);
		}
		return $url;
	}

	/**
	 * Make a request and return the response data if successful.
	 *
	 * @return Response
	 * @throws NetworkException
	 */
	public function send() {
		
		$url = $this->url();

		// Set fields for post or put requests.
		$this->curl = curl_init();
		curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, $this->method);
		if (in_array($this->method, ['POST', 'PUT'])) {
			$this->buildBody();
		} else {
			$this->header('Content-Type', null);
		}
		curl_setopt($this->curl, CURLOPT_URL, $url);
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);

		// Capture rate limit response headers.
		$rate_limit = [];
		curl_setopt($this->curl, CURLOPT_HEADERFUNCTION, function ($curl, $header) use (&$rate_limit) {
			$parts = explode(':', trim($header), 2);
			if (isset($parts[1]) && preg_match('/^X-RateLimit-(.*)/', $parts[0], $match)) {
				$rate_limit[$match[1]] = (int) $parts[1];
			}
			return strlen($header);
		});

		// Set authorization.
		$access_token = $this->client->accessToken();
		if ($access_token === null) {
			$this->setBearerToken($this->client->id());
		} else {
			$this->setBearerToken($access_token);
		}

		// Add headers.
		$headers = [];
		foreach ($this->headers as $name => $value) {
			if ($value !== null) {
				$headers[] = $name . ': ' . $value;
			}
			curl_setopt($this->curl, CURLOPT_HTTPHEADER, $headers);
		}

		// Allow the client to access the request before it is sent.
		$before = $this->client->before();
		if (is_callable($before)) {
			$before($this);
		}

		// Get response,
		$body = @curl_exec($this->curl);

		// Allow the client to access the request after it is sent.
		$after = $this->client->after();
		if (is_callable($after)) {
			$after($this);
		}

		// Get status and error info before closing the handle.
		$http_status = curl_getinfo($this->curl, CURLINFO_HTTP_CODE);
		$error_code = curl_errno($this->curl);
		$error_message = curl_error($this->curl);
		@curl_close($this->curl);

		// Check for curl error.
		if ($error_code > 0) {
			throw new NetworkException($error_message, $error_code);
		}

		return new Response($body, $http_status, $rate_limit);
	}

	/**
	 * Set the bearer token for authorization.
	 *
	 * @param string $token
	 **/
	protected function setBearerToken($token) {
		$this->header('Authorization', 'Bearer ' . $token);
	}

	/**
	 * Build the request body.
	 */
	protected function buildBody() {
		
		// If we are uploading files, we have to build the request body manually since the stupid syntax for file uploads
		// will break non-file values beginning with '@'. When we no longer support PHP 5.4 we can just turn this syntax off
		// and use CurlFile.

		if (count($this->files())) {
			$body = [];
			foreach ($this->params as $key => $value) {
				$body[] = implode("\r\n", ["Content-Disposition: form-data; name=\"{$key}\"", "", $value]);
			}
			foreach ($this->files as $key => $path) {
				$file = new File($path);
				$body[] = implode("\r\n", ["Content-Disposition: form-data; name=\"{$key}\"; filename=\"{$file->name()}\"", "Content-Type: application/octet-stream", "", $file->contents()]);
			}

			do {
				$boundary = "---------------------" . md5(mt_rand() . microtime());
			} while (preg_grep("/{$boundary}/", $body));
			foreach ($body as $i => $part) {
				$body[$i] = "--{$boundary}\r\n" . $part;
			}
			$body[] = "--{$boundary}--";
			$body[] = "";

			curl_setopt($this->curl, CURLOPT_POSTFIELDS, implode("\r\n", $body));
			$this->header('Content-Type', 'multipart/form-data; boundary=' . $boundary);
		} else {
			curl_setopt($this->curl, CURLOPT_POSTFIELDS, http_build_query($this->params));
			$this->header('Content-Type', 'application/x-www-form-urlencoded');
		}
	}

}
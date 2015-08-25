<?php

namespace wbp_Blipfoto\Api;

use wbp_Blipfoto\wpb_Exceptions\wpb_ApiResponseException;
use wbp_Blipfoto\wpb_Exceptions\wpb_InvalidResponseException;
use wbp_Blipfoto\wpb_Exceptions\wpb_OAuthException;
use wbp_Blipfoto\wpb_Traits\wpb_Helper;

class wpb_Response {

//	use Helper;

	protected $body;
	protected $http_status;
	protected $rate_limit;

	/**
	 * Construct a new reponse.
	 *
	 * @param string $raw_body
	 * @param integer $http_status (optional)
	 * @param array $rate_limit (optional)
	 * @throws InvalidResponseException
	 */
	public function __construct($raw_body, $http_status = 200, $rate_limit = []) {

		// check status
		if ($http_status != 200) {
			throw new InvalidResponseException(sprintf('API returned a %d HTTP status.', $http_status), 1);
		}

		$decoded = @json_decode($raw_body, true);
		if (!is_array($decoded)) {
			throw new InvalidResponseException('API returned a malformed response.', 2);
		}

		$this->body = $decoded;
		$this->http_status = $http_status;
		$this->rate_limit = $rate_limit;

		$error = $this->error();
		if ($error !== null) {
			if ($error['code'] >= 30 && $error['code'] <= 35) {
				throw new OAuthException($error['message'], $error['code']);
			} else {
				throw new ApiResponseException($error['message'], $error['code']);
			}
		}
	}

	/**
	 * Get the http status code.
	 *
	 * @return integer
	 */
	public function httpStatus() {
		return $this->http_status;
	}

	/**
	 * Return the response's error, or null.
	 *
	 * @return array|null
	 */
	public function error() {
		return $this->body['error'];
	}

	/**
	 * Return the response's data, a key from the data, or null if the data or key does not exist.
	 *
	 * @param string $key (optional)
	 * @return mixed
	 */
	public function data($key = null) {
		$data = $this->body['data'];
		if ($key !== null) {
			foreach (explode('.', $key) as $part) {
				if (isset($data[$part])) {
					$data = $data[$part];
				} else {
					$data = null;
					break;
				}
			}
		}
		return $data;
	}

	/**
	 * Return the response's rate limit info array, a key from the array, or null if the info or key does not exist.
	 *
	 * @param string $key (optional)
	 * @return mixed
	 */
	public function rateLimit($key = null) {
		return $key ? (isset($this->rate_limit[$key]) ? $this->rate_limit[$key] : null) : $this->rate_limit;
	}

}

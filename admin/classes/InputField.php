<?php

namespace Admin\Inputs;

class InputField {
	protected $post_id;
	protected $input_type;
	protected $input_key;
	protected $title;
	protected $css_classes;
	protected $meta_key;
	protected $meta_value;

	/**
	 * InputField constructor.
	 *
	 * @param string $post_id Corresponding WP_Post ID to save meta against.
	 * @param string $input_type HTML Input Type
	 * @param string $input_key Unique ID/Name for this Input Field.
	 * @param string $title Text to be displayed in the label for this Input field.
	 * @param array $css_classes CSS Classes to be appended to the input field wrapper.
	 */
	public function __construct(
		string $post_id,
		string $input_type,
		string $input_key,
		string $title,
		array $css_classes = []
	) {
		$this->post_id    = $post_id;
		$this->input_type = $input_type;
		$this->input_key  = $input_key;
		$this->title      = $title;


		$this->css_classes = array_unique(
			array_merge(
				$css_classes,
				[
					'input_field',
					$input_type,
					$input_key,
				]
			)
		);

		$this->meta_key   = "_$input_key";
		$this->update_field_value();
	}

	/**
	 * Save this field's &_POST submitted meta to the database.
	 * Removes the corresponding meta if the submitted value is empty.
	 *
	 * @return bool True if meta is created/updated/deleted successfully. False if the corresponding step fails.
	 */
	public function save_field_value(): bool {
		$success     = true;
		$meta_exists = metadata_exists( 'post', $this->post_id, $this->meta_key );

		if (
			array_key_exists( $this->input_key, $_POST )
			&& $_POST[ $this->input_key ] !== ''
		) {
			$success = update_post_meta(
				$this->post_id,
				$this->meta_key,
				$_POST[ $this->input_key ]
			);
		} elseif ( $meta_exists ) {
			$success = delete_post_meta(
				$this->post_id,
				$this->meta_key
			);
		}

		return $success;
	}

	/**
	 * Update the meta value saved for this input field from the database.
	 */
	public function update_field_value(): void {
		$this->meta_value = get_post_meta( $this->post_id, $this->meta_key, true );
	}

	/**
	 * Concatenates the provided array and this object's default CSS classes. Removes duplicate CSS Classes.
	 *
	 * @param array $additional_classes Classes to be added in addition to this object's CSS Classes.
	 *
	 * @return string The space-separate merged arrays as a string.
	 */
	public function concat_css_classes( array $additional_classes = [] ): string {
		return implode( ' ', $additional_classes ) . ' ' . implode( ' ', $this->css_classes );
	}

	/**
	 * Retrieves the key used for handling this object's fields.
	 *
	 * @return string
	 */
	public function get_input_key(): string {
		return $this->input_key;
	}

	/**
	 * Get from the object the value retrieved from the database.
	 * The meta_value is only retrieved when the function update_field_value() is called.
	 *
	 * @return string This field's meta value.
	 */
	public function get_meta_value(): string {
		return $this->meta_value;
	}
}
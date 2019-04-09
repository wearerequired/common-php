<?php
/**
 * PostMeta class
 *
 * @since 1.0.0
 *
 * @package Required\Common
 */

namespace Required\Common;

use Required\Common\Contracts\Registrable;

/**
 * Class used to implement post meta.
 *
 * @since 1.0.0
 */
abstract class PostMeta implements Registrable {

	/**
	 * Post meta key.
	 */
	public const KEY = null;

	/**
	 * Registers the object.
	 *
	 * @since 1.0.0
	 *
	 * @return bool Whether the post meta was registered successfully.
	 */
	public function register(): bool {
		return register_post_meta(
			$this->post_type(),
			static::KEY,
			$this->get_args()
		);
	}

	/**
	 * Gets post meta arguments for this post meta object.
	 *
	 * @since 1.0.0
	 *
	 * @see register_meta() For the supported arguments.
	 *
	 * @return array Post meta arguments.
	 */
	protected function get_args(): array {
		return [
			'type'              => $this->type(),
			'description'       => $this->description(),
			'single'            => $this->is_single(),
			'sanitize_callback' => [ $this, 'sanitize' ],
			'auth_callback'     => [ $this, 'auth' ],
			'show_in_rest'      => $this->show_in_rest(),
		];
	}

	/**
	 * The post type to register a meta key for.
	 *
	 * Pass an empty string to register the meta key across all existing post types.
	 *
	 * @since 1.0.0
	 *
	 * @return string Post type to register a meta key for.
	 */
	protected function post_type(): string {
		return '';
	}

	/**
	 * The type of data associated with this meta key.
	 *
	 * Valid values are 'string', 'boolean', 'integer', and 'number'.
	 *
	 * @since 1.0.0
	 *
	 * @return string Type of the data.
	 */
	protected function type(): string {
		return 'string';
	}

	/**
	 * A description of the data attached to this meta key.
	 *
	 * @since 1.0.0
	 *
	 * @return string Description of the data.
	 */
	protected function description(): string {
		return '';
	}

	/**
	 * Whether the user is allowed to edit meta.
	 *
	 * @since 1.0.0
	 *
	 * @param bool   $allowed   Whether the user can add the post meta. Default false.
	 * @param string $meta_key  The meta key.
	 * @param int    $object_id Object ID.
	 * @param int    $user_id   User ID.
	 * @param string $cap       Capability name.
	 * @param array  $caps      User capabilities.
	 * @return bool True if the key is protected, false otherwise.
	 */
	public function auth( $allowed, $meta_key, $object_id, $user_id, $cap, $caps ): bool { // phpcs:ignore VariableAnalysis.CodeAnalysis.VariableAnalysis.UnusedVariable
		return is_protected_meta( $meta_key, 'post' );
	}

	/**
	 * Sanitization of the post meta data.
	 *
	 * @since 1.0.0
	 *
	 * @param mixed  $meta_value      Meta value to sanitize.
	 * @param string $meta_key        Meta key.
	 * @param string $object_type     Object type.
	 * @return mixed Sanitized meta value.
	 */
	public function sanitize( $meta_value, $meta_key, $object_type ) { // phpcs:ignore VariableAnalysis.CodeAnalysis.VariableAnalysis.UnusedVariable
		return $meta_value;
	}

	/**
	 * Whether the meta key has one value per object, or an array of values per object.
	 *
	 * @since 1.0.0
	 *
	 * @return bool Whether the meta key has one value per object.
	 */
	protected function is_single(): bool {
		return false;
	}

	/**
	 * Whether data associated with this meta key can be considered public.
	 *
	 * @since 1.0.0
	 *
	 * @return bool Whether the data is public.
	 */
	protected function show_in_rest(): bool {
		return false;
	}
}

<?php
/**
 * PostMeta class
 *
 * @since 0.1.0
 */

declare( strict_types=1 );

namespace Required\Common;

use Required\Common\Args\PostMeta as PostMetaArgs;
use Required\Common\Contracts\PostMeta as PostMetaInterface;
use Required\Common\Contracts\Registrable;

/**
 * Class used to implement post meta.
 *
 * @since 0.1.0
 */
abstract class PostMeta implements Registrable, PostMetaInterface {

	/**
	 * Post meta key.
	 */
	public const KEY = null;

	/**
	 * Registers the object.
	 *
	 * @since 0.1.0
	 *
	 * @return bool Whether the post meta was registered successfully.
	 */
	public function register(): bool {
		return register_post_meta(
			$this->post_type(),
			static::KEY,
			$this->get_args()->toArray()
		);
	}

	/**
	 * Gets post meta arguments for this post meta object.
	 *
	 * @since 0.1.0
	 *
	 * @see register_meta() For the supported arguments.
	 *
	 * @return \Required\Common\Args\PostMeta Post meta arguments.
	 */
	protected function get_args(): PostMetaArgs {
		$args = new PostMetaArgs();

		$args->type              = $this->type();
		$args->description       = $this->description();
		$args->single            = $this->is_single();
		$args->default           = $this->default();
		$args->sanitize_callback = [ $this, 'sanitize' ];
		$args->auth_callback     = [ $this, 'auth' ];
		$args->show_in_rest      = $this->show_in_rest();

		return $args;
	}

	/**
	 * The post type to register a meta key for.
	 *
	 * Pass an empty string to register the meta key across all existing post types.
	 *
	 * @since 0.1.0
	 *
	 * @return string Post type to register a meta key for.
	 */
	protected function post_type(): string {
		return '';
	}

	/**
	 * The type of data associated with this meta key.
	 *
	 * Valid values are 'string', 'boolean', 'integer', 'number', 'array', and 'object'.
	 *
	 * @since 0.1.0
	 *
	 * @return string Type of the data.
	 */
	protected function type(): string {
		return PostMetaArgs::TYPE_STRING;
	}

	/**
	 * A description of the data attached to this meta key.
	 *
	 * @since 0.1.0
	 *
	 * @return string Description of the data.
	 */
	protected function description(): string {
		return '';
	}

	/**
	 * Whether the meta key has one value per object, or an array of values per object.
	 *
	 * @since 0.1.0
	 *
	 * @return bool Whether the meta key has one value per object.
	 */
	protected function is_single(): bool {
		return false;
	}

	/**
	 * The default value if no value has been set yet.
	 *
	 * @since 0.1.0
	 *
	 * @return mixed The default value.
	 */
	protected function default() {
		return '';
	}

	/**
	 * Sanitization of the post meta data.
	 *
	 * @since 0.1.0
	 *
	 * @param mixed  $meta_value      Meta value to sanitize.
	 * @param string $meta_key        Meta key.
	 * @param string $object_type     Object type.
	 * @return mixed Sanitized meta value.
	 */
	public function sanitize( $meta_value, string $meta_key, string $object_type ) { // phpcs:ignore VariableAnalysis.CodeAnalysis.VariableAnalysis.UnusedVariable
		return $meta_value;
	}

	/**
	 * Whether the user is allowed to edit meta.
	 *
	 * @since 0.1.0
	 *
	 * @param bool     $allowed   Whether the user can add the post meta. Default false.
	 * @param string   $meta_key  The meta key.
	 * @param int      $object_id Object ID.
	 * @param int      $user_id   User ID.
	 * @param string   $cap       Capability name.
	 * @param string[] $caps      User capabilities.
	 * @return bool False if the key is protected, true otherwise.
	 */
	public function auth( bool $allowed, string $meta_key, int $object_id, int $user_id, string $cap, array $caps ): bool { // phpcs:ignore VariableAnalysis.CodeAnalysis.VariableAnalysis.UnusedVariable
		return ! is_protected_meta( $meta_key, 'post' );
	}

	/**
	 * Whether data associated with this meta key can be considered public and
	 * should be accessible via the REST API.
	 *
	 * When registering complex meta values this argument may optionally be an
	 * array with 'schema' or 'prepare_callback' keys instead of a boolean.
	 *
	 * @since 0.1.0
	 *
	 * @return bool|array{
	 *     schema: mixed[],
	 *     prepare_callback: callable(mixed,\WP_REST_Request,mixed[]): mixed,
	 * }
	 */
	protected function show_in_rest() {
		return false;
	}
}

<?php
/**
 * PostType class
 *
 * Deprecated: Use Required\Common\PostType instead.
 *
 * @since 0.3.1
 */

namespace Required\Common\Legacy;

use Required\Common\Contracts\PostType as PostTypeInterface;
use Required\Common\Contracts\Registrable;

/**
 * Class used to implement custom post types.
 *
 * @since 0.1.0
 */
abstract class PostType implements Registrable, PostTypeInterface {

	public const NAME = 'post';

	/**
	 * Creates a post type object.
	 *
	 * @since 0.1.0
	 *
	 * @return bool Whether the post type was registered successfully.
	 */
	public function register(): bool {
		if ( ! post_type_exists( static::NAME ) ) {
			$post_type = register_post_type(
				static::NAME,
				$this->get_args()
			);
			return ! is_wp_error( $post_type );
		}

		return true;
	}

	/**
	 * Gets post type arguments for this post type object.
	 *
	 * @since 0.1.0
	 *
	 * @return array Post type arguments.
	 */
	abstract protected function get_args(): array;
}

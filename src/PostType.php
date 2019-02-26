<?php
/**
 * PostType class
 *
 * @since 1.0.0
 */

namespace Required\Common;

use Required\Common\Contracts\Registrable;

/**
 * Class used to implement custom post types.
 *
 * @since 1.0.0
 */
abstract class PostType implements Registrable {

	/**
	 * Creates a post type object.
	 *
	 * @since 1.0.0
	 *
	 * @return bool Whether the post type was registered successfully.
	 */
	public function register(): bool {
		if ( ! post_type_exists( static::NAME ) ) {
			register_post_type(
				static::NAME,
				$this->get_args()
			);
		}

		return true;
	}

	/**
	 * Gets post type arguments for this post type object.
	 *
	 * @since 1.0.0
	 *
	 * @return array Post type arguments.
	 */
	abstract protected function get_args(): array;
}

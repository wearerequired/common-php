<?php
/**
 * PostType class.
 *
 * @since 0.3.2
 */

namespace Required\Common\Contracts;

/**
 * Class used to implement post types.
 *
 * @since 0.3.2
 */
interface PostType {
	/**
	 * Post type name.
	 *
	 * Implementations are expected to override this.
	 */
	public const string NAME = '';
}

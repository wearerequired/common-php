<?php
/**
 * PostType class
 *
 * @since 0.1.0
 */

declare( strict_types=1 );

namespace Required\Common;

use Required\Common\Args\PostType as PostTypeArgs;
use Required\Common\Contracts\PostType as PostTypeInterface;
use Required\Common\Contracts\Registrable;

/**
 * Class used to implement custom post types.
 *
 * @since 0.1.0
 */
abstract class PostType implements Registrable, PostTypeInterface {

	public const string NAME = 'post';

	/**
	 * Creates a post type object.
	 *
	 * @since 0.1.0
	 *
	 * @return bool Whether the post type was registered successfully.
	 */
	public function register(): bool {
		/** @var lowercase-string&non-empty-string $name */
		$name = static::NAME;

		if ( ! post_type_exists( $name ) ) {
			/**
			 * WordPress stubs currently treat this as an array shape. `johnbillion/args`
			 * returns a plain `array<string, mixed>`, so we assert the expected shape here.
			 *
			 * @phpstan-var array{
			 *   label?: string,
			 *   labels?: string[],
			 *   description?: string,
			 *   public?: bool,
			 *   hierarchical?: bool,
			 *   exclude_from_search?: bool,
			 *   publicly_queryable?: bool,
			 *   show_ui?: bool,
			 *   show_in_menu?: bool|string,
			 *   show_in_nav_menus?: bool,
			 *   show_in_admin_bar?: bool,
			 *   show_in_rest?: bool,
			 *   rest_base?: string,
			 *   rest_namespace?: string,
			 *   rest_controller_class?: string,
			 *   autosave_rest_controller_class?: string|bool,
			 *   revisions_rest_controller_class?: string|bool,
			 *   late_route_registration?: bool,
			 *   menu_position?: int,
			 *   menu_icon?: string,
			 *   capability_type?: string|array<int, string>,
			 *   capabilities?: string[],
			 *   map_meta_cap?: bool,
			 *   supports?: array<int, mixed>|false,
			 *   register_meta_box_cb?: callable,
			 *   taxonomies?: string[],
			 *   has_archive?: bool|string,
			 *   rewrite?: bool|array{slug?: string, with_front?: bool, feeds?: bool, pages?: bool, ep_mask?: int},
			 *   query_var?: string|bool,
			 *   can_export?: bool,
			 *   delete_with_user?: bool,
			 *   template?: array<int, mixed>,
			 *   template_lock?: string|false,
			 *   _builtin?: bool,
			 *   _edit_link?: string,
			 * } $args
			 */
			$args = $this->get_args()->toArray();

			$post_type = register_post_type(
				$name,
				$args
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
	 * @return \Required\Common\Args\PostType Post type arguments.
	 */
	abstract protected function get_args(): PostTypeArgs;
}

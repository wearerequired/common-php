<?php
/**
 * Page class.
 *
 * @since 1.0.0
 */

namespace Required\Common\Admin;

use Required\Common\Contracts\Registrable;

/**
 * Class used to register pages.
 *
 * @since 1.0.0
 */
class Page implements Registrable {

	/**
	 * Type of admin page.
	 *
	 * @see is_admin()
	 *
	 * @since 1.0.0
	 *
	 * @var int
	 */
	const ADMIN = 1;

	/**
	 * Type of admin page.
	 *
	 * @see is_network_admin()
	 *
	 * @since 1.0.0
	 *
	 * @var int
	 */
	const ADMIN_NETWORK = 2;

	/**
	 * Type of admin page.
	 *
	 * @see is_user_admin()
	 *
	 * @since 1.0.0
	 *
	 * @var int
	 */
	const ADMIN_USER = 3;

	/**
	 * Type of admin screen.
	 *
	 * @since 1.0.0
	 *
	 * @var int
	 */
	private $admin;

	/**
	 * The text to be displayed in the title tags of the page when the menu is selected.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	private $title;

	/**
	 * The text to be used for the menu.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	private $menu_title;

	/**
	 * The capability required for this menu to be displayed to the user.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	private $capability;

	/**
	 * The slug name to refer to this menu by (should be unique for this menu).
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	private $menu_slug;

	/**
	 * The view to render the admin page.
	 *
	 * @since 1.0.0
	 *
	 * @var \Required\Common\Admin\PageView
	 */
	private $view;

	/**
	 * The slug name for the parent menu (or the file name of a standard WordPress admin page).
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	private $parent_slug;

	/**
	 * The icon to be used for the menu.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	private $icon;

	/**
	 * The position in the menu order this one should appear.
	 *
	 * @since 1.0.0
	 *
	 * @var null|int
	 */
	private $position;

	/**
	 * The page's hook_suffix.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	private $hook_name;

	/**
	 * Callback to be called when page is loaded.
	 *
	 * @since 1.0.0
	 *
	 * @var string
	 */
	private $on_load_callback;

	/**
	 * Constructor.
	 *
	 * @since 1.0.0
	 *
	 * @param int                             $admin       Type of admin screen.
	 * @param string                          $title       The text to be displayed in the title tags of the page when the menu is selected.
	 * @param string                          $menu_title  The text to be used for the menu.
	 * @param string                          $capability  The capability required for this menu to be displayed to the user.
	 * @param string                          $menu_slug   The slug name to refer to this menu by (should be unique for this menu).
	 * @param \Required\Common\Admin\PageView $view        The view to render the admin page.
	 * @param string                          $parent_slug Optional. The slug name for the parent menu (or the file name of a standard WordPress admin page).
	 * @param string                          $icon        Optional. The icon to be used for the menu.
	 * @param null|int                        $position    Optional. The position in the menu order this one should appear.
	 */
	public function __construct( int $admin, string $title, string $menu_title, string $capability, string $menu_slug, PageView $view, string $parent_slug = '', string $icon = '', $position = null ) {
		$this->admin       = $admin;
		$this->title       = $title;
		$this->menu_title  = $menu_title;
		$this->capability  = $capability;
		$this->menu_slug   = $menu_slug;
		$this->view        = $view;
		$this->parent_slug = $parent_slug;
		$this->icon        = $icon;
		$this->position    = $position;
	}

	/**
	 * Returns the action for registering the page.
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	private function get_action() {
		switch ( $this->admin ) {
			case static::ADMIN:
				return 'admin_menu';

			case static::ADMIN_NETWORK:
				return 'network_admin_menu';

			case static::ADMIN_USER:
				return 'user_admin_menu';

			default:
				return '';
		}
	}

	/**
	 * Returns the callback for adding the page to the admin menu.
	 *
	 * @since 1.0.0
	 *
	 * @return callable Callback for adding the page to the admin menu.
	 */
	private function get_callback() {
		if ( $this->parent_slug ) {
			return function() {
				$this->hook_name = add_submenu_page(
					$this->parent_slug,
					$this->title,
					$this->menu_title,
					$this->capability,
					$this->menu_slug,
					[ $this->view, 'render' ]
				);

				if ( $this->hook_name && is_callable( $this->on_load_callback ) ) {
					add_action(
						"load-{$this->hook_name}",
						$this->on_load_callback
					);
				}
			};
		} else {
			return function() {
				$this->hook_name = add_menu_page(
					$this->title,
					$this->menu_title,
					$this->capability,
					$this->menu_slug,
					[ $this->view, 'render' ],
					$this->icon,
					$this->position
				);

				if ( $this->hook_name && is_callable( $this->on_load_callback ) ) {
					add_action(
						"load-{$this->hook_name}",
						$this->on_load_callback
					);
				}
			};
		}
	}

	/**
	 * Returns the hook name of the menu page.
	 *
	 * @since 1.0.0
	 *
	 * @return string The hook name of the menu page.
	 */
	public function get_hook_name() {
		return $this->hook_name;
	}

	/**
	 * Returns the view of the page.
	 *
	 * @since 1.0.0
	 *
	 * @return \Required\Common\Admin\PageView The view of the page.
	 */
	public function get_view() {
		return $this->view;
	}

	/**
	 * Registers a callback to be called when page is loaded.
	 *
	 * @since 1.0.0
	 *
	 * @param callable $callback Callback called when page is loaded.
	 */
	public function on_load( callable $callback ) {
		$this->on_load_callback = $callback;
	}

	/**
	 * Registers the settings page.
	 *
	 * @since 1.0.0
	 *
	 * @return bool Whether the page was registered successfully.
	 */
	public function register(): bool {
		$action = $this->get_action();
		if ( ! $action ) {
			return false;
		}

		return add_action( $action, $this->get_callback() );
	}
}

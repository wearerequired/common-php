<?php
/**
 * Shortcode class
 *
 * @since 0.1.0
 */

declare( strict_types=1 );

namespace Required\Common;

use Required\Common\Contracts\Registrable;
use Required\Common\Contracts\ShortcodeView;

/**
 * Class used to implement shortcode.
 *
 * @since 0.1.0
 */
abstract class Shortcode implements Registrable {

	public const string TAG = 'shortcode';

	/**
	 * Shortcode view object.
	 *
	 * @since 0.1.0
	 *
	 * @var \Required\Common\Contracts\ShortcodeView
	 */
	protected ShortcodeView $view;

	/**
	 * Creates a shortcode object.
	 *
	 * @since 0.1.0
	 *
	 * @param \Required\Common\Contracts\ShortcodeView $view Shortcode View.
	 */
	public function __construct( ShortcodeView $view ) {
		$this->view = $view;
	}

	/**
	 * Creates a shortcode object.
	 *
	 * @since 0.1.0
	 *
	 * @return bool Whether shortcode was registered successfully.
	 */
	public function register(): bool {
		if ( '' === static::TAG ) {
			return false;
		}

		add_shortcode(
			static::TAG,
			[ $this->view, 'render' ]
		);
		return shortcode_exists( static::TAG );
	}
}

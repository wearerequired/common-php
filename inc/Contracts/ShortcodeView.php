<?php
/**
 * ShortcodeView class.
 *
 * @since 0.1.0
 */

declare( strict_types=1 );

namespace Required\Common\Contracts;

/**
 * Class used to implement shortcode view.
 *
 * @since 0.1.0
 */
interface ShortcodeView {

	/**
	 * Renders the shortcode.
	 *
	 * @since 0.1.0
	 *
	 * @param array<int|string, string> $attributes    Attributes of the shortcode.
	 * @param string|null               $content       The content.
	 * @param string                    $shortcode_tag The shortcode tag.
	 * @return string HTML output of the shortcode.
	 */
	public function render( array $attributes, ?string $content, string $shortcode_tag ): string;
}

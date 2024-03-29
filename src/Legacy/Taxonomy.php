<?php
/**
 * Taxonomy class
 *
 * Deprecated: Use Required\Common\Taxonomy instead.
 *
 * @since 0.3.1
 */

namespace Required\Common\Legacy;

use Required\Common\Contracts\Registrable;
use Required\Common\Contracts\Taxonomy as TaxonomyInterface;

/**
 * Class used to implement custom taxonomies.
 *
 * @since 0.1.0
 */
abstract class Taxonomy implements Registrable, TaxonomyInterface {

	public const NAME = 'category';

	/**
	 * Object types the taxonomy is associated with.
	 *
	 * @since 0.1.0
	 *
	 * @var array
	 */
	protected $object_types;

	/**
	 * Creates a taxonomy object.
	 *
	 * @since 0.1.0
	 *
	 * @return bool Whether the taxonomy was registered successfully.
	 */
	public function register(): bool {
		if ( ! taxonomy_exists( static::NAME ) ) {
			$taxonomy = register_taxonomy(
				static::NAME,
				$this->get_object_types(),
				$this->get_args()
			);
			return ! is_wp_error( $taxonomy );
		}

		return true;
	}

	/**
	 * Sets object types the taxonomy is associated with.
	 *
	 * @since 0.1.0
	 *
	 * @param array|string $object_type Object type or array of object types with which the taxonomy should be associated.
	 */
	public function set_object_types( $object_type ) {
		$this->object_types = (array) $object_type;
	}

	/**
	 * Gets object types the taxonomy is associated with.
	 *
	 * @since 0.1.0
	 *
	 * @return array Object types the taxonomy is associated with.
	 */
	public function get_object_types() {
		return $this->object_types;
	}

	/**
	 * Gets taxonomy arguments for this taxonomy object.
	 *
	 * @since 0.1.0
	 *
	 * @return array Taxonomy arguments.
	 */
	abstract protected function get_args();
}

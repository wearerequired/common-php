<?php
/**
 * Taxonomy class
 *
 * @since 0.1.0
 */

declare( strict_types=1 );

namespace Required\Common;

use Required\Common\Args\Taxonomy as TaxonomyArgs;
use Required\Common\Contracts\Registrable;

/**
 * Class used to implement custom taxonomies.
 *
 * @since 0.1.0
 */
abstract class Taxonomy implements Registrable {

	public const NAME = 'category';

	/**
	 * Object types the taxonomy is associated with.
	 *
	 * @since 0.1.0
	 *
	 * @var array
	 */
	protected $object_types = [];

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
				$this->get_args()->toArray()
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
	 * @param string[]|string $object_type Object type or array of object types with which the taxonomy should be associated.
	 */
	public function set_object_types( $object_type ): void {
		$this->object_types = (array) $object_type;
	}

	/**
	 * Gets object types the taxonomy is associated with.
	 *
	 * @since 0.1.0
	 *
	 * @return string[] Object types the taxonomy is associated with.
	 */
	public function get_object_types(): array {
		return $this->object_types;
	}

	/**
	 * Gets taxonomy arguments for this taxonomy object.
	 *
	 * @since 0.1.0
	 *
	 * @return \Required\Common\Args\Taxonomy Taxonomy arguments.
	 */
	abstract protected function get_args(): TaxonomyArgs;
}

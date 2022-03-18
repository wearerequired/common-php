<?php
/**
 * HierarchicalTaxonomyLabels class.
 *
 * @since 0.3.0
 */

namespace Required\Common\Args;

use Args;

/**
 * Arguments for the `labels` argument of `register_taxonomy()` function in WordPress.
 *
 * @since 0.3.0
 *
 * @link https://developer.wordpress.org/reference/functions/get_taxonomy_labels/
 */
class HierarchicalTaxonomyLabels extends Args\Shared\Base {

	/**
	 * General name for the taxonomy, usually plural.
	 *
	 * Default `_x( 'Categories', 'taxonomy general name' )`.
	 */
	public string $name;

	/**
	 * Name for one object of this post type.
	 *
	 * Default `_x( 'Category', 'taxonomy singular name' )`.
	 */
	public string $singular_name;

	/**
	 * Label for the menu name.
	 *
	 * Default is value of `$name`.
	 */
	public string $menu_name;

	/**
	 * Label for searching plural items.
	 *
	 * Default `__( 'Search Categories' )`.
	 */
	public string $search_items;

	/**
	 * Label to signify all items in a submenu link.
	 *
	 * Default `__( 'All Categories' )`.
	 */
	public string $all_items;

	/**
	 * Label used for dropdown for assigning parent item.
	 *
	 * Default `__( 'Parent Category' )`.
	 */
	public string $parent_item;

	/**
	 * Label used to prefix parents of hierarchical items.
	 *
	 * Default `__( 'Parent Category:' )`.
	 */
	public string $parent_item_colon;

	/**
	 * Description for the Name field on Edit Tags screen.
	 *
	 * Default `__( 'The name is how it appears on your site.' )`.
	 */
	public string $name_field_description;

	/**
	 * Description for the Slug field on Edit Tags screen.
	 *
	 * Default `__( 'The &#8220;slug&#8221; is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.' )`.
	 */
	public string $slug_field_description;

	/**
	 * Description for the Parent field on Edit Tags screen.
	 *
	 * Default `__( 'Assign a parent term to create a hierarchy. The term Jazz, for example, would be the parent of Bebop and Big Band.' )`.
	 */
	public string $parent_field_description;

	/**
	 * Description for the Description field on Edit Tags screen.
	 *
	 * Default `__( 'The description is not prominent by default; however, some themes may show it.' )`.
	 */
	public string $desc_field_description;

	/**
	 * Label for editing a singular item.
	 *
	 * Default `__( 'Edit Category' )`.
	 */
	public string $edit_item;

	/**
	 * Label for viewing a singular item.
	 *
	 * Default `__( 'View Category' )`.
	 */
	public string $view_item;

	/**
	 * Label for updating a singular item.
	 *
	 * Default `__( 'Update Category' )`.
	 */
	public string $update_item;

	/**
	 * Label for adding a new singular item.
	 *
	 * Default `__( 'Add New Category' )`.
	 */
	public string $add_new_item;

	/**
	 * Label for adding a new name of a singular item.
	 *
	 * Default `__( 'New Category Name' )`.
	 */
	public string $new_item_name;

	/**
	 * Label used when no items are found.
	 *
	 * Default `__( 'No categories found.' )`.
	 */
	public string $not_found;

	/**
	 * Label used in the posts and media list tables when no items
	 * are assigned to an object.
	 *
	 * Default `__( 'No categories' )`.
	 */
	public string $no_terms;

	/**
	 * Label for the term filter in list tables.
	 *
	 * Default `__( 'Filter by category' )`.
	 */
	public string $filter_by_item;

	/**
	 * Label for the table pagination hidden heading.
	 *
	 * Default `__( 'Categories list navigation' )`.
	 */
	public string $items_list_navigation;

	/**
	 * Label for the table hidden heading.
	 *
	 * Default `__( 'Categories list' )`.
	 */
	public string $items_list;

	/**
	 * Label for tab heading when selecting from the most used terms.
	 *
	 * Default `_x( 'Most Used', 'categories' )`.
	 */
	public string $most_used;

	/**
	 * Label displayed after a term has been updated.
	 *
	 * Default `__( '&larr; Go to Categories' )`.
	 */
	public string $back_to_items;

	/**
	 * Used in the block editor. Title for a navigation link block variation.
	 *
	 * Default `_x( 'Category Link', 'navigation link block title' )`.
	 */
	public string $item_link;

	/**
	 * Used in the block editor. Description for a navigation link block variation.
	 *
	 * Default `_x( 'A link to a category.', 'navigation link block description' )`.
	 */
	public string $item_link_description;
}

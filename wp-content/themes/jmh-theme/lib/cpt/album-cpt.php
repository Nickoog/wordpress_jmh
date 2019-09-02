<?php

// Register Custom Post Type
function custom_post_type_album() {

	$labels = array(
		'name'                  => _x( 'Albums', 'Post Type General Name', 'jmh_theme' ),
		'singular_name'         => _x( 'Album', 'Post Type Singular Name', 'jmh_theme' ),
		'menu_name'             => __( 'Albums photo', 'jmh_theme' ),
		'name_admin_bar'        => __( 'Albums photo', 'jmh_theme' ),
		'archives'              => __( 'Item Archives', 'jmh_theme' ),
		'attributes'            => __( 'Item Attributes', 'jmh_theme' ),
		'parent_item_colon'     => __( 'Parent Item:', 'jmh_theme' ),
		'all_items'             => __( 'Tous les albums', 'jmh_theme' ),
		'add_new_item'          => __( 'Ajouter un nouvel album', 'jmh_theme' ),
		'add_new'               => __( 'Ajouter', 'jmh_theme' ),
		'new_item'              => __( 'Nouvel album', 'jmh_theme' ),
		'edit_item'             => __( 'Modifier', 'jmh_theme' ),
		'update_item'           => __( 'Update Item', 'jmh_theme' ),
		'view_item'             => __( 'View Item', 'jmh_theme' ),
		'view_items'            => __( 'View Items', 'jmh_theme' ),
		'search_items'          => __( 'Search Item', 'jmh_theme' ),
		'not_found'             => __( 'Not found', 'jmh_theme' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'jmh_theme' ),
		'featured_image'        => __( 'Image de couverture', 'jmh_theme' ),
		'set_featured_image'    => __( 'Remplacer l\'image', 'jmh_theme' ),
		'remove_featured_image' => __( 'Supprimer l\'image de couverture', 'jmh_theme' ),
		'use_featured_image'    => __( 'Utiliser comme image de couverture', 'jmh_theme' ),
		'insert_into_item'      => __( 'Insert into item', 'jmh_theme' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'jmh_theme' ),
		'items_list'            => __( 'Items list', 'jmh_theme' ),
		'items_list_navigation' => __( 'Items list navigation', 'jmh_theme' ),
		'filter_items_list'     => __( 'Filter items list', 'jmh_theme' ),
	);
	$args = array(
		'label'                 => __( 'Album', 'jmh_theme' ),
		'description'           => __( 'Post Type Description', 'jmh_theme' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-format-gallery',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'album', $args );

}
add_action( 'init', 'custom_post_type_album', 0 );
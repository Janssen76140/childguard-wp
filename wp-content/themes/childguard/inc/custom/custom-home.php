<?php 
/**
 * Register a custom post type called "home".
 *
 * @see get_post_type_labels() for label keys.
 */
function wpdocs_codex_Home_init() {
    $labels = array(
        'name'                  => _x( 'Homes', 'Post type general name', 'childguard' ),
        'singular_name'         => _x( 'Home', 'Post type singular name', 'childguard' ),
        'menu_name'             => _x( 'Page-Home', 'Admin Menu text', 'childguard' ),
        'name_admin_bar'        => _x( 'Home', 'Add New on Toolbar', 'childguard' ),
        'add_new'               => __( 'Ajouter nouveau article', 'childguard' ),
        'add_new_item'          => __( 'Add New Home', 'childguard' ),
        'new_item'              => __( 'New Home', 'childguard' ),
        'edit_item'             => __( 'Edit Home', 'childguard' ),
        'view_item'             => __( 'View Home', 'childguard' ),
        'all_items'             => __( 'Les articles page-home', 'childguard' ),
        'search_items'          => __( 'Search Homes', 'childguard' ),
        'parent_item_colon'     => __( 'Parent Homes:', 'childguard' ),
        'not_found'             => __( 'No Homes found.', 'childguard' ),
        'not_found_in_trash'    => __( 'No Homes found in Trash.', 'childguard' ),
        'featured_image'        => _x( 'Home Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'childguard' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'childguard' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'childguard' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'childguard' ),
        'archives'              => _x( 'Home archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'childguard' ),
        'insert_into_item'      => _x( 'Insert into Home', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'childguard' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Home', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'childguard' ),
        'filter_items_list'     => _x( 'Filter Homes list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'childguard' ),
        'items_list_navigation' => _x( 'Homes list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'childguard' ),
        'items_list'            => _x( 'Homes list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'childguard' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'Home' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 46,
        'menu_icon'          => 'dashicons-Home',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt'),
    );

    register_post_type( 'Home', $args );
}

add_action( 'init', 'wpdocs_codex_Home_init' );
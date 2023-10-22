<?php

namespace SEVEN_TECH_Location\Post_Types;

class Post_Type_Locations
{
    public function __construct()
    {
        add_action('init', [$this, 'custom_post_type']);
    }

    function custom_post_type()
    {
        $labels = array(
            'name' => 'Founders',
            'singular_name' => 'Founder',
            'add_new' => 'Add Founder',
            'all_items' => 'Founder',
            'add_new_item' => 'Add New Founder',
            'edit_item' => 'Edit Item',
            'new_item' => 'New Item',
            'view_item' => 'View Item',
            'search_item' => 'Search Founders',
            'not_found' => 'Founder Not Found',
            'not_found_in_trash' => 'No members found in trash',
            'parent_item_colon' => 'Parent Item'
        );

        $args = array(
            'labels' => $labels,
            'show_ui' => true,
            'menu_icon' => 'dashicons-groups',
            'show_in_rest' => true,
            'show_in_nav_menus' => true,
            'public' => true,
            'has_archive' => true,
            'publicly_queryable' => true,
            'query_var' => true,
            'rewrite' => array(
                'with_front' => false,
                'slug'       => 'founders'
            ),
            'hierarchical' => true,
            'supports' => [
                'title',
                'editor',
                'excerpt',
                'thumbnail',
                'custom-fields',
                'revisions',
                'page-attributes',
            ],
            'taxonomies' => array('category', 'post_tag'),
            'menu_position' => 7,
            'exclude_from_search' => false
        );

        register_post_type('founders', $args);
    }
}

<?php

namespace SEVEN_TECH_Location\Post_Types;

class Post_Types
{
    public $post_types;

    public function __construct()
    {
        $this->post_types = [
            [
                'name' => 'Locations',
                'singular' => 'Location',
                'archive_page' => 'locations',
                'single_page' => 'location'
            ],
        ];

        add_action('init', [$this, 'custom_post_type']);
    }

    function custom_post_type()
    {
        foreach ($this->post_types as $post_type) {
            $labels = array(
                'name' => $post_type['name'],
                'singular_name' => $post_type['singular'],
                'add_new' => 'Add ' . $post_type['singular'],
                'all_items' => $post_type['singular'],
                'add_new_item' => 'Add New ' . $post_type['singular'],
                'edit_item' => 'Edit ' . $post_type['singular'],
                'new_item' => 'New ' . $post_type['singular'],
                'view_item' => 'View ' . $post_type['singular'],
                'search_item' => 'Search Founders',
                'not_found' => $post_type['singular'] . ' Not Found',
                'not_found_in_trash' => 'No ' . $post_type['singular'] . ' found in trash',
                'parent_item_colon' => 'Parent ' . $post_type['singular']
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
                    'slug'       => $post_type['archive_page']
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

            register_post_type($post_type['archive_page'], $args);
        }
    }
}

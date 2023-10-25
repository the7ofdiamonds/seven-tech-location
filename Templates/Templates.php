<?php

namespace SEVEN_TECH_Location\Templates;

use SEVEN_TECH_Location\CSS\CSS;
use SEVEN_TECH_Location\JS\JS;
use SEVEN_TECH_Location\Pages\Pages;
use SEVEN_TECH_Location\Post_Types\Post_Types;

class Templates
{
    private $page_titles;
    private $post_types;
    private $css_file;
    private $js_file;

    public function __construct()
    {
        add_filter('frontpage_template', [$this, 'get_custom_front_page']);
        add_filter('archive_template', [$this, 'get_locations_archive_template'], 10, 1);
        add_filter('single_template', [$this, 'get_locations_single_template'], 10, 1);

        $pages = new Pages;
        $posttypes = new Post_Types;

        $this->page_titles = $pages->page_titles;
        $this->post_types = $posttypes->post_types;
        $this->css_file = new CSS;
        $this->js_file = new JS;
    }

    function get_custom_front_page()
    {
        if (is_front_page()) {
            add_action('wp_head', [$this->css_file, 'load_front_page_css']);
            add_action('wp_footer', [$this->js_file, 'load_front_page_react']);
        }
    }

    function get_locations_archive_template($archive_template)
    {
        if (is_post_type_archive('locations')) {
            $archive_template = SEVEN_TECH_LOCATION . 'Post_Types/Locations/archive-locations.php';

            if (file_exists($archive_template)) {
                add_action('wp_head', [$this->css_file, 'load_post_types_css']);
                add_action('wp_footer', [$this->js_file, 'load_post_types_archive_react']);

                return $archive_template;
            } else {
                error_log('Post Type Locations archive template not found.');
            }
        }
    }

    function get_locations_single_template($single_template)
    {
        if (is_singular('locations')) {
            $single_template = SEVEN_TECH_LOCATION . 'Post_Types/Locations/single-locations.php';

            if (file_exists($single_template)) {
                add_action('wp_head', [$this->css_file, 'load_post_types_css']);
                add_action('wp_footer', [$this->js_file, 'load_post_types_single_react']);

                return $single_template;
            } else {
                error_log('Post Type Locations single template not found.');
            }
        }
    }
}

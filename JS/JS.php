<?php

namespace SEVEN_TECH_Location\JS;

use SEVEN_TECH_Location\Pages\Pages;
use SEVEN_TECH_Location\Post_Types\Post_Types;

class JS
{
    private $handle_prefix;
    private $react_pages;
    private $post_types;
    private $includes_url;
    private $buildFilePrefix;
    private $buildFilePrefixURL;
    private $front_page_react;

    public function __construct()
    {
        // add_action('wp_footer', [$this, 'load_js']);
        // add_action('wp_footer', [$this, 'load_pages_react']);

        $this->handle_prefix = 'seven_tech_location_';
        $this->buildFilePrefix = SEVEN_TECH_LOCATION . 'build/src_views_';
        $this->buildFilePrefixURL = SEVEN_TECH_LOCATION_URL . 'build/src_views_';
        $this->front_page_react = [
            'locations',
        ];

        $this->includes_url = includes_url();

        $pages = new Pages;
        $posttypes = new Post_Types;

        $this->react_pages = $pages->react_pages;
        $this->post_types = $posttypes->post_types;
    }

    function load_js()
    {
        wp_register_script($this->handle_prefix, SEVEN_TECH_LOCATION_URL . 'JS/seven-tech.js', array('jquery'), false, false);
        wp_enqueue_script($this->handle_prefix);
    }

    function load_front_page_react()
    {
        if (is_front_page()) {
            foreach ($this->front_page_react as $section) {
                $fileName = ucwords($section);
                $filePath = $this->buildFilePrefix . $fileName . '_jsx.js';
                $filePathURL = $this->buildFilePrefixURL . $fileName . '_jsx.js';

                wp_enqueue_script('wp-element', $this->includes_url . 'js/dist/element.min.js', [], null, true);

                if (file_exists($filePath)) {
                    wp_enqueue_script($this->handle_prefix . 'react_' . $fileName, $filePathURL, ['wp-element'], 1.0, true);
                } else {
                    error_log($fileName . ' page has not been created in react JSX.');
                }

                wp_enqueue_script($this->handle_prefix . 'react_index', SEVEN_TECH_LOCATION_URL . 'build/index.js', ['wp-element'], '1.0', true);
            }
        }
    }

    function load_pages_react()
    {error_log('load js location');
        foreach ($this->react_pages as $page) {
            if (is_page($page)) {
                $fileName = ucwords($page);
                $filePath = $this->buildFilePrefix . $fileName . '_jsx.js';
                $filePathURL = $this->buildFilePrefixURL . $fileName . '_jsx.js';

                wp_enqueue_script('wp-element', $this->includes_url . 'js/dist/element.min.js', [], null, true);

                if (file_exists($filePath)) {
                    wp_enqueue_script($this->handle_prefix . 'react_' . $fileName, $filePathURL, ['wp-element'], 1.0, true);
                } else {
                    error_log($page . ' page has not been created in react JSX.');
                }

                wp_enqueue_script($this->handle_prefix . 'react_index', SEVEN_TECH_LOCATION_URL . 'build/index.js', ['wp-element'], '1.0', true);
            }
        }
    }

    function load_post_types_archive_react()
    {
        foreach ($this->post_types as $post_type) {

            if (is_post_type_archive($post_type['archive_page'])) {
                $fileName = ucwords($post_type['name']);
                $filePath = $this->buildFilePrefix . $fileName . '_jsx.js';
                $filePathURL = $this->buildFilePrefixURL . $fileName . '_jsx.js';

                wp_enqueue_script('wp-element', $this->includes_url . 'js/dist/element.min.js', [], null, true);

                if (file_exists($filePath)) {
                    wp_enqueue_script($this->handle_prefix . 'react_' . $fileName, $filePathURL, ['wp-element'], 1.0, true);
                } else {
                    error_log('Post Type ' . $post_type['archive_page'] . ' page has not been created in react JSX.');
                }

                wp_enqueue_script($this->handle_prefix . 'react_index', SEVEN_TECH_LOCATION_URL . 'build/index.js', ['wp-element'], '1.0', true);
            }
        }
    }

    function load_post_types_single_react()
    {
        foreach ($this->post_types as $post_type) {

            if (is_singular($post_type['archive_page'])) {
                $fileName = ucwords($post_type['name']);
                $filePath = $this->buildFilePrefix . $fileName . '_jsx.js';
                $filePathURL = $this->buildFilePrefixURL . $fileName . '_jsx.js';

                wp_enqueue_script('wp-element', $this->includes_url . 'js/dist/element.min.js', [], null, true);

                if (file_exists($filePath)) {
                    wp_enqueue_script($this->handle_prefix . 'react_' . $fileName, $filePathURL, ['wp-element'], 1.0, true);
                } else {
                    error_log('Post Type ' . $post_type['single_page'] . ' page has not been created in react JSX.');
                }

                wp_enqueue_script($this->handle_prefix . 'react_index', SEVEN_TECH_LOCATION_URL . 'build/index.js', ['wp-element'], '1.0', true);
            }
        }
    }
}

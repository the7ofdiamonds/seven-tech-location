<?php

namespace SEVEN_TECH_Location;

/**
 * @package SEVEN_TECH_Location
 */
/*
Plugin Name: SEVEN TECH Locations
Plugin URI: 
Description: Users.
Version: 1.0.0
Author: THE7OFDIAMONDS.TECH
Author URI: http://THE7OFDIAMONDS.TECH
License: 
Text Domain: seven-tech
*/

/*
Licensing Info is needed
*/

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');
define('SEVEN_TECH_LOCATION', WP_PLUGIN_DIR . '/seven-tech-location/');
define('SEVEN_TECH_LOCATION_URL', WP_PLUGIN_URL . '/seven-tech-location/');

require_once SEVEN_TECH_LOCATION . 'vendor/autoload.php';

use SEVEN_TECH_Location\Admin\Admin;
use SEVEN_TECH_Location\API\API;
use SEVEN_TECH_Location\CSS\CSS;
use SEVEN_TECH_Location\Database\Database;
use SEVEN_TECH_Location\JS\JS;
use SEVEN_TECH_Location\Pages\Pages;
use SEVEN_TECH_Location\Post_Types\Post_Types;
use SEVEN_TECH_Location\Shortcodes\Shortcodes;
use SEVEN_TECH_Location\Templates\Templates;

class SEVEN_TECH_Location
{
    public function __construct()
    {
        add_filter('upload_mimes', [$this, 'add_theme_support_upload_mimes']);

        new Admin;
        new API;
        new CSS;
        new Database;
        new JS;
        new Pages;
        new Post_Types;
        new Shortcodes;
        new Templates;
    }

    function activate()
    {
        flush_rewrite_rules();
    }

    function add_theme_support_upload_mimes($mimes)
    {
        $mimes['jpeg'] = 'image/jpeg';
        $mimes['jpg'] = 'image/jpeg';
        $mimes['svg'] = 'image/svg+xml';
        $mimes['eps'] = 'application/postscript';
        $mimes['ai'] = 'application/postscript';

        return $mimes;
    }
}

$seven_tech = new SEVEN_TECH_Location();
register_activation_hook(__FILE__, array($seven_tech, 'activate'));

$seven_tech_pages = new Pages();
register_activation_hook(__FILE__, array($seven_tech_pages, 'add_pages'));

// register_deactivation_hook(__FILE__, array($thfw_users, 'deactivate'));

//Uninstall move post type to trash
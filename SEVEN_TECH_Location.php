<?php

namespace SEVEN_TECH\Location;

/**
 * @package SEVEN_TECH\Location
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

use SEVEN_TECH\Location\Admin\Admin;
use SEVEN_TECH\Location\API\API;
use SEVEN_TECH\Location\CSS\CSS;
use SEVEN_TECH\Location\Database\Database;
use SEVEN_TECH\Location\JS\JS;
use SEVEN_TECH\Location\Pages\Pages;
use SEVEN_TECH\Location\Post_Types\Post_Types;
use SEVEN_TECH\Location\Shortcodes\Shortcodes;
use SEVEN_TECH\Location\Templates\Templates;

class SEVEN_TECH_Location
{
    public function __construct()
    {
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
}

$seven_tech = new SEVEN_TECH_Location();
register_activation_hook(__FILE__, array($seven_tech, 'activate'));
// register_deactivation_hook(__FILE__, array($thfw_users, 'deactivate'));
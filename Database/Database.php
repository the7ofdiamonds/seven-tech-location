<?php

namespace SEVEN_TECH\Location\Database;

class Database
{
    private $wpdb;

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;

        // $this->createTables();
    }

    function createTables()
    {
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

    }
}

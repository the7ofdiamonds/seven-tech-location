<?php

namespace SEVEN_TECH_Location\API\Google;

use Google\Client;

class Google
{
    private $credentialsPath;
    private $client;

    public function __construct($credentialsPath)
    {
        $this->credentialsPath = $credentialsPath;
        $this->client = new Client();
        $this->client->setApplicationName('Your Application Name');
        $this->client->setAuthConfig($this->credentialsPath);
        $this->client->setScopes('https://www.googleapis.com/auth/calendar');
    }
}

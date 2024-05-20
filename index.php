<?php
// Autoloading
require 'vendor/autoload.php';

use Symfony\Component\Dotenv\Dotenv;

// Loads .env file
$dotenv = new Dotenv();
$dotenv->load(__DIR__.'/.env');

// Startup
require 'app.php';
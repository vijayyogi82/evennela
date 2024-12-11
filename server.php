<?php

/**
 * Laravel's default server.php file
 * This file acts as the entry point for the application and will handle requests similar to index.php
 */

// Define the public path for the application.
$publicPath = __DIR__ . '/public';

if (php_sapi_name() == 'cli-server') {
    // When running PHP's built-in development server, handle static file requests.
    $uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

    // Serve the requested file if it exists in the public directory.
    if ($uri !== '/' && file_exists($publicPath . $uri)) {
        return false;
    }
}

// Load Composer's autoloader
require __DIR__ . '/vendor/autoload.php';

// Launch the application by requiring the public/index.php script.
require_once $publicPath . '/index.php';

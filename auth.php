<?php
// auth.php

// Function to check if the user is authenticated
function is_authenticated() {
    if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
        return false;
    }

    // You can add your authentication logic here.
    // For example, check the credentials against a database or a predefined list.

    $valid_username = 'your_username';
    $valid_password = 'your_password';

    if ($_SERVER['PHP_AUTH_USER'] === $valid_username && $_SERVER['PHP_AUTH_PW'] === $valid_password) {
        return true;
    }

    return false;
}

// Function to enforce authentication
function require_authentication() {
    if (!is_authenticated()) {
        header('WWW-Authenticate: Basic realm="Authentication Required"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Authentication required.';
        exit;
    }
}
?>
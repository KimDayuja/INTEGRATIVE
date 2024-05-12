<?php

// This only checks if the server is localhost or not.
// If it is localhost, the ROOT constant is set to the localhost URL.
// If it is not localhost, the ROOT constant is set to the website URL.
// This is useful for setting the ROOT constant in the config file.
function defineRoot() {
    if($_SERVER['SERVER_NAME'] == 'localhost') {
        define('ROOT', 'http://localhost/movie/public/');
    } else {
        define('ROOT', 'http://www.website.com/');
    }
}

function DebugMode() {
    define('DEBUG', true);
}

DebugMode();
defineRoot();

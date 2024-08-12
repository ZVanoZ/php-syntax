<?php
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
ini_set('error_reporting', E_ALL);

echo '<p>PHP 8.0 ... </p>';
echo '<pre>';
var_dump(
    [
        'class_exists("OCILob")' => class_exists("OCILob")
    ]
);
echo '</pre>';

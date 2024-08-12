<?php
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
ini_set('error_reporting', E_ALL);

echo '<p>PHP от 5.0 до 7.4 </p>';
echo '<pre>';
var_dump(
    [

        'class_exists("OCI_Lob")' => class_exists("OCI_Lob")
    ]
);
echo '</pre>';

<?php
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
ini_set('error_reporting', E_ALL);

echo '<p>PHP 5.4 deprecated</p>';
echo '<pre>';
var_dump(
    [
        'function_exists("OCIFreeDesc")' => function_exists("OCIFreeDesc")
    ]
);
echo '</pre>';

$lob = new OCI_Lob();
OCIFreeDesc($lob);

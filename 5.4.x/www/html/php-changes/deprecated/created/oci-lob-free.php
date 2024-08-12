<?php
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
ini_set('error_reporting', E_ALL);

echo '<p>PHP 5.4 created </p>';
$lob = new OCI_Lob();
$lob->free();

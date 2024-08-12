<?php
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
ini_set('error_reporting', E_ALL);

(
function () {
    echo '<h2>Функция "random_bytes"</h2>';
    echo '<p>PHP: "7.0"</p>';
    echo '<p><a target="_blank" href="https://www.php.net/manual/ru/function.random-bytes.php">php.net: "function.random-bytes"</a></p>';
    $results = [];
    $results['BASE64:random_bytes(10)'] = base64_encode(random_bytes(10));
    $results['BASE64:random_bytes(100)'] = base64_encode(random_bytes(100));


    echo '<pre style="border: 1px solid red">', json_encode($results, JSON_PRETTY_PRINT), '</pre>';
}
)();


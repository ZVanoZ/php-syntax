<?php
$results = [
    'test-item' => <<<'TEXT'
В траве сидел кузнечик\
Совсем как огуречик/
Зелененький он был
TEXT
];
$json = json_encode($results, JSON_PRETTY_PRINT |JSON_UNESCAPED_UNICODE| JSON_UNESCAPED_SLASHES );
echo '<pre>', $json, '</pre>';

<?php
ini_set('display_errors', true);
ini_set('display_startup_errors', true);
ini_set('error_reporting', E_ALL);

(
function () {
    echo '<h2>Оператор "??"</h2>';
    echo <<<'HTML'
<p>Тернарный оператор "??"</p>
<ul>
    <li><a href="https://www.php.net/manual/ru/language.operators.comparison.php#language.operators.comparison.coalesce">php.net: "language.operators.comparison.coalesce"</a></li>
</ul>
HTML;
    $results = [];

    $results['null ?? "some-value"'] = null ?? "some-value";
    $results['null ?? null'] = null ?? null;
    $results['null ?? null ?? "aaaa"'] = null ?? null ?? "some-value";
    $results['null ?? false ?? "some-value"'] = null ?? false ?? "some-value"; // false считается значением
    $results['null ?? "" ?? "some-value"'] = null ?? "" ?? "some-value"; // Пустая строка считается значением

    var_dump($results);
}
)();

(
function () {
    echo '<h2>Оператор "?:"</h2>';
    echo <<<'HTML'
<p>Тернарный оператор "?:"</p>
<pre class="code-php">
    // $res примет значение первого значения, которое неявным преобразованием в bool дает true
    $res =  $expr1 ?: $expr2;
</pre>
<ul>
    <li><a href="https://www.php.net/manual/ru/language.operators.comparison.php#language.operators.comparison.ternary">php.net: "language.operators.comparison.ternary"</a></li>
</ul>
HTML;
    $results = [];

    $results['type-cast'] = [
        'boolval("")' => boolval(""),        // false
        'boolval("ABC")' => boolval("ABC"),  // true
        'boolval(-1)' => boolval(-1),        // true
        'boolval(0)' => boolval(0),          // false
        'boolval(1)' => boolval(1),          // true
        'boolval(null)' => boolval(null),    // false
    ];

    $results[] = [
        'title' => 'Пример #5 Цепочка коротких тернарных операторов',
        'from' => 'https://www.php.net/manual/ru/language.operators.comparison.php#language.operators.comparison.ternary',
        'test' => [
            '0 ?: 1 ?: 2 ?: 3' => 0 ?: 1 ?: 2 ?: 3, // 1
            '0 ?: 0 ?: 2 ?: 3' => 0 ?: 0 ?: 2 ?: 3, // 2
            '0 ?: 0 ?: 0 ?: 3' => 0 ?: 0 ?: 0 ?: 3, // 3
        ]
    ];


    $results[] = [
        'true ?: false' => true ?: false,
        'false ?: true' => false ?: true,
    ];

    $results[] = [
        '0 ?: -1' => 0 ?: -1,
        '-1 ?: 0' => -1 ?: 0,
        '0 ?: 0' => 0 ?: 0,
        '0 ?: 1' => 0 ?: 1,
        '1 ?: 0' => 1 ?: 0,
        'debug' => [
            'boolval(-1)' => boolval(-1),
            'boolval(0)' => boolval(0),
            'boolval(1)' => boolval(1),
        ]
    ];

    $results[] = [
        '"" ?: "ABC"' => "" ?: "ABC",
        'debug' => [
            'boolval("")' => boolval(""),
            'boolval("ABC")' => boolval("ABC"),
        ]
    ];


    $results[] = [
        'null ?: true' => null ?: true,
        'null ?: false' => null ?: false,
        'null ?: false ?: "ABC"' => null ?: false ?: "ABC",
        'true ?: null' => true ?: null,
        'false ?: null' => false ?: null,
        'debug' => [
            'boolval(null)' => boolval(null),
            'boolval("ABC")' => boolval("ABC"),
        ]
    ];

    $results[] = [
        'getenv("APP_NAME1") ?: getenv("APP_NAME")' => getenv("APP_NAME1") ?: getenv("APP_NAME"),
        'getenv("APP_NAME1") ?: "production"' => getenv("APP_NAME1") ?: "production",
        'getenv("APP_NAME") ?: "production"' => getenv("APP_NAME") ?: "production",
        'debug' => [
            'getenv("APP_NAME1")' => getenv("APP_NAME1"),
            'getenv("APP_NAME")' => getenv("APP_NAME"),

        ]
    ];

    var_dump($results);
}
)();

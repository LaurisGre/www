<?php

function print_array($data) {
    $string = '';
    if (gettype($data) != 'array') {
        $string .= $data . '.';
    } else {
        foreach($data as $value) {
            $string .= print_array($value);
            // var_dump($string);
        }
    }
    var_dump($string);
    if($string[-1] === '.') {
        $string .= ',';
    }
    return $string;
}

$arr5 = [
    'stringas',
    'vardas' => [
        'stringas',
        'dar viena verte' => [
            1,
            2,
            4,
            'random' => [
                'veikia?'
            ]
        ]
    ],
    1000
];

$test_array = print_array($arr5);
var_dump($test_array);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Motrix</title>
</head>
<body>

</body>
</html>
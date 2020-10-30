<?php
$arr = [
    'A', 'A', 'A', 'A',
    'B', 'B', 'B',
    'C', 'C',
];

function count_values(array $array, string $value)
{
    $count = 0;
    foreach ($array as $val) {
        if ($val === $value) $count++;
    }

    return $count;
}

function change_values(array &$array, string $from, string $to) {
    foreach ($array as $index => $val) {
        if ($val === $from) $array[$index] = $to;
    }
}

var_dump(count_values($arr, 'A'));
change_values($arr, 'A', 'a');
var_dump(count_values($arr, 'A'));
var_dump(count_values($arr, 'a'));

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Reference</title>
</head>

<body>

</body>

</html>
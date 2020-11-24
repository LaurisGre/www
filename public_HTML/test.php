<?php

require '../bootloader.php';

$fileDb = new FileDB(DB_FILE);
// $arr = [1, 2, 'a' => ['asd' => 'a', 'b', 'c'], 4, 5, 6, 7 => ['1' => ['a' => 'b']], 8, 9, 0];
// $arr = [];
var_dump($fileDb);
$fileDb->createTable('table');
var_dump($fileDb);
var_dump($fileDb->updateRow('table', 10, 'asd'));
var_dump($fileDb);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<link rel="stylesheet" href="style.css">
    <title>TEST</title>
</head>
<body>
    <h1>TESTING IS HAPPENING HERE</h1>
</body>
</html>
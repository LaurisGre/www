<?php

$atsakymas = '';

if (isset($_POST['number'])) {
    switch ($_POST['button']) {
        case 'square':
            $atsakymas = $_POST['number'] ** 2;
            break;
        case 'cube':
            $atsakymas = $_POST['number'] ** 3;
            break;
        case 'root':
            $atsakymas = sqrt($_POST['number']);
            break;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Form</title>
</head>
<body>
    <h1><?php print $atsakymas; ?></h1>
    <form method="POST">
        <input type="number" name='number'>
        <input type="submit" name="button" value='square'>
        <input type="submit" name='button' value='cube'>
        <input type="submit" name="button" value='root'>
    </form>
</body>
</html>
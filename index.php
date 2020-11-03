<?php

$title = 'Užpildyk mane:';

$atsakymas = [];
$result = '';
$form_vis = '';
$cert_vis = '';

if (isset($_POST['button'])) {
    $title = 'PHP ANKETA';
    $form_vis = 'form_hide';
    $cert_vis = 'cert_show';

    foreach($_POST as $key => $input) {
        if($key != 'button') {
            if($key === 'Amžius') {
                $atsakymas[$key] = 'Amžius' . (2020 - $input);
            } else {
                $atsakymas[$key] = "$key: $input";
            }
        }
    }
}

$result = $_POST['Vardas'] . ', gimęs(-usi) ' . $_POST['Amžius'] . ' metais, yra ' . $_POST['Lygis'] . ' PHP programuotojas';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Form</title>
</head>
<body>
    <h1><?php print $title; ?></h1>
    <div class="certificate <?php print $cert_vis; ?>"></div>
    <form method="POST" class="<?php print $form_vis; ?>">
        <input type="text" name='Vardas' placeholder="name">
        <input type="text" name='Pavardė' placeholder="surname">
        <input type="number" name="Amžius" placeholder="year">
        <p>Kaip vertini savo PHP žinias?</p>
        <select name="Lygis">
            <option value="durnas">durnas</option>
            <option value="labai durnas">labai durnas</option>
            <option value="neblogas">neblogas</option>
        </select>
        <input type="submit" name='button' value='submit'>
    </form>
    <?php foreach($atsakymas as $key => $value): ?>
        <p><?php print $value; ?></p>
    <?php endforeach; ?>
    <p><?php print $result; ?></p>
</body>
</html>
<?php 
    $distane = rand(50, 200);
    $consumption = 7.5;
    $price_1 = 1.3;
    $my_money = 15;

    $fuel_used = $distane * $consumption / 100;
    $price_for_fuel = $fuel_used * $price_1;
    $price_for_fuel_f = number_format($price_for_fuel, 2);

    if($price_for_fuel_f > $my_money) {
        $answer = 'not enough cash';
    } else {
        $answer = 'you have enough cash';
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?php print 'Variables'; ?></title>
</head>

<body>
    <h1>Kelionės skaičiuoklė</h1>
    <ul>
        <li>Nuvažiuota distancija: <?php print $distane ?> km.</li>
        <li>Sunaudota <?php print $fuel_used ?> l. kuro</li>
        <li>Kaina: <?php print $price_for_fuel_f ?> piginų</li>
        <li>Cash: <?php print $my_money ?> piginų</li>
        <li><?php print $answer; ?></li>
    </ul>
</body>

</html>

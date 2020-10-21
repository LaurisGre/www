<?php
    $months = 24;
    $car_price_new = 30000;
    $depreciation = 2;
    $car_price_used2 = 30000;

    for ($i = 0; $i <= 24; $i++) {
        $car_price_used = $car_price_new * ((100 - $depreciation) / 100) ** $i;
        // $car_price_used2 *= ((100 - $depreciation) / 100);
    }
    $car_price_used_f = number_format($car_price_used, 2);
    $depr_perc = number_format(100 - $car_price_used * 100 / $car_price_new, 2);
    $h2 = "Naujos mašinos kaina: $car_price_new eur";
    $h3 = "Po $months mėn, mašinos vertė bus: $car_price_used_f eur";
    // $h33 = "Po $months mėn, mašinos vertė bus: $car_price_used2 eur";
    $h4 = "Mašina nuvertės $depr_perc proc.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
    </style>
</head>
<body>
    <h1>Kiek nuvertės mašina?</h1>
    <h2><?php print $h2; ?></h2>
    <h3><?php print $h3; ?></h3>
    <!-- <h3><?php print $h33; ?></h2> -->
    <h4><?php print $h4; ?></h4>
</body>
</html>
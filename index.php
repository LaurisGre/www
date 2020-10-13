<?php date_default_timezone_set('Europe/Vilnius'); ?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title><?php print date('D') . ' ir PHP'; ?></title>
</head>

<body>
    <h1>
        <i>Laurynas</i>
        <span style='font-weight:normal'>
            - HTML<?php print ' ir PHP' ?> asas jau nuo <?php print date('Y') . ' metų' ?>
        </span>
    </h1>
    <p>Viskas prasidėjo <?php print date('M') . ' mėnesio, ' . date('D') . ' dieną!'; ?></p>
</body>

</html>
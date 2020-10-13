<?php date_default_timezone_set('Europe/Vilnius'); ?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title><?php print 'PHP lydės ir ' . date('D', strtotime('+1 day')); ?></title>
</head>

<body>
    <h1>
        <i>Laurynas</i>
        <span style='font-weight:normal'>
            - PHP su manin buvo ir <?php print date('h', strtotime('-1 hour')) . ' valandą'; ?>
        </span>
    </h1>
    <p><?php print date('Y', strtotime('+1 year')) . ' ne už kalnų!'; ?></p>
</body>

</html>
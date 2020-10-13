<?php date_default_timezone_set('Europe/Vilnius'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?php print 'PHP lydės ir ' . date('Y.m.d', strtotime('+' . rand(0, 1000000) . 'days')); ?></title>
</head>

<body>
    <h1>
        <i>Laurynas</i>
        <span style='font-weight:normal'>
            - Galbūt tūrėsiu <?php print rand(1, 5) . ' vaikų(us) !'; ?>
        </span>
    </h1>
    <p>
        D. Trump'as nebebus prezidentas:
        <?php print date('Y.m.d', strtotime('+' . rand(2, 10) . 'year')); ?>
    </p>
</body>
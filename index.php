<?php date_default_timezone_set('Europe/Vilnius'); ?>
<!DOCTYPE html>
<html>

<style>
    body {
        background-color: rgb(
                <?php print rand(0, 100); ?>,
                <?php print rand(0, 100); ?>,
                <?php print rand(0, 100); ?>)
    }

    h1 {
        font-size: <?php print rand(10, 30); ?>px;
    }

    p {
        color: rgb(
            <?php print rand(0, 100); ?>,
            <?php print rand(0, 100); ?>,
            <?php print rand(0, 100); ?>)
    }
</style>

<head>
    <meta charset="UTF-8">
    <title><?php print 'PHP lydės ir ' . date('Y.m.d', strtotime('+' . rand(0, 3650) . 'days')); ?></title>
</head>

<body>
    <h1>
        <i>Laurynas</i>
        - Galbūt tūrėsiu <?php print rand(1, 5) . ' vaikų(us) !'; ?>
    </h1>
    <p>
        D. Trump'as nebebus prezidentas:
        <?php print date('Y.m.d', strtotime('+' . rand(2, 10) . 'year')); ?>
    </p>
</body>
<?php
    $speed_of_sound = 333;
    $max_db = 120;
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
    <h1>Griaustinio zona</h1>
    <?php for($t = 0; $t <= 60; $t++): ?>
        <p>
            <?php 
                $dist = $t * $speed_of_sound;
                $sound = round(($max_db * 0.91 ** ($dist/100)), 3);
                print "Po $t sec $dist m. : $sound db"; 
            ?>
        </p> 
    <?php endfor; ?>
</body>
</html>
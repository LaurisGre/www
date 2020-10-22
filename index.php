<?php
    $rasinys = [];
    $p = '';
    $random_length = rand (20, 40);

    $zodziai = [
        'jonas',
        'petras',
        'ejo',
        'bego',
        'sauke',
        'gere',
        'namas',
        'norfa',
        'po',
        'ant',
    ];

    for($i = 0; $i < $random_length; $i++) {
        $random_word = rand(0, count($zodziai) - 1);
        $rasinys[] = $zodziai[ $random_word];
    }

    foreach($rasinys as $word) {
        $p .= "$word ";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Story Time</title>
</head>
<body>
<h1>Lietuvių egzaminas</h1>
<p>
    <?php print $p; ?>
</p>
</body>
</html>
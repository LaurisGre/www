<?php
    $my_memories = [
        'Taksi',
        'Baras',
        'Klubas',
        'Baras vel',
        'Klubas',
        '???',
        'Namai',
    ];

    $friends_memories = [
        'Taksi',
        'Baras',
        'Klubas',
        'Baras vel',
        'Casino',
        'Mentai',
        'Narvelis',
    ];

    $rand_memory = rand(0, count($my_memories) - 1);
    $h3 = "Flashback $rand_memory : $my_memories[$rand_memory]";

    $common_memories = [];

    foreach($my_memories as $my_memory) {
        if (in_array($my_memory, $friends_memories) && !in_array($my_memory, $common_memories)) {
            $common_memories[] = $my_memory;
        }
    }

    var_dump($common_memories);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Memories</title>
</head>
<body>
    <h1>Kas buvo penktadienį</h1>
    <h2>Mano prisiminimai:</h2>
    <ul>
        <?php foreach($my_memories as $memory): ?>
            <li><?php print $memory; ?></li>
        <?php endforeach; ?>
    </ul>
    <h3><?php print $h3; ?></h3>
    <h3>Draugo prisiminimai:</h3>
    <ul>
        <?php foreach($friends_memories as $friends_memory): ?>
            <li><?php print $friends_memory; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
<?php

function generate_matrix($size) {
    $new_matrix = [];
    for($i = 0 ; $i < $size ; $i++) {
        $new_row = [];
        for($u = 0 ; $u < $size ; $u++) {
            $new_row[] = rand(0, 1);
        }
        $new_matrix[] = $new_row;
    }
    return $new_matrix;
}

$matrix = generate_matrix(8);

function get_winning_rows($mat) {
    $winning_rows = [];
    foreach($mat as $key => $row) {
        if(count(array_unique($row)) === 1){
            $winning_rows[] = $key;
        }
    }
    return $winning_rows;
}

$winners = get_winning_rows($matrix);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Motrix</title>
</head>
<body>
    <article class='matrix_box'>
        <?php foreach($matrix as $key => $row): ?>
            <section class="row <?php if (in_array($key, $winners)) print 'winner'; ?>">   
                <?php foreach($row as $square): ?>
                    <div class='square <?php print $square ? 'gold' : 'blue'; ?>'></div>
                <?php endforeach; ?>
            </section>
        <?php endforeach; ?>
    </article>
    <article>
        <section>Winning rows:</section>
        <?php foreach($winners as $row): ?>
            <p><?php print ($row +1 ); ?></p>
        <?php endforeach; ?>
    </article>
</body>
</html>
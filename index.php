<?php
$x = rand(0, 100);
$y = rand(0, 100);

function is_prime($num) {
    if ($num === 1) {
        return false;
    }

    for ($i = 2 ; $i < $num / 2; $i++) {
        if($num % $i == 0) {
            return false;
        }
    }

    return true;
}

function generate_answer($num) {
    if (is_prime($num)) {
        return "$num yra pirminis skaicius";
    } else {
        return "$num nera pirminis skaicius"; 
    }
}

function sum_if_prime($num1, $num2) {
    if (is_prime($num1) && is_prime($num2)) {
        $sum = $num1 + $num2;
        return "Pirminiu skaiciu suma: $sum";
    } else {
        return "Vienas is skaiciu nera pirminis";
    }
}

$answer1 = generate_answer($x);
$answer2 = generate_answer($y);
$answer3 =  sum_if_prime($x, $y);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prime</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <p><?php print $answer1; ?></p>
    <p><?php print $answer2; ?></p>
    <p><?php print $answer3; ?></p>
</body>
</html>
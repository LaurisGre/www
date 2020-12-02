<?php

use App\App;

require '../../bootloader.php';

$nav_array = nav();

$form = [
    'attr' => [
        'method' => 'POST',
    ],
    'fields' => [
        'equation' => [
            'label' => 'Equation',
            'type' => '',
            'value' => '',
            'validators' => [
                'validate_field_not_empty',
            ],
            'extras' => [
                'attr' => [
                    'placeholder' => 'ex: y =  x**2',
                ],
            ],
        ],
    ],
    'buttons' => [
        'submit' => [
            'title' => 'Graphicatuje panie',
            'type' => 'submit',
            'extras' => [
                'attr' => [
                    'class' => 'btn',
                ],
            ],
        ],
    ],
    'validators' => [
        'validate_login'
    ],
];

//Prints bricks with given coords and color
function print_bricks(float $x, float $y, string $color)
{
    return [
        'coord_x' => $x,
        'coord_y' => round($y, 2),
        'color' => $color,
        'poster' => 'grapher'
    ];
}

// Print Axis
for ($x = 0; $x < 50; $x++) {
    $brick_X = print_bricks($x * 10, 250, 'black');
    $brick_Y = print_bricks(250, $x * 10, 'black');

    App::$db->insertRow('wall', $brick_X);
    App::$db->insertRow('wall', $brick_Y);
}

//Prints blocks calculated from the given equation
for ($x = -250; $x < 240; $x += 1) {
    $calculated_x = $x / 100;

    // y = x**2 
    $calculated_y = $calculated_x ** 2;

    // y = 1/x 
    // if ($calculated_x !== 0) {
    //     $calculated_y = 1 / $calculated_x;
    // }

    // y = sin(x) 
    // $calculated_y = 1 * sin(deg2rad($calculated_x) * 200);

    $abs_y = 250 - $calculated_y * 100;
    $abs_x = abs(-250 - $x);
    if ($abs_y >= 0 && $abs_y <= 490) {
        App::$db->insertRow('wall', print_bricks($abs_x, $abs_y, 'deepskyblue'));
    }
}

$brick_array = App::$db->getRowsWhere('wall');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../media/style.css">
    <title>Grapher</title>
</head>

<body>
    <h1>WELCOME TO THE GREAT POOP-GRAPHER</h1>
    <header>
        <?php require ROOT . '/core/templates/nav.tpl.php'; ?>
    </header>
    <main>
        <section class="poop_box">
            <div class="poop_wall">
                <?php require ROOT . '/core/templates/wall.tpl.php'; ?>
                <?php foreach ($brick_array ?? [] as $brick) : ?>
                    <div <?php print pixel_attr($brick); ?>>
                        <div class="brick_tooltip">
                            <?php print pixel_hint_text($brick); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section>
            <?php require ROOT . '/core/templates/form.tpl.php'; ?>
        </section>
    </main>
</body>

</html>
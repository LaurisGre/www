<?php
$police_report = [
    [
        'subject' => 'Domantas',
        'reason' => 'Public urination',
        'amount' => rand(-200, 200),
    ],
    [
        'subject' => 'Romantas',
        'reason' => 'Not wearing a mask',
        'amount' => rand(-200, 200),
    ],
    [
        'subject' => 'Bobantas',
        'reason' => 'Vote bribery',
        'amount' => rand(-200, 200),
    ],
];

foreach($police_report as $key => $report) {
    $warning_chance = rand(0, 1);
    $police_report[$key]['warning_only'] = $warning_chance ? true : false;
    $police_report[$key]['css_class'] = $report['amount'] > 0 ? 'profit' : 'expense';
    $police_report[$key]['rep'] = $report['subject'] . ' (' . $report['reason'] .') - ' . ($police_report[$key]['warning_only'] ? 'warning' : '$' . $report['amount']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Police Report</title>
    <style>
        .profit {
            color: lawngreen;
        }

        .expense {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Policijos išrašas</h1>
    <ul>
        <?php foreach($police_report as $report): ?>
            <li class="<?php print $report['css_class'] ?>"><?php print $report['rep'] ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
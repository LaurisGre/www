<?php 
    $bin_volume = 40;
    $bin_heap_volume = rand(0, 20);
    $trash_total_volume = $bin_volume + $bin_heap_volume;
    $trash_per_day = 15;
    $trash_full_in_days = $trash_total_volume / $trash_per_day;
    $do_nothing_for_days = ($trash_total_volume - $trash_total_volume % $trash_per_day) / $trash_per_day;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?php print 'Variables'; ?></title>
</head>

<body>
    <h1> the trash bin will be filled in <?php print $trash_full_in_days; ?> days</h1>
    <p>The bins capacity is <?php print $bin_volume; ?> liters</p>
    <p>The wife is fine until the trash doesn't reach <?php print $bin_heap_volume; ?> liters over the bin's capacity</p>
    <h3>I can do nothing for <?php print $do_nothing_for_days; ?> days</h3>
</body>

</html>

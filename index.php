<?php
    $joint_timer = 300 - (date('i') % 5 * 60 + date('s'));
    $joint_minutes = ($joint_timer - $joint_timer % 60) / 60;
    if ($joint_timer % 60 >= 10 ) {
        $joint_seconds = $joint_timer % 60;
    } else {
        $joint_seconds = '0' . $joint_timer % 60;
    }

    $joint_percent = date('i') % 5 * 20 + 20 * date('s') / 60;
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Blaze o'clock</title>
</head>

<meta http-equiv="refresh" content="1" > 

<style>
    body {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    #joint_box {
        height: 200px;
        width: 310px;
        display: flex;
        position: relative;
    }

    #joint_empty {
        width: 100%;
        background-image: url('joint_empty.png');
    }

    #joint_full {
        position: absolute;
        top: 1px;
        left: 24px;
        
        height: 100%;
        width: <?php print $joint_percent; ?>%;
        background-image: url('joint_full.png');
    }

</style>

<body>
    <div>Loading joint <?php print number_format($joint_percent, 2); ?> %</div>
    <div id="joint_box">
        <div id="joint_empty"></div>
        <div id="joint_full"></div>
    </div>
    <div>Next joint in:  <?php print $joint_minutes . ':' . $joint_seconds; ?></div>
</body>

</html>
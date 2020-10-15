<?php
    date_default_timezone_set('Europe/Vilnius');

    $second_arm_degree = date('s') * 6;
    $minute_arm_degree = date('i') * 6 + 6 * (date('s') / 60);
    $hour_arm_degree = date('h') * 30 + 30 * (date('i') / 60);

    $joint_timer = date('i') % 5 * 20 +  20 * (date('s') /60);
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

    #time {
        display: flex;
        flex-direction: column;
        margin-top: 20px;
    }

    #frame {
        height: 400px;
        width: 400px;
        background-image: url('back.png');
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
    }

    .arm {
        position: absolute;
        bottom: 50%;
        left: 50%;
        transform-origin: bottom;
    }

    #second_arm {
        width: 2px;
        height: 160px;
        background-color: lawngreen;
        transform: rotate(<?php print $second_arm_degree ?>deg);
    }

    #minute_arm {
        width: 4px;
        height: 130px;
        background-color: red;
        transform: rotate(<?php print $minute_arm_degree ?>deg);
    }

    #hour_arm {
        width: 8px;
        height: 100px;
        background-color: deepskyblue;
        transform: rotate(<?php print $hour_arm_degree ?>deg);
    }

    #joint_timer {
        display: flex;
        height: 300px;
        width: 310px;
        position: relative;
    }

    #joint_empty {
   
        width: 100%;
        background-image: url('joint_empty.png');
    }

    #joint_full {
        height: 100%;
        width: <?php print $joint_timer; ?>%;
        background-image: url('joint_full.png');
        position: absolute;
        left: 24px;
        top: 1px;
    }

</style>

<body>
    <div id="frame">
        <div id='second_arm' class='arm'></div>
        <div id='minute_arm' class='arm'></div>
        <div id='hour_arm' class='arm'></div>
    </div>
    <div id="time">
        <div>Seconds - <?php print date('s') . ' seconds - ' . $second_arm_degree . ' degrees'; ?></div>
        <div>Minutes - <?php print date('i') . ' minutes - ' . $minute_arm_degree . ' degrees'; ?></div>
        <div>Hours - <?php print date('h') . ' hours - '. $hour_arm_degree . ' degrees'; ?></div>
        <div>Loading next joint <?php print number_format($joint_timer, 2) . ' %'; ?> </div>
    </div>
    <div id="joint_timer">
        <div id="joint_empty"></div>
        <div id="joint_full"></div>
    </div>
</body>

</html>
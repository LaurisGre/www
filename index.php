<?php date_default_timezone_set('Europe/Vilnius'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>C4 go brrr</title>
</head>
<style>
    body {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    #die {
        height: 400px;
        width: 400px;
        border: 20px solid black;
        border-radius: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 100px;
    }

    #timer {
        margin-top: 20px;
        font-size: 30px;
    }

    <?php 
        if (date('s') == 0) {
            print
            '.back {
                background-image: url("https://i.insider.com/5eeb91fd5af6cc61341d2f13?width=1200&format=jpeg");
                backgroung-size: cover;
                background-position: center;
            }';
        } else {
            print
            '.back {
                background-image: url("https://screenshots.gamebanana.com/img/ico/sprays/4ea33068c0dcc.png");
                background-position: center;
                background-repeat: no-repeat;
            }';
        }
    ?>
</style>
<body>
    <div id="die" class="back">
        
    </div>
    <div id="timer">
        <?php 
            print date('s');
        ?>
    </div>
</body>

</html>
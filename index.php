<?php date_default_timezone_set('Europe/Vilnius'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cast the Die</title>
</head>
<style>
    body {
        background-color: rgb(
            <?php print rand(0, 255) ?>,
            <?php print rand(0, 255) ?>,
            <?php print rand(0, 255) ?>);
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #die {
        /* background-color: white; */
        height: 400px;
        width: 400px;
        border: 20px solid black;
        border-radius: 40px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 100px;
    }

    .back {
        background-color: white;
    }

    /* <?php switch (rand(1, 6)) {
            case 1:
                print
                '.back {
                    background-color: red;
                }';
                break;
            case 2:
                print 2;
                break;
            case 3:
                print 3;
                break;
            case 4:
                print 4;
                break;
            case 5:
                print 5;
                break;
            case 6:
                print 6;
                break;
        } ?> */

</style>
<body>
    <div id="die" class="back">
        <?php switch (rand(1, 6)) {
            case 1:
                print '<div>1</div>';
                break;
            case 2:
                print '<div>2</div>';
                break;
            case 3:
                print '<div>3</div>';
                break;
            case 4:
                print '<div>4</div>';
                break;
            case 5:
                print '<div>5</div>';
                break;
            case 6:
                print '<div>6</div>';
                break;
        } ?>
    </div>
</body>

</html>
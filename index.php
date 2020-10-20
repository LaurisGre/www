<?php 
    $days = 365;
    $pack_price = 3.5;
    $total_cigs = 0;
    $total_cigs_mon_fri = 0;
    $time_per_cig = 5;
    $time_total = 0;
    $cigs_printed = 0;

    for($i = 0; $i <= $days; $i ++) {
        $day_of_week = date('N', strtotime("+ $i days"));

        if($day_of_week <= 5) {
            $cigs_mon_fri = rand(3, 4);
            $total_cigs += $cigs_mon_fri;
            $total_cigs_mon_fri += $cigs_mon_fri;
        } else if ($day_of_week == 6) {
            $cigs_sat = rand(10, 20);
            $total_cigs += $cigs_sat;
        } else {
            $cigs_sun = rand(1, 3);
            $total_cigs += $cigs_sun;
        }
    }

    $total_price = ceil($total_cigs / 20) * $pack_price;
    $total_price_mon_fri = ceil($total_cigs_mon_fri / 20) * $pack_price;
    $time_total_hours = (($total_cigs * $time_per_cig) - ($total_cigs * $time_per_cig) % 60) / 60;
    $time_total_minutes = ($total_cigs * $time_per_cig) % 60;

    $h2 = "Per $days dienas, surūkysiu $total_cigs cigarečių už $total_price";
    $h3 = "Nerukydamas darbo dienomis, sutaupyčiau $total_price_mon_fri eur";
    $h33 = "Viso trauktdamas prastovėiu $time_total_hours valandų ir $time_total_minutes minutes";
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Smoke Counter</title>
    <style>
        body{
            display: flex;
            flex-wrap: wrap;
            width: 430px;
        }

        .cig_pack {
            padding: 5px;
            margin: 5px;
            border: 1px solid black;

            display: flex;
            flex-wrap: wrap;
        }

        .cig_img{
            background-image: url('https://lh3.googleusercontent.com/proxy/feYucfacaL1BIzYD3jTyCl7ci7jfVc3fl5uaaGPtiwblmvTcGnnN3feFZi-tjm5GVEydhFRWXmKPJ1JMZXp3S5VHJahMLseJ');
            background-size: contain;
            background-repeat: no-repeat;
            height: 40px;
            width: 40px;
        }
    </style>
</head>
<body>
    <h1>Mano dūmų skaičiuoklė</h1>
    <h2><?php print $h2; ?></h2>
    <h3><?php print $h3; ?></h3>
    <h3><?php print $h33; ?></h3>
    <div>
        <?php for (; $cigs_printed < $total_cigs;): ?>
            <div class='cig_pack'>
                <?php for ($pack_counter = 0; $cigs_printed < $total_cigs && $pack_counter < 20; $pack_counter++, $cigs_printed++): ?>
                    <div class='cig_img'></div>
                <?php endfor; ?>
            </div>
        <?php endfor; ?>
    </div>
</body>
</html>
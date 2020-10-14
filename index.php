<?php 
    $return_late = rand(0, 1);
    $return_drunk = rand(0, 1);

    // if($return_late && $return_drunk) {
    //     $return = 'grįžai vėlai ir išgėręs';
    // } else if ($return_late) {
    //     $return = 'grįžai vėlai';
    // } else if ($return_drunk) {
    //     $return = 'grįžai išgėręs';
    // } else if (!$return_late && !$return_drunk) {
    //     $return = 'nieko napadarei';
    // }

    if($return_late) {
        if($return_drunk) {
            $return = 'grįžai vėlai ir išgėręs';
        } else {
            $return = 'grįžai vėlai';
        }
    } else if($return_drunk) {
        $return = 'grįžai išgėręs';
    } else {
        $return = 'grįžai normaliai';
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?php print 'Variables'; ?></title>
</head>

<body>
    <h1>Buitinė skaičiuoklė</h1>
    <h2><?php print $return_late . $return_drunk; ?></h2>
    <h2><?php print $return; ?></h2>
</body>

</html>

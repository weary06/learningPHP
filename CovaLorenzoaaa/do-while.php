<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $base = 4;
    $i = 1;
    do {
        $j = 1;
        do {
            echo "*";
            $j++;
        } while ($j <= $i);
        echo "<br>";
        $i++;
    } while ($i <= $base);
    ?>
</body>
</html>
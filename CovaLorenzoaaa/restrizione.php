<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function somma(int $x, int $y) {
        $z = $x + $y;
        return $z;
        }
        echo "5 + 10 = " . somma(5, 10) . "<br>";
        echo "7 + 13 = " . somma(7, 13) . "<br>";
        echo "2 + 4 = " . somma(2, 4);
    ?>
</body>
</html>
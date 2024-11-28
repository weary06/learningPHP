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
        function sommaNumeri(int $a, int $b) {
            return $a + $b;
        }
        echo sommaNumeri(5, "5 giorni");
        /* poiché Strict è abilitato e "5 giorni" non è un
        intero, verrà generato un errore */
    ?>
</body>
</html>
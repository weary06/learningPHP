<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $numeri = [];
        $numeripari = 0;
        $numeridispari = 0;
        for ($i=0; $i<20; $i++){
            $numerogenerato = rand(1,100) ;
            $calcolo = $numerogenerato / 2;
            $controllo = var_dump(is_float($calcolo));
            echo $calcolo;
            if ($controllo == TRUE){
                $numeridispari += 1;
            }else{
                $numeripari += 1;
            }
            array_push($numeri, $numerogenerato);
        }
        echo "<h2>i numeri dispari sono: $numeridispari i numeri pari sono: $numeripari</h2>"
    ?>
</body>
</html>
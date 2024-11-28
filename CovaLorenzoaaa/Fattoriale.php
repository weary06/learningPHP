<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fattoriale</title>
<!-- Implementare un semplice programma che stampi il numero fattoriale da 0 a 10. Si ricorda che 0!=1 e che n!=n*(n-1)*(n-2)*...*3*2 -->

</head>
<body>
    <?php
    $i=1;
    echo "<h1> il fattoriale di 0 è 1</h1>";
    for( $x = 1 ; $x <= 10; $x++){
        $i *= $x;
        echo "<h1>il fattoriale di $x è $i </h1>";
    }
    


    ?>
</body>
</html>
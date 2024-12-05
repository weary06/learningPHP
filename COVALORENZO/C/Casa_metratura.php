<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,th,td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
        }
    </style>

</head>
<body>

<?php
//creazione array con 10 valori
$ARR_Casa_metratura = array("Roma"=>"1", "Milano"=>"3", "Trento"=>"7", "Torino"=>"8", "Livorno"=>"6", "Venezia"=>"5", "Biella"=>"2", "Campania"=>"4", "Moncalieri"=>"10", "Nichelino"=>"9");
//ciclo per controllare e stampare controllando gli elementi col valure piu alto
foreach($ARR_Casa_metratura as $x => $x_value) {
    echo "<table>
    <tr>
        <th> $x </th>
        <th> $x_value </th>
    </tr>
    
    
    </table>";
}
?>
    
</body>
</html>
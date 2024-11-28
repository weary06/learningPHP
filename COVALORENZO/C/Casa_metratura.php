<?php
//creazione array con 10 valori
$ARR_Casa_metratura = array("Roma"=>"1", "Milano"=>"3", "Trento"=>"7", "Torino"=>"8", "Livorno"=>"6", "Venezia"=>"5", "Biella"=>"2", "Campania"=>"4", "Moncalieri"=>"10", "Nichelino"=>"9");
//ciclo per controllare e stampare controllando gli elementi col valure piu alto
foreach($ARR_Casa_metratura as $x => $x_value) {
    echo "Chiave=" . $x . ", Valore=" . $x_value;
    echo "<br>";
}
?>
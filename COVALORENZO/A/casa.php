<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $A = $_POST['A'] ?? '';
    $B = $_POST['B'] ?? '';
    
    if ($A != $B /10){
        echo "piano";
    }else{
        echo "metratura";
    }
}

?>
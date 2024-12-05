
<?php
function FunzioneCellulare(int $memoria, int $display){
    $ARR_memoria= array();
    if ($memoria != 0){
        for($i=0; $i<5; $i++){
            $ARR_memoria[$i]=(1/$memoria + rand(1,20));
            if($i % 2 != 0 ){
                echo $ARR_memoria[$i] . "<br>";
            }
        }
    }else{
        echo "non si può dividere per zero";


}
    return $display;
}
FunzioneCellulare(5,10);
FunzioneCellulare(0, 2);
?>

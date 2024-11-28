<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CovaLorenzoCalcolatrice.css">
    <title>Calcolatrice</title>
</head>
<body>
    <div class="box">
        <div>
            <div class="title">Calcolatrice</div>
            <form action="CovaLorenzoCalcolatrice.php" method="post">
                <label for="operando1">Operando 1:</label>
                <input type="number" id="operando1" name="Operando1"><br><br>

                <label for="operando2">Operando 2:</label>
                <input type="number" id="operando2" name="Operando2"><br><br>
            <div class="result-box">
                <label for="risultato">Risultato:</label>
                <input type="text" id="risultato" value="<?php echo $risultato ?? ''; ?>" readonly><br><br> 
            </div>
                <input type="submit" value="Calcola">
            </form>
        </div>
        <div>
            <div class="boxOperandi">
                <div class="titleOperandi">Operazione</div>
                <div>
                    <input type="radio" id="+" name="simbolo" value="+">
                    <label for="+"> + </label><br>
                    <input type="radio" id="*" name="simbolo" value="*">
                    <label for="*"> * </label><br>
                </div>
                <div>
                    <input type="radio" id="-" name="simbolo" value="-">
                    <label for="-"> - </label><br>
                    <input type="radio" id="/" name="simbolo" value="/">
                    <label for="/"> / </label><br>
                </div>
            </div>
        </div>
    </div>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $A = $_POST['Operando1'] ?? '';
            $B = $_POST['Operando2'] ?? '';
            if ($B > 1){
                echo $B;
            }
        }
    ?>
</body>
</html>

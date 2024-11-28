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
        <div class="title">Calcolatrice</div>
        <form action="CovaLorenzoCalcolatrice.php" method="post">
            <label for="operando1">Operando 1:</label>
            <input type="number" id="operando1" name="Operando1"><br><br>

            <label for="operando2">Operando 2:</label>
            <input type="number" id="operando2" name="Operando2"><br><br>

            <label for="operazione">Operazione:</label>
            <input type="radio" id="addizione" name="Operazione" value="+" checked> +
            <input type="radio" id="sottrazione" name="Operazione" value="-"> -
            <input type="radio" id="moltiplicazione" name="Operazione" value="*"> *
            <input type="radio" id="divisione" name="Operazione" value="/"> /<br><br>

            <input type="submit" value="Calcola">
        </form>

        <div class="result-box">
            <label for="risultato">Risultato:</label>
            <input type="text" id="risultato" value="<?php echo $risultato ?? ''; ?>" readonly><br><br>
            <label for="errore">Errore:</label>
            <input type="text" id="errore" value="<?php echo $errore ?? ''; ?>" readonly>
        </div>
    </div>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $A = $_POST['Operando1'] ?? '';
            $B = $_POST['Operando2'] ?? '';
            $operazione = $_POST['Operazione'] ?? '+';

            if (!is_numeric($A) || !is_numeric($B)) {
                $errore = "Per favore inserisci numeri validi.";
                $risultato = '';
            } else {
                switch ($operazione) {
                    case '+':
                        $risultato = $A + $B;
                        break;
                    case '-':
                        $risultato = $A - $B;
                        break;
                    case '*':
                        $risultato = $A * $B;
                        break;
                    case '/':
                        if ($B == 0) {
                            $errore = "Impossibile dividere per zero.";
                            $risultato = '';
                        } else {
                            $risultato = $A / $B;
                        }
                        break;
                    default:
                        $errore = "Operazione non valida.";
                        $risultato = '';
                        break;
                }
            }
        }
    ?>
</body>
</html>

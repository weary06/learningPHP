<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    class Convertitore {
        // attributi della classe
        private $valoreIniziale;
        private $tassoConversione;
        private $valutaIniziale;
        private $valutaFinale;

        // costruttore
        public function __construct($valoreIniziale, $tassoConversione, $valutaIniziale, $valutaFinale) {
            $this->valoreIniziale = $valoreIniziale;
            $this->tassoConversione = $tassoConversione;
            $this->valutaIniziale = $valutaIniziale;
            $this->valutaFinale = $valutaFinale;
        }
        // metodo per la conversione
        public function converti() {
            return $this->valoreIniziale * $this->tassoConversione;
        }

        // metodo per stampare risultati
        public function stampaRisultato() {
            $valoreConvertito = $this->converti();
            echo "<p>$this->valoreIniziale $this->valutaIniziale equivalgono a $valoreConvertito $this->valutaFinale.</p>";
        }
    }

    // oggetti per esempii
    $conversione1 = new Convertitore(100, 0.85, "USD", "EUR");
    $conversione2 = new Convertitore(50, 1.17, "EUR", "USD");

    echo "<h2>Risultati delle Conversioni</h2>";
    $conversione1->stampaRisultato();
    $conversione2->stampaRisultato();
    ?>
</body>
</html>
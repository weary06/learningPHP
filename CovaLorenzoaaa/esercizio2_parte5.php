<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    class Libro {
        // attributi
        private $nome;
        private $prezzo;
        private $scaffale;
        private $pagine;
        private $casaEditrice;

        // metodo per i dettagli dei libri
        public function inizializza($nome, $prezzo, $scaffale, $pagine, $casaEditrice) {
            $this->nome = $nome;
            $this->prezzo = $prezzo;
            $this->scaffale = $scaffale;
            $this->pagine = $pagine;
            $this->casaEditrice = $casaEditrice;
        }

        // metodo per mostrare i dettagli
        public function mostra() {
            echo "<p>>Nome del Libro: $this->nome</p>";
            echo "<p>Prezzo: €" . number_format($this->prezzo, 2) . "</p>";
            echo "<p>Numero di Scaffale: $this->scaffale</p>";
            echo "<p>Numero di Pagine: $this->pagine</p>";
            echo "<p>Casa Editrice: $this->casaEditrice</p>";
        }

        // metodo dello sconto
        public function applicaSconto() {
            $this->prezzo *= 0.9;
        }
    }

    // creazione degli oggeti
    $libro1 = new Libro();
    $libro1->inizializza("Viva la Patagonia", 23.59, "Scaffale A1", 320, "PatagoniaGrandeAmore");
    $libro2 = new Libro();
    $libro2->inizializza("Chi era Lorenzo Giardini?", 1200.93, "Scaffale B2", 400, "Uomini da Nobel");

    echo "<h2>Libri senza Sconto</h2>";
    $libro1->mostra();
    $libro2->mostra();

    // libri scontati
    $libro1->applicaSconto();
    $libro2->applicaSconto();

    echo "<h2>Libri con Sconto del 10%</h2>";
    $libro1->mostra();
    $libro2->mostra();
    ?>
</body>
</html>
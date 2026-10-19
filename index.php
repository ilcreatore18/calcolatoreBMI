<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome"];
    $peso = $_POST["peso"];
    $altezza = $_POST["altezza"];

    $metri = $altezza / 100;
    $bmi = $peso / pow($metri, 2);

    if ($bmi < 18.5) {
        $fascia = "Sottopeso";
        $classe = "sottopeso";
    } elseif ($bmi < 25) {
        $fascia = "Normopeso";
        $classe = "normopeso";
    } elseif ($bmi < 30) {
        $fascia = "Sovrappeso";
        $classe = "sovrappeso";
    } else {
        $fascia = "Obesità";
        $classe = "obesita";
    }
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcolo BMI</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <main>
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>

            <h1 class="title">Il tuo BMI</h1>

            <div class="card risultato <?php echo $classe; ?>">
                <h2>Ciao <?php echo htmlspecialchars($nome); ?>!</h2>
                <p>Peso: <?php echo $peso; ?> kg</p>
                <p>Altezza: <?php echo $altezza; ?> cm</p>
                <p class="bmi"><?php echo round($bmi, 2); ?></p>
                <p class="categoria"><?php echo $fascia; ?></p>
            </div>

            <a class="link" href="index.php">Calcola di nuovo</a>

        <?php } else { ?>

            <h1 class="title">Calcolo BMI</h1>

            <div class="card">
                <h2>Inserisci i tuoi dati</h2>

                <form action="index.php" method="POST">

                    <div class="rigaForm">
                        <label for="nome">Nome:</label>
                        <input type="text" id="nome" name="nome" required>
                    </div>

                    <div class="rigaForm">
                        <label for="peso">Peso (kg):</label>
                        <input type="number" id="peso" name="peso" min="0.1" step="any" required>
                    </div>

                    <div class="rigaForm">
                        <label for="altezza">Altezza (cm):</label>
                        <input type="number" id="altezza" name="altezza" min="1" step="any" required>
                    </div>

                    <button type="submit">Calcola BMI</button>

                </form>
            </div>

        <?php } ?>
    </main>

</body>
</html>
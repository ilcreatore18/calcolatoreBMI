<?php
// Recupero i dati inviati via POST
$nome = isset($_POST['nome']) ? htmlspecialchars($_POST['nome']) : '';
$peso = isset($_POST['peso']) ? floatval($_POST['peso']) : 0;
$altezza = isset($_POST['altezza']) ? floatval($_POST['altezza']) : 0;

// Calcolo del BMI
$bmi = 0;
$classe = '';
$fascia = '';

if ($peso > 0 && $altezza > 0) {
    // Altezza convertita da centimetri a metri
    $altezza_m = $altezza / 100;
    $bmi = $peso / ($altezza_m * $altezza_m);

    // Determinazione della fascia di peso
    if ($bmi < 18.5) {
        $classe = 'sottopeso';
        $fascia = 'SOTTOPESO';
    } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
        $classe = 'normopeso';
        $fascia = 'NORMOPESO';
    } elseif ($bmi >= 25.0 && $bmi <= 29.9) {
        $classe = 'sovrappeso';
        $fascia = 'SOVRAPPESO';
    } else {
        $classe = 'obesita';
        $fascia = 'OBESITÀ';
    }
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Risultato BMI</title>
    <link rel="stylesheet" href="stile.css">
</head>
<body>

    <div>
        <div class="card <?php echo $classe; ?>">
            <h2><?php echo $nome; ?></h2>
            <p class="dati-utente">Peso <?php echo $peso; ?> kg - Altezza <?php echo $altezza; ?> cm</p>
            <div class="bmi-valore"><?php echo number_format($bmi, 2); ?></div>
            <div class="fascia-nome"><?php echo $fascia; ?></div>
        </div>
        <div style="text-align: center;">
            <a href="form.html" class="link-ricalcola">Calcola di nuovo</a>
        </div>
    </div>

</body>
</html>
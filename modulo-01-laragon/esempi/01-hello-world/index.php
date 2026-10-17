<?php
/**
 * ESEMPIO 1.1 — Hello World: la nostra prima pagina PHP su Laragon
 * -------------------------------------------------
 * Posizionamento: C:\laragon\www\hello-world\index.php
 * Accesso dal browser: http://hello-world.test
 *
 * CONCETTI DIMOSTRATI:
 *  - Blocco PHP <?php ... ?>
 * * - echo per inviare output al browser
 *  - Interruzione del PHP per scrivere HTML puro
 */

// Tutto ciò che scriviamo qui viene eseguito SUL SERVER
$nomeScuola = "ITI Informatica";
$anno       = 2026;
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Hello Laragon</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 700px; margin: 3rem auto; padding: 0 1rem; }
        .badge { background: #0E83CD; color: #fff; padding: .2rem .6rem; border-radius: 4px; }
        code  { background: #f0f0f0; padding: .1rem .4rem; border-radius: 3px; }
    </style>
</head>
<body>
    <h1>🚀 Funziona! <span class="badge">Laragon attivo</span></h1>

    <!-- PHP si "fonde" con l'HTML usando <?= ... ?> (short echo) -->
    <p>Benvenuto alla <?= $nomeScuola ?> — anno scolastico <?= $anno ?>.</p>

    <p>Stai visitando: <code><?= $_SERVER['HTTP_HOST'] ?></code></p>

    <h2>Diagnostica ambiente</h2>
    <ul>
        <li>Versione PHP: <strong><?= PHP_VERSION ?></strong></li>
        <li>Sistema operativo: <strong><?= PHP_OS_FAMILY ?></strong></li>
        <li>Ora del server: <strong><?= date('d/m/Y H:i:s') ?></strong></li>
    </ul>

    <h2>🔍 Cosa vedremo nel Modulo 2</h2>
    <p>Le superglobali come <code>$_SERVER</code> contengono TUTTE le informazioni
       sulla richiesta HTTP: in Modulo 2 impareremo a usarle con GET e POST.</p>

    <?php
    // Scommenta la riga seguente per una pagina diagnostica completa:
    // phpinfo();
    // ⚠️ NON lasciare phpinfo() attivo in produzione: mostra dettagli
    //    sensibili del server (percorsi, configurazioni) a chiunque!
    ?>
</body>
</html>
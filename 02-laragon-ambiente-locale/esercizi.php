<?php
/**
 * 🌐 MODULO 02 — Laragon e l'Ambiente Locale
 *
 * COME SI APRE:
 *   1. Avvia Laragon (Avvia tutto)
 *   2. Vai su http://localhost/quinte-2627/02-laragon-ambiente-locale/esercizi.php
 *      (adatta il percorso alla posizione della repo dentro www)
 *
 * Completa i punti 👉 TODO. Il resto è già funzionante.
 */

ini_set('display_errors', '1');
error_reporting(E_ALL);

// ─────────────────────────────────────────────
// 🧪 ESEMPIO GIÀ PRONTO — Cosa sa il server di sé?
// ─────────────────────────────────────────────
$versionePhp  = PHP_VERSION;                              // versione di PHP in uso
$softwareWeb  = $_SERVER['SERVER_SOFTWARE'] ?? 'non disponibile (terminale?)';
$cartellaFile = __DIR__;                                  // dove si trova QUESTO file
$ora          = (int) date('H');                          // ora attuale (0-23)

// ─────────────────────────────────────────────
// 👋 MISSIONE 1 — Saluto in base all'ora
// 👉 TODO: restituisci
//    "Buongiorno ☀️"       dalle 5 alle 12
//    "Buon pomeriggio 🌤️"  dalle 13 alle 17
//    "Buonasera 🌙"        dalle 18 alle 4 (notte inclusa)
// ─────────────────────────────────────────────
function saluto(int $ora): string
{
    // 👉 TODO
    return "Ciao 👋";
}

// ─────────────────────────────────────────────
// 📆 MISSIONE 2 — Giorni al fine settimana
// 👉 TODO: usa date('N') (1 = lunedì ... 7 = domenica)
//          e restituisci quanti giorni mancano a sabato
//          (0 se oggi è sabato o domenica)
// ─────────────────────────────────────────────
function giorniAlWeekend(): int
{
    // 👉 TODO
    return -1;
}

// ─────────────────────────────────────────────
// 🧱 MISSIONE 3 — Menu di navigazione con foreach
// 👉 TODO: completa l'array $pagine (nome => file) e, nel <ul> più sotto,
//          stampa un <li><a href="...">...</a></li> per ogni pagina
// ─────────────────────────────────────────────
$pagine = [
    'Home' => 'index.php',
    // 👉 TODO: aggiungi almeno altre 2 pagine
];

// ─────────────────────────────────────────────
// 🔥 MISSIONE 4 (BONUS) — include
// 👉 TODO: crea header.php e footer.php in questa cartella
//          poi attiva le due righe `include` nell'HTML qui sotto
// ─────────────────────────────────────────────
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Modulo 02 — Esercizi</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 700px; margin: 2rem auto; padding: 0 1rem; }
        table { border-collapse: collapse; }
        td { border: 1px solid #ccc; padding: .4rem .8rem; }
        code { background: #eee; padding: 0 .3rem; border-radius: 4px; }
    </style>
</head>
<body>
    <?php // include 'header.php'; ?>

    <h1><?= saluto($ora) ?></h1>

    <h2>🔍 Informazioni dal server</h2>
    <table>
        <tr><td>Versione PHP</td><td><code><?= htmlspecialchars($versionePhp) ?></code></td></tr>
        <tr><td>Software server</td><td><code><?= htmlspecialchars($softwareWeb) ?></code></td></tr>
        <tr><td>Cartella del file</td><td><code><?= htmlspecialchars($cartellaFile) ?></code></td></tr>
        <tr><td>Data e ora</td><td><code><?= date('d/m/Y H:i:s') ?></code></td></tr>
    </table>

    <h2>📆 Missione 2</h2>
    <p>Giorni al weekend: <strong><?= giorniAlWeekend() ?></strong></p>

    <h2>🧭 Missione 3 — Menu</h2>
    <ul>
        <?php foreach ($pagine as $nome => $file): ?>
            <!-- 👉 TODO: stampa qui il <li> con il link -->
        <?php endforeach; ?>
    </ul>

    <?php // include 'footer.php'; ?>
</body>
</html>

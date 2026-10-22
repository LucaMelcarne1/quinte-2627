<?php
/**
 * 📝 MODULO 03 — Form e Input Utente
 * Missione: "Il Modulo d'Iscrizione al Club"
 *
 * COME SI APRE: http://localhost/quinte-2627/03-form-e-input-utente/esercizi.php
 *
 * Il form è già disegnato. Tu devi completare la LOGICA PHP (👉 TODO).
 */

ini_set('display_errors', '1');
error_reporting(E_ALL);

// Linguaggi ammessi: l'unica "lista bianca" di cui ci fidiamo
const LINGUAGGI = ['PHP', 'JavaScript', 'Python', 'C++', 'Java'];

// Valori iniziali (servono per ripopolare il form)
$nome = $email = $eta = $linguaggio = '';
$accetto = false;
$errori = [];
$iscrizioneOk = false;

// ─────────────────────────────────────────────
// 🧰 Funzione di utilità GIÀ PRONTA: abbreviazione per l'escaping
// ─────────────────────────────────────────────
function e(string $testo): string
{
    return htmlspecialchars($testo, ENT_QUOTES, 'UTF-8');
}

// ─────────────────────────────────────────────
// 🎬 Elaborazione: parte solo se il form è stato inviato
// ─────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 1️⃣ Lettura dati (già pronta). Il cast (string) evita sorprese con array malevoli.
    $nome       = trim((string) ($_POST['nome'] ?? ''));
    $email      = trim((string) ($_POST['email'] ?? ''));
    $eta        = trim((string) ($_POST['eta'] ?? ''));
    $linguaggio = (string) ($_POST['linguaggio'] ?? '');
    $accetto    = isset($_POST['accetto']);

    // 2️⃣ Validazione — 👉 TODO: aggiungi un messaggio a $errori per ogni problema

    // 👉 TODO: nome obbligatorio, almeno 2 caratteri (usa mb_strlen)

    // 👉 TODO: email valida (usa filter_var con FILTER_VALIDATE_EMAIL)

    // 👉 TODO: età intera tra 14 e 99 (usa filter_var con FILTER_VALIDATE_INT e min_range/max_range)

    // 👉 TODO: linguaggio presente in LINGUAGGI (usa in_array con il terzo parametro true)

    // 👉 TODO: la checkbox $accetto deve essere true

    // 3️⃣ Esito
    if (empty($errori)) {
        $iscrizioneOk = true;

        // 🔥 BONUS 👉 TODO: salva la riga "nome;email;linguaggio" in iscritti.txt
        //     con file_put_contents(__DIR__ . '/iscritti.txt', $riga . PHP_EOL, FILE_APPEND);
    }
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Club di Informatica 💻</title>
    <style>
        body   { font-family: system-ui, sans-serif; max-width: 520px; margin: 2rem auto; padding: 0 1rem; }
        label  { display: block; margin-top: 1rem; font-weight: 600; }
        input[type=text], input[type=email], input[type=number], select { width: 100%; padding: .5rem; box-sizing: border-box; }
        button { margin-top: 1.5rem; padding: .6rem 1.2rem; cursor: pointer; }
        .errori { background: #ffe5e5; border-left: 4px solid #d73a49; padding: .5rem 1rem; }
        .tessera{ background: #e6ffed; border: 2px dashed #2ea043; padding: 1rem 1.5rem; border-radius: 12px; }
    </style>
</head>
<body>
    <h1>💻 Club di Informatica</h1>

    <?php if (!empty($errori)): ?>
        <div class="errori">
            <strong>Ops, qualcosa non va:</strong>
            <ul>
                <?php foreach ($errori as $errore): ?>
                    <li><?= e($errore) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if ($iscrizioneOk): ?>
        <!-- 🎟️ La tessera: compare solo se tutto è valido -->
        <div class="tessera">
            <h2>🎉 Benvenutə nel club, <?= e($nome) ?>!</h2>
            <p>📧 <?= e($email) ?></p>
            <p>🎂 <?= e($eta) ?> anni</p>
            <p>⌨️ Linguaggio preferito: <strong><?= e($linguaggio) ?></strong></p>
        </div>
    <?php else: ?>
        <form action="" method="post" novalidate>
            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" value="<?= e($nome) ?>">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= e($email) ?>">

            <label for="eta">Età</label>
            <input type="number" id="eta" name="eta" value="<?= e($eta) ?>">

            <label for="linguaggio">Linguaggio preferito</label>
            <select id="linguaggio" name="linguaggio">
                <option value="">-- scegli --</option>
                <?php foreach (LINGUAGGI as $l): ?>
                    <option value="<?= e($l) ?>" <?= $linguaggio === $l ? 'selected' : '' ?>><?= e($l) ?></option>
                <?php endforeach; ?>
            </select>

            <label>
                <input type="checkbox" name="accetto" <?= $accetto ? 'checked' : '' ?>>
                Accetto il regolamento del club
            </label>

            <button type="submit">Iscrivimi 🚀</button>
        </form>
    <?php endif; ?>
</body>
</html>

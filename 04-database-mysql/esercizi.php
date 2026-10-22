<?php
/**
 * 🗄️ MODULO 04 — Database MySQL
 * Missione: "Il Registro Elettronico"
 *
 * PRIMA DI INIZIARE:
 *   1. Avvia Laragon (Apache + MySQL)
 *   2. Esegui schema.sql in HeidiSQL
 *   3. Apri http://localhost/quinte-2627/04-database-mysql/esercizi.php
 *
 * Completa i punti 👉 TODO.
 */

ini_set('display_errors', '1');
error_reporting(E_ALL);

// ─────────────────────────────────────────────
// 🔌 CONNESSIONE (già pronta)
// ─────────────────────────────────────────────
// Parametri di default di Laragon: utente root, password vuota.
$dsn = "mysql:host=localhost;dbname=scuola;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, "root", "", [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $ex) {
    die("💥 Connessione fallita: " . htmlspecialchars($ex->getMessage())
        . "<br>Hai avviato MySQL in Laragon ed eseguito schema.sql?");
}

// Funzione di utilità per l'escaping (già pronta)
function e(string $testo): string
{
    return htmlspecialchars($testo, ENT_QUOTES, 'UTF-8');
}

$errori = [];

// ─────────────────────────────────────────────
// ➕ MISSIONE 3 — CREATE: inserimento di un nuovo studente
// 👉 TODO: se il form è stato inviato (POST con campo 'azione' = 'nuovo'):
//    - leggi e fai trim() di nome, cognome, classe
//    - valida: nessun campo vuoto, classe tra 2 e 5 caratteri
//    - se ok, esegui un INSERT con QUERY PREPARATA (segnaposto ?)
//    - altrimenti aggiungi i messaggi a $errori
// ─────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['azione'] ?? '') === 'nuovo') {
    // 👉 TODO
}

// ─────────────────────────────────────────────
// 🔥 MISSIONE 5 (BONUS) — DELETE
// 👉 TODO: se POST con azione = 'elimina' e un 'id' intero valido,
//          esegui DELETE FROM studenti WHERE id = ? (query preparata!)
// ─────────────────────────────────────────────
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['azione'] ?? '') === 'elimina') {
    // 👉 TODO
}

// ─────────────────────────────────────────────
// 📖 MISSIONE 2 + 4 — READ con media voti e filtro per classe
// 👉 TODO: sostituisci la query semplice qui sotto con una che:
//    - faccia LEFT JOIN con la tabella voti
//    - calcoli ROUND(AVG(v.voto), 2) AS media
//    - raggruppi per studente (GROUP BY s.id)
//    - se esiste $_GET['classe'], filtri con WHERE s.classe = ? (preparata!)
// ─────────────────────────────────────────────
$classeFiltro = trim((string) ($_GET['classe'] ?? ''));

// Query "di partenza" (senza media e senza filtro): da migliorare!
$stmt = $pdo->prepare("SELECT s.id, s.nome, s.cognome, s.classe, NULL AS media FROM studenti AS s");
$stmt->execute();
$studenti = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro Elettronico 📒</title>
    <style>
        body  { font-family: system-ui, sans-serif; max-width: 720px; margin: 2rem auto; padding: 0 1rem; }
        table { border-collapse: collapse; width: 100%; margin: 1rem 0; }
        th, td{ border: 1px solid #ccc; padding: .5rem .8rem; text-align: left; }
        th    { background: #f3f3f3; }
        .errori { background: #ffe5e5; border-left: 4px solid #d73a49; padding: .5rem 1rem; }
        form.nuovo input { margin: .2rem; padding: .4rem; }
    </style>
</head>
<body>
    <h1>📒 Registro Elettronico</h1>

    <?php if ($errori): ?>
        <div class="errori">
            <ul><?php foreach ($errori as $err): ?><li><?= e($err) ?></li><?php endforeach; ?></ul>
        </div>
    <?php endif; ?>

    <!-- 🔎 Filtro per classe (GET, perché è una ricerca) -->
    <form method="get">
        <label>Classe: <input type="text" name="classe" value="<?= e($classeFiltro) ?>" placeholder="es. 5A"></label>
        <button type="submit">Filtra 🔎</button>
        <a href="?">Azzera</a>
    </form>

    <table>
        <thead>
            <tr><th>#</th><th>Studente</th><th>Classe</th><th>Media</th><th>Azioni</th></tr>
        </thead>
        <tbody>
            <?php foreach ($studenti as $s): ?>
                <tr>
                    <td><?= (int) $s['id'] ?></td>
                    <td><?= e($s['nome'] . ' ' . $s['cognome']) ?></td>
                    <td><?= e($s['classe']) ?></td>
                    <td><?= $s['media'] !== null ? e((string) $s['media']) : '—' ?></td>
                    <td>
                        <!-- 🔥 BONUS 👉 TODO: form POST con azione=elimina e id dello studente -->
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>➕ Nuovo studente</h2>
    <form method="post" class="nuovo">
        <input type="hidden" name="azione" value="nuovo">
        <input type="text" name="nome" placeholder="Nome">
        <input type="text" name="cognome" placeholder="Cognome">
        <input type="text" name="classe" placeholder="Classe" size="5">
        <button type="submit">Aggiungi 🚀</button>
    </form>
</body>
</html>

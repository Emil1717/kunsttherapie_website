<?php
// Datenbankverbindung
$host = 'localhost';
$user = 'anjahennemann_user';
$password = 'nohwi3-Qisbon-wytpur';
$dbname = 'anjahennemann_db';

try {
    // Erstelle eine neue PDO-Verbindung
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Verbindung gescheitert: ' . $e->getMessage();
    exit();
}

// Formulardaten abrufen und validieren
$vorname = htmlspecialchars($_POST['vorname'] ?? '');
$nachname = htmlspecialchars($_POST['nachname'] ?? '');
$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$tel = htmlspecialchars($_POST['tel'] ?? '');
$street = htmlspecialchars($_POST['street'] ?? '');
$city = htmlspecialchars($_POST['city'] ?? '');
$postalcode = htmlspecialchars($_POST['postalcode'] ?? '');
$country = htmlspecialchars($_POST['country'] ?? '');

// Überprüfen, ob alle Felder ausgefüllt wurden
if (!$vorname || !$nachname || !$email || !$tel || !$street || !$city || !$postalcode || !$country) {
    echo "<script type='text/javascript'>
            alert('Anmeldung fehlgeschlagen. Bitte füllen Sie alle Felder aus.');
            window.history.back();  // Geht zur vorherigen Seite zurück
          </script>";
    exit(); // Verhindert, dass der Code weiter ausgeführt wird
}

// Kurswert aus POST-Daten abrufen
$kurs = $_POST['kurs'] ?? null;

// Überprüfen, ob der Kurswert leer ist
if (!$kurs) {
    die("Kurswert fehlt!");
}

// Überprüfen, ob die E-Mail bereits für den angegebenen Kurs existiert
$stmt = $pdo->prepare("SELECT COUNT(*) FROM all_participants WHERE email = ? AND kurs = ?");
$stmt->execute([$email, $kurs]);  // Kurs als zweiten Parameter hinzufügen
$count = $stmt->fetchColumn();

// Wenn der Benutzer sich bereits für den Kurs angemeldet hat
if ($count > 0) {
    echo "<script type='text/javascript'>
    alert('Du hast dich bereits für diesen Kurs angemeldet.');
    window.history.back();  // Geht zur vorherigen Seite zurück
  </script>";
  exit();
} else {
    // Anmeldung fortsetzen
    // Führe hier den Code aus, um den Teilnehmer zu registrieren
}

// Daten speichern (nach Überprüfung, dass die E-Mail nicht existiert)
$stmt = $pdo->prepare("INSERT INTO all_participants (vorname, nachname, email, tel, street, city, postalcode, country, kurs) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->execute([$vorname, $nachname, $email, $tel, $street, $city, $postalcode, $country, $kurs]);

if ($stmt) {
    // Weiterleitung zur Zielseite nach erfolgreicher Anmeldung
    header("Location: ../../public/response_pages/sign_up_confirmed.html");  // Hier gibst du die URL zur Ziel-HTML-Seite an
    exit();  // Wichtig: Den Script-Flow hier stoppen
} else {
    echo "<script type='text/javascript'>
    alert('Anmeldung fehlgeschlagen. Bitte versuche es noch einmal.');
    window.history.back();  // Geht zur vorherigen Seite zurück
  </script>";
}

?>

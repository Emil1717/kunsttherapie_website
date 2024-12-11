<?php
// Überprüfen, ob das Formular abgesendet wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Eingaben aus dem Formular abrufen und "sicher" machen
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Validierung der Eingaben (optional, aber empfohlen)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Ungültige E-Mail-Adresse.";
        exit;
    }

    // Empfängeradresse (deine E-Mail-Adresse)
    $empfaenger = 'info@anjahennemann.de'; // Ersetze dies mit deiner E-Mail-Adresse

    // Betreff der E-Mail
    $betreff = "Neue Nachricht von deiner Webseite";

    // Nachrichtentext
    $nachricht = "Name: $name\n";
    $nachricht .= "E-Mail: $email\n\n";
    $nachricht .= "Nachricht:\n$message\n";

    // Zusätzliche Header (z. B. Absenderadresse)
    $header = "From: $email\r\n";
    $header .= "Reply-To: $email\r\n";

    // E-Mail senden
    if (mail($empfaenger, $betreff, $nachricht, $header)) {
        echo "Danke, deine Nachricht wurde erfolgreich gesendet.";
    } else {
        echo "Es gab ein Problem beim Senden der Nachricht.";
    }
} else {
    echo "Bitte fülle das Formular aus.";
}
?>

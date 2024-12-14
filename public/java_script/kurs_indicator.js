document.addEventListener('DOMContentLoaded', function() {
    var kurs = '';  // Default Kurs

    // Überprüfen der Seite und setzen des Kurswertes
    if (window.location.pathname.includes('kurs_1')) {
        kurs = '1';
    } else if (window.location.pathname.includes('kurs_2')) {
        kurs = '2';
    } else if (window.location.pathname.includes('kurs_3')) {
        kurs = '3';
    }

    // console.log('Kurs gesetzt:', kurs);  // Log-Ausgabe für Debugging

    // Dynamisches Laden des Anmeldeformulars
    fetch('anmeldung.html')
        .then(response => response.text())
        .then(data => {
            // Den Inhalt von #anmeldung-container setzen
            document.getElementById('anmeldung-container').innerHTML = data;

            // Jetzt das versteckte Feld setzen, nachdem der Inhalt geladen ist
            document.getElementById('kurs').value = kurs;
        })
        .catch(error => console.error('Fehler beim Laden der Anmeldung:', error));
});


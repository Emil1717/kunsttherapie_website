
document.addEventListener("DOMContentLoaded", () => {
    // Navbar einbinden
    fetch('navbar.html')
        .then(response => {
            if (!response.ok) throw new Error('Netzwerkfehler: Navbar konnte nicht geladen werden.');
            return response.text();
        })
        .then(data => {
            document.getElementById('navbar-container').innerHTML = data;
        })
        .catch(error => console.error('Fehler:', error));
});

document.addEventListener("DOMContentLoaded", () => {
    // Navbar einbinden
    fetch('footer.html')
        .then(response => {
            if (!response.ok) throw new Error('Netzwerkfehler: Footer konnte nicht geladen werden.');
            return response.text();
        })
        .then(data => {
            document.getElementById('footer-container').innerHTML = data;
        })
        .catch(error => console.error('Fehler:', error));
});

document.addEventListener("DOMContentLoaded", () => {
    // Navbar einbinden
    fetch('contact.html')
        .then(response => {
            if (!response.ok) throw new Error('Netzwerkfehler: Contact Formular konnte nicht geladen werden.');
            return response.text();
        })
        .then(data => {
            document.getElementById('contact-container').innerHTML = data;
        })
        .catch(error => console.error('Fehler:', error));
});

document.addEventListener("DOMContentLoaded", () => {
    // Navbar einbinden
    fetch('anmeldung.html')
        .then(response => {
            if (!response.ok) throw new Error('Netzwerkfehler: Anmeldeformular konnte nicht geladen werden.');
            return response.text();
        })
        .then(data => {
            document.getElementById('anmeldung-container').innerHTML = data;
        })
        .catch(error => console.error('Fehler:', error));
});


document.addEventListener('DOMContentLoaded', function () {
    const loader = document.getElementById('loader');
    const gallery = document.getElementById('gallery');
    const images = document.querySelectorAll('#gallery img');
    
    let imagesLoaded = 0;
    const totalImages = images.length;

    images.forEach(img => {
        img.addEventListener('load', () => {
            imagesLoaded++;
            
            // Überprüfen, ob alle Bilder geladen sind
            if (imagesLoaded === totalImages) {
                loader.style.display = 'none';  // Ladebalken ausblenden
                gallery.classList.remove('hidden'); // Galerie anzeigen
            }
        });

        img.addEventListener('error', () => {
            imagesLoaded++;
            
            // Auch bei Fehlern sollte der Ladebalken verschwinden
            if (imagesLoaded === totalImages) {
                loader.style.display = 'none';  // Ladebalken ausblenden
                gallery.classList.remove('hidden'); // Galerie anzeigen
            }
        });
    });
});

const scrollIndicator = document.getElementById('scroll-indicator');

// Funktion zur Überprüfung des Scroll-Zustands
function checkScrollPosition() {
    if (window.scrollY > 10) {
        scrollIndicator.classList.add("opacity-0", "pointer-events-none");
    } else {
        scrollIndicator.classList.remove("opacity-0", "pointer-events-none");
    }
}

// Event-Listener für Scroll-Event
window.addEventListener('scroll', checkScrollPosition);

// Initiale Überprüfung beim Laden der Seite
checkScrollPosition();

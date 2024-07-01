// Burger

document.addEventListener('DOMContentLoaded', function() {
    const hamburgerButton = document.getElementById('hamburger-button');
    hamburgerButton.addEventListener('click', function() {
        this.classList.toggle('active');
    });
});

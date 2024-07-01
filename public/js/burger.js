// Burger Animation
document.getElementById('hamburger-button').addEventListener('click', function () {
    var mobileMenu = document.getElementById('mobile-menu');
    var hamburgerButton = document.getElementById('hamburger-button');
    
    if (mobileMenu.style.display === 'block') {
        mobileMenu.style.display = 'none';
        hamburgerButton.classList.remove('active');
    } else {
        mobileMenu.style.display = 'block';
        hamburgerButton.classList.add('active');
    }
});

// Mobile menu
document.getElementById('close-button').addEventListener('click', function () {
    var mobileMenu = document.getElementById('mobile-menu');
    var hamburgerButton = document.getElementById('hamburger-button');

    mobileMenu.style.display = 'none';
    hamburgerButton.classList.remove('active');
});


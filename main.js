// assets/js/main.js
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const hamburger = document.querySelector('.hamburger');
    const navLinks = document.querySelector('.nav-links');
    
    if (hamburger) {
        hamburger.addEventListener('click', function() {
            this.classList.toggle('active');
            navLinks.classList.toggle('active');
        });
    }
    
    // Close mobile menu when clicking a link
    document.querySelectorAll('.nav-links a').forEach(link => {
        link.addEventListener('click', function() {
            if (hamburger) hamburger.classList.remove('active');
            if (navLinks) navLinks.classList.remove('active');
        });
    });
    
    // Check authentication for protected pages
    if (document.body.classList.contains('protected-page')) {
        checkAuth();
    }
    
    // Contact form handling
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', handleContactSubmit);
    }
});

function checkAuth() {
    fetch('check_auth.php')
        .then(response => response.json())
        .then(data => {
            if (!data.authenticated) {
                window.location.href = 'login.php?redirect=' + encodeURIComponent(window.location.pathname);
            }
        })
        .catch(error => {
            console.error('Auth check failed:', error);
        });
}

function handleContactSubmit(e) {
    e.preventDefault();
    // Add your contact form handling logic here
    alert('Contact form submitted!');
}
document.addEventListener("DOMContentLoaded", function() {
    const contactForm = document.getElementById('contact-form');
    contactForm.addEventListener('submit', function(event) {
        event.preventDefault();
        alert('Obrigado por entrar em contato!');
    });
});

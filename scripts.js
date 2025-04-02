document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const contactForm = document.getElementById('contactForm');

    if (loginForm) {
        loginForm.addEventListener('submit', (e) => {
            const username = loginForm.querySelector('#username').value;
            const password = loginForm.querySelector('#password').value;
            if (!username || !password) {
                e.preventDefault();
                alert('Kérjük, töltse ki az összes mezőt!');
            }
        });
    }

    if (registerForm) {
        registerForm.addEventListener('submit', (e) => {
            const username = registerForm.querySelector('#reg_username').value;
            const password = registerForm.querySelector('#reg_password').value;
            const firstname = registerForm.querySelector('#firstname').value;
            const lastname = registerForm.querySelector('#lastname').value;
            if (!username || !password || !firstname || !lastname) {
                e.preventDefault();
                alert('Kérjük, töltse ki az összes mezőt!');
            }
        });
    }

    if (contactForm) {
        contactForm.addEventListener('submit', (e) => {
            const name = contactForm.querySelector('#name').value;
            const email = contactForm.querySelector('#email').value;
            const message = contactForm.querySelector('#message').value;
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!name || !emailRegex.test(email) || !message) {
                e.preventDefault();
                alert('Kérjük, töltse ki az összes mezőt helyesen!');
            }
        });
    }
});
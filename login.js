document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('loginForm');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');

    loginForm.addEventListener('submit', (e) => {
        let isValid = true;

        if (!validateEmail(emailInput.value)) {
            emailError.textContent = 'Format email tidak valid.';
            isValid = false;
        } else {
            emailError.textContent = '';
        }

        if (passwordInput.value.length === 0) {
            passwordError.textContent = 'Password tidak boleh kosong.';
            isValid = false;
        } else {
            passwordError.textContent = '';
        }

        if (!isValid) {
            e.preventDefault();
        }
    });

    function validateEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(emaill);
    }
});
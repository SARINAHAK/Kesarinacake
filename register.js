document.addEventListener('DOMContentLoaded', () =>{
    const registerForm = document.getElementById('registerForm');
    const emailInput = document.getElementById('email');
    const passwordInput = document.getElementById('password');
    const confirmPasswordInput = document.getElementById('confirmPassword');
    const emailError = document.getElementById('emailError');
    const passwordError = document.getElementById('passwordError');

    if (!registerForm || !emailInput || !passwordInput || !confirmPasswordInput || !emailError || !passwordError) {
        console.error('One or more elements were not found.');
        return;
    }
    
    registerForm.addEventListener('submit', (e) => {
        let isValid = true;

        if (! validateEmail(emailInput.value)) {
            emailError.textContent = 'Format email tidak valid.';
            isValid = false;
        } else {
            emailError.textContent = '';
        }

        if (passwordInput.value.length <6) {
            passwordError.textContent = 'Password harus minimal 6 karakter.';
            isValid = false;
        } else if (passwordInput.value !== confirmPasswordInput.value) {
            passwordError.textContent = 'Password tidak cocok.';
            isValid = false;
        } else {
            passwordError.textContent = '';
        }

        if (!isValid){
            e.preventDefault();
        }
    });

    function validateEmail(email) {
        const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return regex.test(email);
    }
});
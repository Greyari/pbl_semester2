document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.querySelector('input[type="password"]');
    const eyeIcon = document.querySelector('.inputBox .mata');

    eyeIcon.style.display = 'none';

    eyeIcon.addEventListener('click', function () {
        togglePasswordVisibility(passwordInput, eyeIcon);
    });

    passwordInput.addEventListener('input', toggleEyeIcon);

    function togglePasswordVisibility(input, eyeIcon) {
        if (input.type === 'password') {
            input.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    }

    function toggleEyeIcon() {
        if (passwordInput.value.trim() !== '') {
            eyeIcon.style.display = 'block';
        } else {
            eyeIcon.style.display = 'none';
        }
    }
});

document.addEventListener('DOMContentLoaded', function () {
    const passwordInput = document.querySelector('input[name="password"]');
    const confirmPasswordInput = document.querySelector('input[name="password1"]');
    const eyeIconPassword = document.querySelector('.inputBox .mata');
    const eyeIconConfirmPassword = document.querySelector('.inputBox .mata1');

    eyeIconPassword.style.display = 'none';
    eyeIconConfirmPassword.style.display = 'none';

    eyeIconPassword.addEventListener('click', function () {
        togglePasswordVisibility(passwordInput, eyeIconPassword);
    });

    eyeIconConfirmPassword.addEventListener('click', function () {
        togglePasswordVisibility(confirmPasswordInput, eyeIconConfirmPassword);
    });

    passwordInput.addEventListener('input', toggleEyeIcon);
    confirmPasswordInput.addEventListener('input', toggleEyeIcon);

    function togglePasswordVisibility(input, eyeIcon) {
        if (input.type === 'password') {
            input.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            input.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    }

    function toggleEyeIcon() {
        if (passwordInput.value.trim() !== '') {
            eyeIconPassword.style.display = 'block';
        } else {
            eyeIconPassword.style.display = 'none';
        }

        if (confirmPasswordInput.value.trim() !== '') {
            eyeIconConfirmPassword.style.display = 'block';
        } else {
            eyeIconConfirmPassword.style.display = 'none';
        }
    }
});

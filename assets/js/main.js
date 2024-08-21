document.addEventListener("DOMContentLoaded", function() {
    const spinner = document.getElementById('page-spinner');
    spinner.classList.remove('hidden');
    setTimeout(function() {
        spinner.classList.add('hidden');
    }, 1000);

    // phone input validation
    const phoneInput = document.getElementById('phone');
    const feedback = document.getElementById('phoneFeedback');

    phoneInput.addEventListener('input', function () {
        let phoneValue = phoneInput.value.replace(/\D/g, '').slice(0, 12);
        if (phoneValue.startsWith('0')) {
            phoneValue = phoneValue.slice(1);
        }
        phoneInput.value = `${phoneValue}`;

        if (phoneValue.length === 12) {
            phoneInput.setCustomValidity('');
            feedback.style.display = 'none';
            phoneInput.classList.remove('is-invalid')
        } else {
            phoneInput.setCustomValidity('Invalid');
            feedback.style.display = 'block';
            phoneInput.classList.add('is-invalid')
        }
    });
    phoneInput.addEventListener('focus', function () {
        if (phoneInput.value === '') {
            phoneInput.value = '+254';
        }
    });

    phoneInput.addEventListener('blur', function () {
        if (phoneInput.value === '+254') {
            phoneInput.value = '';
        }
    });

    // password validation
    const passwordInput = document.getElementById('password');
    const passfeedback = document.getElementById('passwordFeedback');

    passwordInput.addEventListener('input', function () {
        const passwordValue = passwordInput.value;
        const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,16}$/;

        if (regex.test(passwordValue)) {
            passwordInput.setCustomValidity('');
            passfeedback.style.display = 'none';
            passwordInput.classList.remove("is-invalid")
        } else {
            passwordInput.classList.add("is-invalid")
            passwordInput.setCustomValidity('Invalid');
            passfeedback.style.display = 'block';
        }
    });

    // email validation
    const emailInput = document.getElementById('email');
    const emailfeedback = document.getElementById('emailFeedback');

    emailInput.addEventListener('input', function () {
        const emailValue = emailInput.value;

        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (emailRegex.test(emailValue)) {
            emailInput.setCustomValidity('');
            emailInput.classList.remove("is-invalid")
            emailfeedback.style.display = 'none';
        } else {
            emailInput.classList.add("is-invalid")
            emailInput.setCustomValidity('Invalid');
            emailfeedback.style.display = 'block';
        }
    });

    // sub email validation 
    const subEmail = document.getElementById('subEmail');
    const subBtn = document.getElementById('subBtn')

    subEmail.addEventListener('input', function () {
        const subEmailValue = subEmail.value;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (emailRegex.test(subEmailValue)) { 
            subEmail.classList.remove('is-invalid');
            subBtn.disabled = false
        } else {
            subEmail.classList.add('is-invalid')
            subBtn.disabled = true
        }
    });
});

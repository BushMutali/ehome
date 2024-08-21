document.addEventListener("DOMContentLoaded", function () {
    const spinner = document.getElementById('page-spinner');
    spinner.classList.remove('hidden');
    setTimeout(function () {
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

    // confirm pass validation
    const confirmPassInput = document.getElementById('confirm-password');
    const PasswordInput = document.getElementById('password').value;
    const confirmPassFeedback = document.getElementById('confirmPassFeedback')

    confirmPassInput.addEventListener('input', function () {
        const value = passwordInput.value;

        if (value != PasswordInput) {
            confirmPassInput.classList.add("is-invalid")
            confirmPassFeedback.style.display = 'block';
        } else {
            confirmPassInput.classList.remove("is-invalid")
            confirmPassFeedback.style.display = 'none';
        }
    })



    // email validation
    const emailInputs = document.querySelectorAll('.email-input');

    emailInputs.forEach(function (emailInput) {
        const emailfeedback = emailInput.nextElementSibling;

        emailInput.addEventListener('input', function () {
            const emailValue = emailInput.value;

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            // Validate email
            if (emailRegex.test(emailValue)) {
                emailInput.setCustomValidity('');
                emailfeedback.style.display = 'none';
                emailInput.classList.remove("is-invalid")
            } else {
                emailInput.setCustomValidity('Invalid');
                emailfeedback.style.display = 'block';
                emailInput.classList.add("is-invalid")
            }
        });
    });

    const codeInput = document.getElementById('code');
    const codefeedback = document.getElementById('codeFeedback');

    codeInput.addEventListener('input', function () {
        const codeValue = codeInput.value;

        // Regular expression to validate that input contains exactly 6 digits
        const codeRegex = /^\d{6}$/;

        // Validate code
        if (codeRegex.test(codeValue)) {
            codeInput.setCustomValidity('');
            codefeedback.style.display = 'none';
        } else {
            codeInput.setCustomValidity('Invalid');
            codefeedback.style.display = 'block';
        }
    });
});

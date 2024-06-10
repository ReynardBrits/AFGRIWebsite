document.addEventListener('DOMContentLoaded', function() {
    const registerForm = document.getElementById('register-form');
    let registerButton = document.getElementById('registerButton');
    let firstNameInput = document.getElementById('firstName');
    let lastNameInput = document.getElementById('lastName');
    let emailInput = document.getElementById('email');
    let passwordInput = document.getElementById('password');
    let confirmPasswordInput = document.getElementById('confirmPassword');

    const inputLabels = {
        firstName: 'First Name',
        lastName: 'Last Name',
        email: 'Email',
        password: 'Password',
        confirmPassword: 'Confirm Password',
    };

    firstNameInput.addEventListener("input", () => ValidateInput(firstNameInput, 'firstName'));
    lastNameInput.addEventListener("input", () => ValidateInput(lastNameInput, 'lastName'));
    emailInput.addEventListener("input", () => ValidateInput(emailInput, 'email'));
    passwordInput.addEventListener("input", () => ValidateInput(passwordInput, 'password'));
    confirmPasswordInput.addEventListener("input", () => ValidateInput(confirmPasswordInput, 'confirmPassword'));

    function ValidateInput(inputElement, inputName) {
        let inputValue = inputElement.value.trim();
        let inputType = inputElement.getAttribute('type');
        let isValid = true;


        switch (inputType) {
            case 'email':
                if (inputValue === '') {
                    displayError(inputName, `${inputLabels[inputName]} is required.`);
                    isValid = false;
                } else if (!validateEmail(inputValue)) {
                    displayError(inputName, `Invalid ${inputLabels[inputName]} format.`);
                    isValid = false;
                } else {
                    clearError(inputName);
                }
                break;
            case 'password':
                let passwordValidationResult = validatePasswordStrength(inputValue);
                if (inputValue === '') {
                    displayError(inputName, `${inputLabels[inputName]} is required.`);
                    isValid = false;
                } else if (!passwordValidationResult.valid) {
                    displayError(inputName, passwordValidationResult.message);
                    isValid = false;
                } else {
                    clearError(inputName);
                }

                if (inputName === 'confirmPassword') {
                    if (inputValue === '') {
                        displayError(inputName, `${inputLabels[inputName]} is required.`);
                        isValid = false;
                    } else if (inputValue !== passwordInput.value.trim()) {
                        displayError(inputName, 'Passwords do not match.');
                        isValid = false;
                    } else {
                        clearError(inputName);
                    }
                }
                break;
            default:
                clearError(inputName);

        }
    }

    function validateEmail(email) {
        // Check if email is in the format 'XYZ@XYZ.XYZ'
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(String(email).toLowerCase());
    }

    function validatePasswordStrength(password) {
        let unmetRequirements = [];

        // Minimum six characters
        if (password.length < 6) {
            unmetRequirements.push('Password must be at least 6 characters.');
        }

        // At least one uppercase letter
        if (!/[A-Z]/.test(password)) {
            unmetRequirements.push('Password must include at least one uppercase letter.');
        }

        // At least one lowercase letter
        if (!/[a-z]/.test(password)) {
            unmetRequirements.push('Password must include at least one lowercase letter.');
        }

        // At least one number
        if (!/[0-9]/.test(password)) {
            unmetRequirements.push('Password must include at least one number.');
        }

        // At least one special character
        if (!/[@$!%*?&#^()]/.test(password)) {
            unmetRequirements.push('Password must include at least one special character.');
        }

        // If all requirements are met
        if (unmetRequirements.length === 0) {
            return { valid: true, message: '' };
        } else {
            return { valid: false, message: unmetRequirements.join(' ') };
        }
    }

    function displayError(inputName, errorMessage) {
        let inputElement = document.getElementById(inputName);
        let errorElement = document.getElementById(`${inputName}-error`);
        errorElement.textContent = errorMessage;
        errorElement.style.display = 'block';
        inputElement.classList.add('border-danger');
    }

    function clearError(inputName) {
        let inputElement = document.getElementById(inputName);
        let errorElement = document.getElementById(`${inputName}-error`);
        errorElement.textContent = '';
        errorElement.style.display = 'none';
        inputElement.classList.remove('border-danger');
        inputElement.classList.add('border-success');
    }

    registerButton.addEventListener("click", function(event) {
        event.preventDefault();

        if (validateForm()) {
            // Serialize form data into JSON object
            let formData = {};
            $(registerForm).serializeArray().forEach(item => {
                formData[item.name] = item.value;
            });
            console.log('Form Data: ', formData);

            // Submit the form using jQuery Ajax
            $.ajax({
                type: "POST",
                url: "register.php",
                data: JSON.stringify(formData),
                dataType: "json",
                contentType: "application/json",
                success: function (response) {
                    console.log(response);
                    // Display SweetAlert to confirm successful register
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Register successful!',
                        showConfirmButton: true,
                    }).then(function () {
                        // Redirect to another page
                        // window.location.href = "login.html";
                    });
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Handle error
                    console.log(textStatus, errorThrown);
                    // Display SweetAlert to show error message
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Failed to sign up.',
                        showConfirmButton: true
                    });
                }
            });
        }

    });

    function validateForm() {
        // Validate all the form fields
        let isValid = true;
        ['firstName', 'lastName', 'email', 'password', 'confirmPassword'].forEach(inputName => {
            let inputElement = document.getElementById(inputName);
            if (!validateInput(inputElement, inputName)) {
                isValid = false;
                console.log('Invalid input: ', inputName);
            }
        });
        return isValid;
    }

});

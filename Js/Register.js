
function validateEmail(email) {

    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}


function validatePassword(password) {

    var passwordRegex = /^(?=.*[A-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/;
    return passwordRegex.test(password);
}

// Function to handle form submission
function validateForm(event) {
    event.preventDefault();

    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('password2').value;

    // Check if email is valid
    if (!validateEmail(email)) {
        alert('Please enter a valid email address');
        return false;
    }

    // Check if password is valid
    if (!validatePassword(password)) {
        alert('Password must be at least 8 characters long and contain at least one uppercase letter and one special character');
        return false;
    }

    // Check if password and confirm password match
    if (password !== confirmPassword) {
        alert('Passwords do not match');
        return false;
    }

    // All validations passed
    alert('Registration successful!');

    window.location.href = "../view/login.html";

    return true;
}

// Add event listener when DOM content is loaded
document.addEventListener('DOMContentLoaded', function() {
    // Get the form element
    var form = document.getElementById('register');

    form.onsubmit = function(event) {

        return validateForm(event);
    };
});


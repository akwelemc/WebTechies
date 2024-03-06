function validateEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function validatePassword(password) {
    var passwordRegex = /^(?=.*[A-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/;
    return passwordRegex.test(password);
}

function validateForm() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('password2').value;

    if (!validateEmail(email)) {
        alert('Please enter a valid email address');
        return false;
    }

    if (!validatePassword(password)) {
        alert('Password must be at least 8 characters long and contain at least one uppercase letter and one special character');
        return false;
    }

    if (password !== confirmPassword) {
        alert('Passwords do not match');
        return false;
    }

    alert('Registration successful!');
    return true;
}

document.addEventListener('DOMContentLoaded', function() {
 
    var form = document.getElementById('register');

   
    form.onsubmit = function(event) {
        
        return validateForm(event);
    };
});

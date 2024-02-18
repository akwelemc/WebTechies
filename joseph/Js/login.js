function validateForm(event) {

    event.preventDefault();
    
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert('Please enter a valid email address');
        return false;
    }

   
    if (password === "") {
        alert('Please enter a password');
        return false;
    }

    
    var passwordRegex = /^(?=.*[A-Z])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/;
    if (!passwordRegex.test(password)) {
        alert('Password must be at least 8 characters and contain a symbol and a capital letter');
        return false;
    }

    window.location.href = "../admin/AdminDashboard.html";
    return true; 
}


function openModal(modalId) {
    document.getElementById(modalId).style.display = "block";
}


function closeModal(modalId) {
    document.getElementById(modalId).style.display = "none";
}


document.getElementById("Edit").addEventListener("click", function() {
    openModal("editProfileModal");
});

document.getElementById("EditBio").addEventListener("click", function() {
    openModal("editBioModal");
});

document.querySelector(".close").addEventListener("click", function() {
    closeModal("editProfileModal");
});


document.getElementById("ChangePassword").addEventListener("click", function() {
    document.getElementById("changePasswordModal").style.display = "block";
});


function openChangeEmailModal() {
    openModal('changeEmailModal'); 
}


document.getElementById("Editemail").addEventListener("click", function(event) {
    event.preventDefault();
    openChangeEmailModal(); 
});


// Function to validate email format
function isValidEmail(email) {
    // Regular expression for email format
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function isValidPassword(password) {
    var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
    return passwordRegex.test(password);
}


function validateEditProfileForm(event) {
    var bio = document.getElementById("bio").value.trim();
    var username = document.getElementById("username").value.trim();

    if (bio === "" || username === "") {
        alert("Please fill in all fields.");
        event.preventDefault(); // Prevent the default form submission action
        return false;
    }

    return true;
}


// Function to validate change email form
function validateChangeEmailForm(event) {
    var currentEmail = document.getElementById("currentEmail").value.trim();
    var newEmail = document.getElementById("newEmail").value.trim();

    if (currentEmail === "" || newEmail === "") {
        alert("Please fill in all fields.");
        event.preventDefault();
        return false;
    }

    if (!isValidEmail(newEmail)) {
        alert("Please enter a valid email address.");
        event.preventDefault();
        return false;
    }

    return true;
}


function validateChangePasswordForm(event) {
    var currentPassword = document.getElementById("currentPassword").value.trim();
    var newPassword = document.getElementById("newPassword").value.trim();
    var confirmPassword = document.getElementById("confirmPassword").value.trim();

    if (currentPassword === "" || newPassword === "" || confirmPassword === "") {
        alert("Please fill in all fields.");
        event.preventDefault();
        return false;
    }

    if (newPassword !== confirmPassword) {
        alert("New password and confirm password do not match.");
        event.preventDefault();
        return false;
    }

    if (!isValidPassword(newPassword)) {
        alert("Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.");
        event.preventDefault();
        return false;
    }

    return true;
}

// Event listeners for form submissions
document.getElementById("editProfileForm").addEventListener("submit", validateEditProfileForm);
document.getElementById("changeEmailForm").addEventListener("submit", validateChangeEmailForm);
document.getElementById("changePasswordForm").addEventListener("submit", validateChangePasswordForm);




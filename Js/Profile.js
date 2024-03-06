
function openModal(modalId) {
    document.getElementById(modalId).style.display = "block";
}


function closeModal(modalId) {
    document.getElementById(modalId).style.display = "none";
}


document.getElementById("Edit").addEventListener("click", function() {
    openModal("editProfileModal");
});


document.querySelector(".close").addEventListener("click", function() {
    closeModal("editProfileModal");
});


document.getElementById("ChangePassword").addEventListener("click", function() {
    document.getElementById("changePasswordModal").style.display = "block";
});



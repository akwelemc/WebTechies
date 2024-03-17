document.addEventListener("DOMContentLoaded", function() {
    function openModal(modalId) {
        document.getElementById(modalId).style.display = "block";
    }

    function closeModal(modalId) {
        document.getElementById(modalId).style.display = "none";
    }

    document.getElementById("AssignDriver").addEventListener("click", function () {
        openModal("AssignDriverModal");
    });

    document.querySelector(".close").addEventListener("click", function () {
        closeModal("AssignDriverModal");
    });

    // Close modal if user clicks outside of it
    window.addEventListener("click", function (event) {
        if (event.target.classList.contains('modal')) {
            closeModal("AssignDriverModal");
        }
    });
});

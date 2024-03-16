function openModal(modalId) {
    document.getElementById(modalId).style.display = "block";
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = "none";
}

document.getElementById("addBus").addEventListener("click", function () {
    openModal("addBusModal");
});

document.querySelector(".close").addEventListener("click", function () {
    closeModal("addBusModal");
});


window.addEventListener("click", function (event) {
    if (event.target === document.getElementById("addBusModal")) {
        closeModal("addBusModal");
    }
});

function showAlert(message, type) {
    Swal.fire({
        icon: type,
        title: message,
        showConfirmButton: false,
        timer: 2000
    });

}
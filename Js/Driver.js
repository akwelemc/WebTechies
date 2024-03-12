
function openModal(modalId) {
    document.getElementById(modalId).style.display = "block";
}


function closeModal(modalId) {
    document.getElementById(modalId).style.display = "none";
}

document.getElementById("addDriver").addEventListener("click", function () {
    openModal("addDriverModal");
});

document.querySelector(".close").addEventListener("click", function () {
    closeModal("addDriverModal");
});

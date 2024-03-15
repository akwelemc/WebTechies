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

document.getElementById("addBusStop").addEventListener("click", function () {
    openModal("addBusStopModal");
});

document.querySelector(".close").addEventListener("click", function () {
    closeModal("addBusStopModal");
});



window.addEventListener("click", function (event) {
    if (event.target === document.getElementById("addBusModal")) {
        closeModal("addBusModal");
    }
});



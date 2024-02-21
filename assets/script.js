function suivant() {
    document.querySelector("#reservation").style.display = "none";
    document.querySelector("#options").style.display = "block";
}

function suivantCoordonnees() {
    document.querySelector("#options").style.display = "none";
    document.querySelector("#coordonnees").style.display = "block";
}

function retourReservation() {
    document.querySelector("#options").style.display = "none";
    document.querySelector("#reservation").style.display = "block";
}
function retourOptions() {
    document.querySelector("#coordonnees").style.display = "none";
    document.querySelector("#options").style.display = "block";
}

// checkbox.style.display = "none";
// checkbox2.style.display = "none";
// checkbox3.style.display = "none";

let checkboxTarifReduit = document.querySelector("input[id=tarifReduit]");
let checkbox = document.querySelector("input[id=pass1jour]");

checkbox.addEventListener("change", function () {
    if (checkbox.checked) {
        document.querySelector("#pass1jourDate").style.display = "block";
    } else {
        document.querySelector("#pass1jourDate").style.display = "none";
    }
});

let checkbox2 = document.querySelector("input[id=pass2jours]");

checkbox2.addEventListener("change", function () {
    if (checkbox2.checked) {
        document.querySelector("#pass2joursDate").style.display = "block";
    } else {
        document.querySelector("#pass2joursDate").style.display = "none";
    }
});

let checkbox3 = document.querySelector("input[id=pass3jours]");

checkbox3.addEventListener("change", function () {
    if (checkbox3.checked && checkboxTarifReduit.checked) {
        document.querySelector("#pass3joursDate").style.display = "block";
    } else {
        document.querySelector("#pass3joursDate").style.display = "none";
    }
});

let casqueEnfantOui = document.querySelector("input[id=enfantsOui]");
let casqueEnfantNon = document.querySelector("input[id=enfantsNon]");

casqueEnfant.addEventListener("change", function () {
    if (casqueEnfant.checked) {
        document.querySelector("#casqueEnfant").style.display = "";
    } else {
        document.querySelector("#casqueEnfant").style.display = "none";
    }
});

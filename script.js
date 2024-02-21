// AFFICHAGE DES 3 ETAPES
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

// AFFICHAGES DES TARIFS

let checkboxTarifReduit = document.querySelector("input[id=tarifReduit]");
let checkbox = document.querySelector("input[id=pass1jour]");
let checkbox2 = document.querySelector("input[id=pass2jours]");
let checkbox3 = document.querySelector("input[id=pass3jours]");

checkbox.addEventListener("change", function () {
  if (checkbox.checked) {
    document.querySelector("#pass1jourDate").style.display = "block";
  } else {
    document.querySelector("#pass1jourDate").style.display = "none";
  }
});
checkbox.addEventListener("change", function () {
  if (checkbox.checked && checkboxTarifReduit.checked) {
    document.querySelector("#pass1jourreduit").style.display = "block";
  } else {
    document.querySelector("#pass1jourreduit").style.display = "none";
  }
});

checkbox2.addEventListener("change", function () {
  if (checkbox2.checked) {
    document.querySelector("#pass2joursDate").style.display = "block";
  } else {
    document.querySelector("#pass2joursDate").style.display = "none";
  }
});
checkbox2.addEventListener("change", function () {
  if (checkbox2.checked && checkboxTarifReduit.checked) {
    document.querySelector("#pass2joursreduit").style.display = "block";
  } else {
    document.querySelector("#pass2joursreduit").style.display = "none";
  }
});

checkbox3.addEventListener("change", function () {
  if (checkbox3.checked && checkboxTarifReduit.checked) {
    document.querySelector("#pass3joursDate").style.display = "block";
  } else {
    document.querySelector("#pass3joursDate").style.display = "none";
  }
});

//AFFICHAGE DES OPTIONS
let casqueEnfant = document.querySelector("input[id=enfantsOui]");
let casqueEnfantNon = document.querySelector("input[id=enfantsNon]");

casqueEnfant.addEventListener("change", function () {
  if (casqueEnfant.checked) {
    document.querySelector("#casqueEnfant").style.display = "block";
  }
});

casqueEnfantNon.addEventListener("change", function () {
  if (casqueEnfantNon.checked) {
    document.querySelector("#casqueEnfant").style.display = "none";
  }
});

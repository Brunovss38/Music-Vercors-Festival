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

//AFFICHAGES DES TARIFS

let checkboxTarifReduit = document.getElementById("tarifReduit");
let checkbox = document.getElementById("pass1jour");
let checkbox2 = document.getElementById("pass2jours");
let checkbox3 = document.getElementById("pass3jours");

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
let casqueEnfant = document.getElementById("enfantsOui");
let casqueEnfantNon = document.getElementById("enfantsNon");

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




// RETOUR A LA PAGE COORDONNEES APRES ERREURS
if (
  window.location.search === "?erreur=1&section=coordonnees" ||
  window.location.search === "?erreur=2&section=coordonnees" ||
  window.location.search === "?erreur=3&section=coordonnees" ||
  window.location.search === "?erreur=4&section=coordonnees"
) {
  document.querySelector("#coordonnees").style.display = "block";
  document.querySelector("#reservation").style.display = "none";
  document.querySelector("#options").style.display = "none";
} else if (window.location.search === "?succes=reservationreussi") {
  document.querySelector(".succes").style.display = "block";
}

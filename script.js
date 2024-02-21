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
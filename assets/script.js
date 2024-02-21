function suivant() {
    let element = document.getElementById("#options");
    element.style.display = "block";
}

let bouton = document.querySelector("#bouton");
bouton.addEventListener("click", suivant);

document.addEventListener("DOMContentLoaded", function() { //
    var section = document.getElementById("section-oculta"); //selecciona el id
    // muestra la section con la propiedad display
    section.style.display = "block"; 

    // agrega una clase para activar el efecto de desvanecimiento
    section.classList.add("fade-in");
});
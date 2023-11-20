document.addEventListener("DOMContentLoaded", function() { //
    var section = document.getElementById("section-oculta"); //selecciona el id
    // muestra la section con la propiedad display
    section.style.display = "block"; 

    // agrega una clase para activar el efecto de desvanecimiento
    section.classList.add("fade-in");

    //button 1.2

    function mostrarMensaje() {
        alert("soy un mensaje")
    }

    //button 1.3
    async function getData(){
        try{
            const data = await fetch('https://api.chucknorris.io/jokes/random'); //consumiendo api 
            const json = await data.json();
            
           /* console.log(json);
            console.log(json.value);*/ //obtiene los datos especificos del json en este caso "value"
            parrafo.textContent = json.value;
        }
        catch(e){   
            console.error(e);
        }

    }

    //selecciona el id "button"
    var button = document.getElementById("button"); 

    //elemento.addEventListener(evento, función); 
    button.addEventListener("click", getData);

    const parrafo = document.getElementById("mensajeDeChuck") //guardo el mensaje en el id


});


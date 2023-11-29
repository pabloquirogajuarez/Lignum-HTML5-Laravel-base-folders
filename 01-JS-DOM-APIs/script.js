document.addEventListener("DOMContentLoaded", function() { //
    var section = document.getElementById("section-oculta"); //selecciona el id
    // muestra la section con la propiedad display
    section.style.display = "block"; 

    // agrega una propiedad para activar el efecto de desvanecimiento
    section.classList.add("fade-in");

    //button 1.2

    function mostrarMensaje() {
        alert("soy un mensaje")
    }

    //------------------------------------- 1.3 ---------------------------------- //
    async function getData(){
        try{
            const data = await fetch('https://api.chucknorris.io/jokes/random'); //consumiendo api --- recibe una promesa 
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

//------------------------------------- ajax 1.3 ---------------------------------- //

function hacerLlamadaAjax(configuracion) {
    // retorna una nueva promesa para manejar la asincronia
    return new Promise(function (resolve, reject) {
      // crea un nuevo objeto XMLHttpRequest
      var xhr = new XMLHttpRequest();
  
      // configura la solicitud con los parametros proporcionados
      xhr.open(configuracion.metodo, configuracion.url, true);
      xhr.setRequestHeader('Content-Type', 'application/json');
  
      // maneja los eventos de la solicitud
      xhr.onload = function () {
        //if (xhr.status >= 200 && xhr.status < 300) {
        if (xhr.status == 200) {
          // si la solicitud fue exitosa, resuelve la promesa con la respuesta
          resolve(xhr.responseText);
        } else {
          // si hubo un error, rechaza la promesa con un mensaje de error
          reject('error en la solicitud. estado: ' + xhr.status);
        }
      };
  
      xhr.onerror = function () {
        // maneja errores de red
        reject('error de red');
      };
  
      // convierte el objeto de datos a una cadena JSON si es necesario
      var datos = configuracion.datos ? JSON.stringify(configuracion.datos) : null; //
      var asd = '123';
      console.log(parseInt(asd)); //parsear 
  
      // envia la solicitud con los datos apropiados
      xhr.send(datos);
    });
  }

  var configuracion = {
    metodo: 'GET',
    url: 'https://api.chucknorris.io/jokes/random', //url de la config
  };


  

  // 1.3.5 Si ocurre un error del servidor, el contenido de la section debe ponerse rojo. //

  var section = document.getElementById('sectionError'); //section toma el id
  hacerLlamadaAjax(configuracion)
    .then(function (respuesta) {
      console.log('respuesta exitosa:', respuesta);
    })
    .catch(function (error) {
      console.error('error en la llamada AJAX:', error);
      section.style.color = 'red'; //pone en rojo en caso de haber un error en el llamado
    });


//------------------------------------- api github 1.4 ---------------------------------- //

async function obtenerRepositorios(query = 'JavaScript') {
    try {
        const apiUrl = `https://api.github.com/search/repositories?q=${query}`;
        const response = await fetch(apiUrl);

        if (!response.ok) {
            throw new Error(`error en la solicitud: ${response.status}`);
        }

        const data = await response.json();
        console.log(`respuesta de la api de git al buscar '${query}':`, data);

        // manipula los datos y actualiza la lista
        const listaRepos = document.getElementById('listado');
        listaRepos.innerHTML = ''; // limpiar lista antes de actualizar

        // añadir elementos a la lista de los repos obtenidos 
        data.items.forEach(repo => {
            const listItem = document.createElement('li');
            listItem.textContent = repo.name;
            listaRepos.appendChild(listItem);
        });

    } catch (error) {
        console.error('error al obtener la respuesta:', error);
    }
}



//1.4.4 Agregue una entrada con type="text" para realizar una búsqueda de cualquier valor.
function realizarBusqueda() {
    const buscarInput = document.getElementById('buscar');
    const query = buscarInput.value;
    obtenerRepositorios(query);
}

// llama a la funcion para obtener los repos de javascript al cargar la pagina
window.onload = () => obtenerRepositorios();


//------------------------------------- 1.6 ---------------------------------- //

function generarTabla(matrizDatos, idContenedor) {
    // crear la tabla
    var tabla = document.createElement('table');

    // crear el encabezado de la tabla
    var encabezado = document.createElement('thead');
    var encabezadoFila = document.createElement('tr');

    // itera sobre la primera fila de la matriz para crear las celdas del encabezado
    for (var i = 0; i < matrizDatos[0].length; i++) {
        var encabezadoCelda = document.createElement('th');
        var textoEncabezado = document.createTextNode(matrizDatos[0][i]);
        encabezadoCelda.appendChild(textoEncabezado);
        encabezadoFila.appendChild(encabezadoCelda);
    }

    // agrega la fila del encabezado al encabezado de la tabla
    encabezado.appendChild(encabezadoFila);

    // agrega el encabezado a la tabla
    tabla.appendChild(encabezado);

    // crea el cuerpo de la tabla
    var cuerpoTabla = document.createElement('tbody');

    // itera sobre las filas de la matriz (comenzando desde la segunda fila)
    for (var i = 1; i < matrizDatos.length; i++) {
        var fila = document.createElement('tr');

        // itera sobre las celdas de la fila actual
        for (var j = 0; j < matrizDatos[i].length; j++) {
            var celda = document.createElement('td');
            var textoCelda = document.createTextNode(matrizDatos[i][j]);
            celda.appendChild(textoCelda);
            fila.appendChild(celda);
        }

        // agrega la fila al cuerpo de la tabla
        cuerpoTabla.appendChild(fila);
    }

    // agrega el cuerpo de la tabla a la tabla
    tabla.appendChild(cuerpoTabla);

    // obtiene el elemento contenedor por su ID
    var contenedor = document.getElementById(idContenedor);

    // Agregar la tabla al contenedor
    contenedor.appendChild(tabla);
}

// ejemplo
var datos = [
    ["nombre", "edad", "email", "cargo" ],
    ["roberto", "20", "random@gmail.com", "ui/ux desinger"],
    ["pedro", "21", "randasdom@gmail.com", "frontend dev"],
    ["braian", "22", "randdddom@gmail.com", "backend dev"]
];

// especifica el id del contenedor en el html
var idContenedor = "tabla";

generarTabla(datos, idContenedor);
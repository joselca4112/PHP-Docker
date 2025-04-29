

//Lista de elementos personaje
let lista_personajes = new Array();
let img_default = "proyecto1PHP/imagenes/userimg.jpg";
dinamic_file_chooser();

// Asignar el evento al formulario para que al hacer submit se ejecute la función
document.getElementById("form").addEventListener("submit", add_to_list);

//Y que no ejecute el codigo por defecto de recargar la pagina
document.getElementById("form").addEventListener('submit', (event) => {
  event.preventDefault();
});


//Prototipo de clase personaje, en js lo trataremos como un archivo temporal, lo importante es como se guarda
//como se mostrara la prox vez que cargue la pagina
class Personaje {
  constructor(
    id = null,              // ID opcional
    nombre = null,          // nombre 
    apodo = null,           // apodo
    tipo_danio = null,      // daño melee o a distancia
    casado = null,          // booleano casado
    en_equipo = null,       // booleano sobre si está en el equipo
    clase = null,           // clase del personaje
    descripcion = null,     // descripcion del personaje
    img = null              // ruta local de la imagen del personaje
  ) {
    this.id = id;
    this.nombre = nombre;
    this.apodo = apodo;
    this.tipo_danio = tipo_danio;
    this.casado = casado;
    this.en_equipo = en_equipo;
    this.clase = clase;
    this.descripcion = descripcion;
    this.img = img;
  }
  // Método para convertir la instancia a un objeto JSON simple
  toJSON() {
    return {
      id: this.id,
      nombre: this.nombre,
      apodo: this.apodo,
      tipo_danio: this.tipo_danio,
      casado: this.casado,
      en_equipo: this.en_equipo,
      clase: this.clase,
      descripcion: this.descripcion,
      img: this.img
    };

  }
}

//funcion que envie los datos del formulario a la lista al pulsar el boton
function add_to_list() {

  //Lanzamos el action del form para agregar un nuevo dato, gestionar la creacion de db, tablas, etc
  //submitForm();
  document.getElementById('form').submit(); // para abrir una nueva ventana

  // Obtener los valores de los campos del formulario
  let nombre = document.getElementById("name").value;
  let apodo = document.getElementById("apodo").value;

  if (nombre && apodo) {

    // Tipo de daño (se selecciona un radio button, por lo que hay que obtener el valor del que esté marcado)
    let tipo_danio = document.querySelector('input[name="contact"]:checked').value;

    // Datos adicionales (valores de los checkboxes seleccionados)
    //Si esta casado guardamos si no no.s
    let casado = document.getElementById("casado").checked ? "Si" : "No";
    //Lo mismo para si esta en el equipo
    let en_equipo = document.getElementById("equipo").checked ? "Si" : "No";

    // Clase del personaje (valor del select)
    let clase = document.getElementById("clase").value;

    // Descripción del personaje (valor del textarea)
    let descripcion = document.getElementById("descripcion").value;

    // Imagen (puedes obtener la ruta del archivo seleccionada si lo deseas, aunque generalmente no es necesario en este caso)
    let imagen = document.getElementById("customFile").files[0] ? document.getElementById("customFile").files[0] : null;


    let rutaimagen = imagen ? URL.createObjectURL(imagen) : img_default;


    // Crear una instancia del personaje con los datos del formulario
    let personaje = new Personaje(
      Math.max(...lista_personajes.map(personaje => personaje.id)) + 1,
      //En cuanto al id, lo asigna el autoincrement en la bbdd pero podemos predecirlo:
      nombre,       //Los datos de mi lista_personajes tienen id cargado de la bbdd, id del nuevo personaje sera
      apodo,        //el maximo de estos id + 1, por lo que buscamos el id maximo
      tipo_danio,
      casado,
      en_equipo,
      clase,
      descripcion,
      rutaimagen
    );

    // Agregar el personaje a la lista
    lista_personajes.push(personaje);

    //Añadirlo al html:
    anadir_dato_html(personaje);
    //Una vez añadidos los datos limpiamos el formulario:
    setTimeout(limpiar_formulario(), 100);
  }
}

//Funcion para añadir los datos al html
function anadir_dato_html(personaje) {

  // contenedor tbody
  const contenedor = document.getElementById("contenedor");

  // tr dentro del contenedor
  const tr = document.createElement("tr");
  tr.classList.add('my-3');

  //crear campo para el chexkbox de eliminar:
  const cb_container = document.createElement("th");
  const checkbox = document.createElement('input');
  checkbox.type = 'checkbox';
  checkbox.classList.add('select-row');

  // Crear un elemento <th> para la imagen
  const th_img = document.createElement('td');
  th_img.setAttribute('scope', 'row');// Establecer el atributo 'scope' en el elemento <th>

  // imagen para añadir al th
  const imagen = document.createElement('img');

  if (!personaje.img) {
    imagen.src = img_default; // Use default image
    imagen.alt = personaje.nombre; // Use the title as alt text
  } else {
    imagen.src = personaje.img; // Use the image URL
    imagen.alt = "No image"
  }
  imagen.classList.add('img-thumbnail'); //img con bordes

  // td para el nombre
  const nombre = document.createElement('td');
  nombre.textContent = personaje.nombre;

  // td para el apodo
  const apodo = document.createElement('td');
  apodo.textContent = personaje.apodo;

  // td para el tipo_daño
  const tipo_danio = document.createElement('td');
  tipo_danio.textContent = personaje.tipo_danio;

  // td para el boleano casado
  const casado = document.createElement('td');
  casado.textContent = personaje.casado ? 'Si' : 'No';

  // td para el boleano en_equipo
  const en_equipo = document.createElement('td');
  en_equipo.textContent = personaje.en_equipo ? 'Si' : 'No';

  // td para la clase
  const clase = document.createElement('td');
  clase.textContent = personaje.clase;

  //Boton editar:
  const btn_container = document.createElement('td');
  const btn_editar = document.createElement('button');
  btn_editar.textContent = 'Editar';
  btn_editar.classList.add('btn', 'btn-primary', 'align-middle');
  btn_editar.setAttribute('data-toggle', 'modal');
  btn_editar.setAttribute('data-target', '#exampleModalCenter');
  btn_editar.id = 'btn_editar_registro'

  //Añadir boton al contenedor:
  btn_container.appendChild(btn_editar)
  //añadir imagen al th
  th_img.appendChild(imagen);

  //Añadir checkbox a su contenedor:
  cb_container.appendChild(checkbox);

  // añadir lo td
  tr.appendChild(cb_container);
  tr.appendChild(th_img);
  tr.appendChild(nombre);
  tr.appendChild(apodo);
  tr.appendChild(tipo_danio);
  tr.appendChild(casado);
  tr.appendChild(en_equipo);
  tr.appendChild(clase);
  tr.appendChild(btn_container);
  // añadir la fila a la tabla (tr al tbody)
  contenedor.appendChild(tr);
}

function dinamic_file_chooser() {
  document.getElementById('customFile').addEventListener('change', function () {
    const label = document.querySelector('.custom-file-label');

    if (this.files.length > 0) {
      // Si hay un archivo seleccionado
      label.classList.add('selected');
      label.innerHTML = 'Imagen seleccionada: ' + this.files[0].name;
    } else {
      // Si no hay archivo seleccionado
      label.classList.remove('selected');
      label.innerHTML = 'Selecciona una imagen';
    }
  });

}

function limpiar_formulario() {
  // Obtener el formulario
  var formulario = document.getElementById('form');

  // Restablecer los valores predeterminados del formulario
  formulario.reset();

  // Si hay un archivo seleccionado limpiar el campo de archivo
  var fileInput = document.getElementById('customFile');
  var fileLabel = document.querySelector('.custom-file-label');
  fileInput.value = "";
  fileLabel.classList.remove('selected');
  fileLabel.innerText = 'Elige una imagen';


}

function submitForm(event) {
  event.preventDefault();  // Previene el comportamiento por defecto del formulario (recargar la página)

  // Crea un objeto FormData con los datos del formulario
  var formData = new FormData(document.getElementById('form'));

  // Crear un objeto XMLHttpRequest para enviar los datos
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'proyecto1PHP/php/script.php', true);  // Ruta al script PHP que procesará los datos

  // Manejar la respuesta del servidor
  xhr.onload = function () {
    if (xhr.status >= 200 && xhr.status < 300) {
      console.log('Formulario enviado correctamente');
      console.log(xhr.responseText);  // Puedes ver lo que el PHP devuelve, puedes mostrarlo en la UI
    } else {
      console.error('Error en la solicitud: ' + xhr.status);
    }
  };

  // Enviar la solicitud con los datos del formulario
  xhr.send(formData);
}
//Función para enviar el ID al servidor usando fetch
function eliminarDeBaseDeDatos(id) {

  fetch('proyecto1PHP/php/eliminar.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({ id: id })
  })
    .then(response => {
      if (!response.ok) throw new Error('Error en la solicitud');
      console.log('Registro eliminado correctamente');
    })
    .catch(error => {
      console.error('Error al eliminar:', error);
    });

}
function actualizarDatos(id, nombre, apodo, casado, en_equipo, descripcion) {
  //Creamos un nuevo personaje y lo mandamos al php con un fetch:
  let personaje = new Personaje(
    id = id,
    nombre = nombre,
    apodo = apodo,
    tipo_danio = null,
    casado = casado,
    en_equipo = en_equipo,
    clase = null,
    descripcion = descripcion,
  );
  const personajeJSON = personaje.toJSON();

  fetch('proyecto1PHP/php/update.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Cache-Control': 'no-cache'
    },
    body: JSON.stringify({ personaje: personajeJSON })
  })
    .then(response => {
      if (!response.ok) throw new Error('Error en la solicitud');
      else{
        window.location.replace("proyecto1PHP/php/update.php");
        alert('Registro actualizado correctamente');
      } 

    })
    .catch(error => {
      console.error('Error al actualizar:', error);
    });


}

function waitForElement(selector, callback) {
  const interval = setInterval(() => {
    const element = document.querySelector(selector);
    if (element) {
      clearInterval(interval);
      callback(element);
    }
  }, 100); // Check every 100ms
}



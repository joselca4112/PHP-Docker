

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

  constructor(nombre, apodo, tipo_danio, casado, en_equipo, clase, descripcion, img) {
    this.nombre = nombre;        // nombre 
    this.apodo = apodo;            // apodo
    this.tipo_danio = tipo_danio;      // daño melee o a distancia
    this.casado = casado;      // booleano casado
    this.en_equipo = en_equipo;              // boleano sobre si esta en el equipo
    this.clase = clase;        // clase del personaje
    this.descripcion = descripcion; //descripcion del personaje
    this.img = img; //ruta local de la imagen del personaje

  }

  // Método mejorado para generar un UUID (combinando el tiempo con aleatorios)
  generarUUID() {
    const timestamp = Date.now().toString(16);  // Obtenemos el timestamp actual en hexadecimal
    const randomValue = Math.floor(Math.random() * 0xFFFFF).toString(16);  // Generamos un valor aleatorio
    return `${timestamp}-${randomValue}`;
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
      nombre,
      apodo,
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

  // Crear un elemento <th> para la imagen
  const th_img = document.createElement('th');
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
  casado.textContent = personaje.casado;

  // td para el boleano en_equipo
  const en_equipo = document.createElement('td');
  en_equipo.textContent = personaje.en_equipo;

  // td para la clase
  const clase = document.createElement('td');
  clase.textContent = personaje.clase;

  //añadir imagen al th
  th_img.appendChild(imagen);

  // añadir lo td
  tr.appendChild(th_img);
  tr.appendChild(nombre);
  tr.appendChild(apodo);
  tr.appendChild(tipo_danio);
  tr.appendChild(casado);
  tr.appendChild(en_equipo);
  tr.appendChild(clase);

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

function submitForm() {
  // Crear un objeto FormData con los datos del formulario
  var formData = new FormData(document.getElementById('form'));

  // Crear un objeto XMLHttpRequest para enviar los datos
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'proyecto1PHP/php/script.php', true);

  // Manejar la respuesta del servidor
  xhr.onload = function () {
    if (xhr.status >= 200 && xhr.status < 300) {
      // Si la respuesta es exitosa, puedes procesar la respuesta aquí
      console.log('Formulario enviado correctamente');
      console.log(xhr.responseText);  // Puedes ver lo que el PHP devuelve
    } else {
      console.error('Error en la solicitud: ' + xhr.status);
    }
  }
}
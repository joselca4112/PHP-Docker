

//Lista de elementos personaje
let lista_personajes = new Array();
let img_default = "userimg.jpg";

// Asignar el evento al formulario para que al hacer submit se ejecute la función
document.getElementById("form").addEventListener("submit", add_to_list);

//Y que no ejecute el codigo por defecto de recargar la pagina
document.getElementById("form").addEventListener('submit', (event) => {
  event.preventDefault();
});


//Prototipo de clase personaje
class Personaje {

  constructor(nombre, apodo, tipo_danio, casado, en_equipo, clase, descripcion, img) {
    this.id = this.generarUUID();           // id autogenerado
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

  // Obtener los valores de los campos del formulario
  let nombre = document.getElementById("name").value;
  let apodo = document.getElementById("apodo").value;

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

  
  let rutaimagen = imagen ? URL.createObjectURL(imagen) : null;


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
    imagen.src = "userimg.jpg"; // Use default image
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
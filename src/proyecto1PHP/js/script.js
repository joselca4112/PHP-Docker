let list_personajes = [];
let img_default = "proyecto1PHP/imagenes/userimg.jpg";
let tablaPersonajes;
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
      Math.max(...list_personajes.map(personaje => personaje.id)) + 1,
      //En cuanto al id, lo asigna el autoincrement en la bbdd pero podemos predecirlo:
      nombre,       //Los datos de mi list_personajes tienen id cargado de la bbdd, id del nuevo personaje sera
      apodo,        //el maximo de estos id + 1, por lo que buscamos el id maximo
      tipo_danio,
      casado,
      en_equipo,
      clase,
      descripcion,
      rutaimagen
    );

    // Agregar el personaje a la lista
    list_personajes.push(personaje);

    //Añadirlo al html:
    anadir_dato_html(personaje);
    //Una vez añadidos los datos limpiamos el formulario:
    setTimeout(limpiar_formulario(), 100);
  }
}

//Funcion para añadir los datos al html
function anadir_dato_html(personaje) {

  //por si estaba activo el mensaje de sin datos:
  let txt_aux = document.getElementById('txt-no-data');
  txt_aux.classList.remove('d-block');
  txt_aux.classList.add('d-none');

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

  //Campo invisible para el id:
  const id=document.createElement("td")
  id.textContent =personaje.id
  id.classList.add("d-none")
  id.id="personaje-id"

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
  nombre.id="td-nombre";

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
  tr.appendChild(id)

  
  // Si la tabla no está inicializada, la inicializamos y añadimos los datos
  if (!tablaPersonajes) {
    tablaPersonajes = $('#analiticaTable').DataTable({
      pageLength: 10,  // Número de registros por página
      lengthMenu: [5, 10, 25, 50],  // Opciones de cantidad de registros a mostrar por página
      searching: false,  // Desactiva el buscador
      pagingType: 'simple_numbers', // Estilo de paginación: solo números y botones "Anterior" y "Siguiente"
      language: {
        infoEmpty: "No hay registros disponibles", // Texto si no hay datos
        zeroRecords: "No se encontraron registros", // Texto cuando no se encuentran registros
        paginate: {
          previous: "Anterior",  
          next: "Siguiente"
        },
        info: "Página _PAGE_ de _PAGES_", // Información de los registros mostrados
        lengthMenu: "Mostrar _MENU_ registros por página"  // Texto para el menú de cantidad de registros por página
      },
      order: [[2, 'asc']], // Orden predeterminado (por ejemplo, por la primera columna ascendente)
      columnDefs: [{
        targets: [0, 1],  // Columnas a las que desactivas la búsqueda (puedes ajustarlo según sea necesario)
        orderable: false  // Desactiva la ordenación en estas columnas
      }],
      responsive: true // Hacer la tabla responsive
    });    

    tablaPersonajes.row.add($(tr.outerHTML)).draw(false);
  } else {
    // Si la tabla ya está inicializada, simplemente actualizamos los datos sin recargar la tabla
    tablaPersonajes.row.add($(tr.outerHTML)).draw(false);
  }

  asignarClickAFilas();
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

  // Limpiar manualmente el campo de archivo
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

  fetch('proyecto1PHP/php/functions/eliminar.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({ id: id })
  })
    .then(response => {
      if (!response.ok) throw new Error('Error en la solicitud');
      return response.text(); // o .json() si tu PHP devuelve JSON
    })
    .catch(error => {
      console.error('Error al eliminar:', error);
    });


}

//Actualiza los datos de la bbdd
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

  fetch('proyecto1PHP/php/functions/update.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify({ personaje: personajeJSON })
  })
    .then(response => {
      if (!response.ok) throw new Error('Error en la solicitud');
      else {
        Swal.fire({
          title: '¡Actualizado!',
          text: 'El personaje se modificó correctamente.',
          icon: 'success',
          confirmButtonText: 'OK'
        }).then((result) => {
          if (result.isConfirmed) {
            location.reload(); // Recarga la página cuando el usuario pulsa OK
          }
        });
        
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
// Mostrar el modal con datos del personaje
function mostrarDetallePersonaje(personaje) {
  // Llenar los campos
  document.getElementById('name-modal').value = personaje.nombre;
  document.getElementById('apodo-modal').value = personaje.apodo;
  document.getElementById('casado-modal').checked = personaje.casado;
  document.getElementById('equipo-modal').checked = personaje.en_equipo;
  document.getElementById('descripcion-modal').value = personaje.descripcion;
  let act_id=personaje.id; //guardamos la id para actualizar en la bbdd

  // Desactivar los campos
  toggleCamposModal(true);

  // Botones iniciales
  document.getElementById('btn_modificar').classList.remove('d-none');
  document.getElementById('btn_cancelar').classList.add('d-none');
  btn_guardar=document.getElementById('btn_guardar')
  btn_guardar.classList.add('d-none');

  //Event listener para el boton que lanze el update:
  btn_guardar.addEventListener('click', () => {

    //Recuperar los datos del formulario para editar y mandarlos con el metodo actualizarDatos:
    const nombre_popup = document.getElementById('name-modal').value;
    const apodo_popup = document.getElementById('apodo-modal').value;
    const casado_popup = document.getElementById('casado-modal').checked ? 1 : 0;
    const en_equipo_popup = document.getElementById('equipo-modal').checked ? 1 : 0;
    const descripcion_popup = document.getElementById('descripcion-modal').value;

    //Enviamos los datos + el indice almacenado al pulsar el boton editar
    actualizarDatos(act_id, nombre_popup, apodo_popup, casado_popup, en_equipo_popup, descripcion_popup);
    //Una vez actualizado liberamos el valor del indice actual
    act_id = null;

  });

  // Mostrar modal
  $('#exampleModalCenter').modal('show');
}

// Habilita o deshabilita todos los campos del modal
function toggleCamposModal(disabled) {
  document.getElementById('name-modal').disabled = disabled;
  document.getElementById('apodo-modal').disabled = disabled;
  document.getElementById('casado-modal').disabled = disabled;
  document.getElementById('equipo-modal').disabled = disabled;
  document.getElementById('descripcion-modal').disabled = disabled;
}

function asignarClickAFilas() {
  const filas = document.querySelectorAll('#analiticaTable tbody tr');

  filas.forEach((tr, index) => {
    tr.addEventListener('click', () => {
      index=tr.getElementById('personaje-id').textContent;
      const personaje = list_personajes[index];
      mostrarDetallePersonaje(personaje);
    });
    // Añadir el evento de clic con stopPropagation para que no se abra la ventana de detalles
    tr.querySelector("th").onclick = function (event) {
    event.stopPropagation();
  };
  });
}
function asignarClickAFilas() {
  const filas = document.querySelectorAll('#analiticaTable tbody tr');

  filas.forEach((tr, index) => {
    tr.addEventListener('click', () => {
      const personajeId = tr.querySelector('#personaje-id').textContent;

      // Realizar una solicitud a PHP para obtener los detalles del personaje
      fetch('proyecto1PHP/php/functions/idselect.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({ id: personajeId })
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          mostrarDetallePersonaje(data.personaje);  // Aquí pasas el personaje que obtuviste
        } else {
          console.error('Error:', data.message);  // Muestra el error si no se encontró el personaje
        }
      })
      .catch(error => {
        console.error('Error al obtener el personaje:', error);
      });
    });

    // Añadir el evento de clic con stopPropagation para que no se abra la ventana de detalles
    tr.querySelector("th").onclick = function (event) {
      event.stopPropagation();
    };
  });
}



<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
    integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link rel="stylesheet" href="proyecto1PHP/css/style.css">
  <title>Formulario Boostrap+PHP</title>

</head>

<body>

  <div class="container-flex text-center h5 sticky-top mb-0 ">
    <div class="row row cols-md-2">
      <a class="nav-link text-white bg-dark col-md-2 text-wrap text-center pt-2 pb-2 pl-3" href="">This Page</a>
      <input class="form-control-lg bg-dark border-0 rounded-0 col pt-2 pl-5" id="exampleInput" placeholder="Search"
        type="text" aria-label="Search">
      </input>
      <a class="navbar-nav col col-md-2 text-muted bg-dark py-2 pr-3 pl-1 h6" href="">Sign out</a>
    </div>
  </div>

  <div class="d-flex">

    <nav class="col-md-2 d-none d-md-block sidebar pt-3 bg-light">
      <div class="container-flexbg-light h6 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" id="active">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-home">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
              </svg>
              Dashboards</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-file">
                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                <polyline points="13 2 13 9 20 9"></polyline>
              </svg>
              Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-shopping-cart">
                <circle cx="9" cy="21" r="1"></circle>
                <circle cx="20" cy="21" r="1"></circle>
                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
              </svg>
              Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-users">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                <circle cx="9" cy="7" r="4"></circle>
                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
              </svg>
              Customer</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-bar-chart-2">
                <line x1="18" y1="20" x2="18" y2="10"></line>
                <line x1="12" y1="20" x2="12" y2="4"></line>
                <line x1="6" y1="20" x2="6" y2="14"></line>
              </svg>
              Reports</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-layers">
                <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                <polyline points="2 17 12 22 22 17"></polyline>
                <polyline points="2 12 12 17 22 12"></polyline>
              </svg>
              Integrations</a>
          </li>
        </ul>

        <div>
          <h6 class="d-inline-flex p-2">SAVED REPORTS</h6>
          <svg class="d-inline-flex p-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-plus-circle">
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="12" y1="8" x2="12" y2="16"></line>
            <line x1="8" y1="12" x2="16" y2="12"></line>
          </svg>
        </div>

        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-file-text">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                <polyline points="14 2 14 8 20 8"></polyline>
                <line x1="16" y1="13" x2="8" y2="13"></line>
                <line x1="16" y1="17" x2="8" y2="17"></line>
                <polyline points="10 9 9 9 8 9"></polyline>
              </svg>
              Current month</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-file-text">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                <polyline points="14 2 14 8 20 8"></polyline>
                <line x1="16" y1="13" x2="8" y2="13"></line>
                <line x1="16" y1="17" x2="8" y2="17"></line>
                <polyline points="10 9 9 9 8 9"></polyline>
              </svg>
              Last quarter</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-file-text">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                <polyline points="14 2 14 8 20 8"></polyline>
                <line x1="16" y1="13" x2="8" y2="13"></line>
                <line x1="16" y1="17" x2="8" y2="17"></line>
                <polyline points="10 9 9 9 8 9"></polyline>
              </svg>
              Social engagement</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-file-text">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                <polyline points="14 2 14 8 20 8"></polyline>
                <line x1="16" y1="13" x2="8" y2="13"></line>
                <line x1="16" y1="17" x2="8" y2="17"></line>
                <polyline points="10 9 9 9 8 9"></polyline>
              </svg>
              Year-end initial-scale</a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-10 ml-sm-auto pt-3 px-4">

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap">
        <h1>Formulario de personajes DND </h1>
        <div class="p-3 d-inline-flex">
          <div class="btn-group" role="group">
            <button class="btn btn-outline-secondary">Share</button>
            <button class="btn btn-outline-secondary">Export</button>
          </div>
          <button class="btn btn-outline-secondary d-none d-md-block ml-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
              class="feather feather-calendar">
              <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
              <line x1="16" y1="2" x2="16" y2="6"></line>
              <line x1="8" y1="2" x2="8" y2="6"></line>
              <line x1="3" y1="10" x2="21" y2="10"></line>
            </svg>
            This Week </button>
        </div>
      </div>

      <div class="form-container p-4">
        <form onsubmit="submitForm(event)" method="post" class="" id="form" enctype="multipart/form-data">
          <div class="form-row">

            <!-- Campo de Nombre -->
            <div class="form-group col-md-6">
              <label for="name">Nombre completo del personaje</label>
              <input class="form-control" type="text" id="name" name="name" placeholder="Introduce el nombre completo" required>
            </div>
            <!-- Campo de Apodo -->
            <div class="form-group col-md-6">
              <label for="apodo">Apodo</label>
              <input class="form-control" type="text" id="apodo" name="apodo" placeholder="Introduce el apodo del personaje">
            </div>
          </div>

          <div class="form-row">
            <!-- Campo de tipo de daño -->
            <div class="col">
              <div class="border my-4 px-3 py-2">
                <p class=""><strong>Tipo de daño del personaje</strong></p>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="distancia" name="contact" value="A Distancia">
                  <label class="form-check-label pr-3" for="distancia">Daño a distancia</label>
                  <input class="form-check-input" type="radio" id="melee" name="contact" value="Cuerpo a cuerpo" checked>
                  <label class="form-check-label" for="melee">Daño cuerpo a cuerpo</label>
                </div>
              </div>
              <!-- Campo de selección de clase -->
              <div class="form-group">
                <label for="subject">Clase del personaje</label>
                <select class="form-control" id="clase" name="clase">
                  <option value="Mago">Mago</option>
                  <option value="Guerrero">Guerrero</option>
                  <option value="Arquero">Arquero</option>
                  <option value="Sacerdote">Sacerdote</option>
                </select>
              </div>
            </div>
            <div class="col">
              <!-- Campo de checkboxes -->
              <div class="border my-4 px-3 py-2">
                <p><strong>Datos adicionales</strong></p>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="checkbox" id="casado" name="casado" value="on">
                  <label class="form-check-label pr-3" for="casado">Esta casad@</label>
                  <input class="form-check-input" type="checkbox" id="equipo" name="en_equipo" value="on">
                  <label class="form-check-label" for="equipo">En el equipo actual</label>
                </div>
              </div>
            </div>
          </div>

          <!-- Campo textarea para la descripcion del personaje -->
          <div class="form-group">
            <label for="descripcion">Descripcion:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="4" placeholder="Escribe la descripcion del personaje..."></textarea>
          </div>

          <div class="form-row">
            <!-- Seleccionar Imagen -->
            <div class="col">
              <div class="custom-file">
                <input type="file" accept=".jpg, .jpeg, .png, .gif" class="custom-file-input" name="imagen" id="customFile">
                <label class="custom-file-label   " for="customFile">Elige una imagen</label>
              </div>
            </div>
            <!-- Botón de añadir -->
            <div class="col">
              <div class="form-group">
                <input value="Añadir" class="btn btn-secondary" onclick="add_to_list()" type="submit" />
              </div>
            </div>
          </div>
        </form>
      </div>

      <button class="btn btn-primary mt-2" id="delete-selected">Eliminar selección</button>


      <div class="table-responsive">
        <table class="table table-hover mt-5 text-center">
          <thead>
            <tr>
              <th scope="col">
                <input type="checkbox" id="select-all">
              </th>
              <th scope="col">Icono</th>
              <th scope="col">Nombre</th>
              <th scope="col">Apodo</th>
              <th scope="col">Tipo de daño</th>
              <th scope="col">Casado</th>
              <th scope="col">En equipo</th>
              <th scope="col">Clase</th>
            </tr>
          </thead>
          <tbody id="contenedor">
            <!--añadir datos de personajes creados aqui-->
          </tbody>
        </table>
      </div>


    </main>

  </div>



  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Editar datos del personaje: </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div>
            <div class="form-row">
              <!-- Campo de Nombre -->
              <div class="form-group col-md-6">
                <label for="name">Nombre completo del personaje</label>
                <input class="form-control" type="text" id="name-modal" name="name" placeholder="Introduce el nombre completo" required>
              </div>
              <!-- Campo de Apodo -->
              <div class="form-group col-md-6">
                <label for="apodo">Apodo</label>
                <input class="form-control" type="text" id="apodo-modal" name="apodo" placeholder="Introduce el apodo del personaje">
              </div>
            </div>

            <div class="border my-4 px-3 py-2">
              <p><strong>Datos adicionales</strong></p>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="casado-modal" name="casado" value="Casado">
                <label class="form-check-label pr-3" for="casado">Esta casad@</label>
                <input class="form-check-input" type="checkbox" id="equipo-modal" name="en_equipo" value="equipo">
                <label class="form-check-label" for="equipo">En el equipo actual</label>
              </div>
            </div>

            <div class="form-group">
              <label for="descripcion">Descripcion:</label>
              <textarea class="form-control" id="descripcion-modal" name="descripcion" rows="4" placeholder="Escribe la descripcion del personaje..."></textarea>
            </div>

          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
          <button type="button" class="btn btn-primary"  data-dismiss="modal" id="btn_guardar_cambios">Guardar Cambios</button>
        </div>
      </div>
    </div>
  </div>
  <!-- lick a JS -->
  <script src="proyecto1PHP/js/script.js"></script>

  <!-- Script con funciones del arbol dom que deben conectar con PHP -->
  <script>
    <? //Para obtener la lista de personajes cargados desde script.php:
    $personajes_cargados = isset($_SESSION['list_personajes']) ? $_SESSION['list_personajes'] : [];
    ?>

    // los transformamos a una variable de js
    const personajesjson = <?php echo json_encode($personajes_cargados); ?>;

    //Los 'casteamos' a un objeto de la clase Personaje
    const personajesObj = personajesjson.map(data => new Personaje(
      data.id,
      data.nombre,
      data.apodo,
      data.tipo_danio,
      data.casado,
      data.en_equipo,
      data.clase,
      data.descripcion,
      data.img
    ));

    // funcion para cargar los datos guardados en la bbdd
    document.addEventListener('DOMContentLoaded', function() {

      // iteramos la lista y vamos añadiendolos
      personajesObj.forEach(personaje => {
        anadir_dato_html(personaje);
      });
    });

    //Añadir eventos a los botones y demas
    document.addEventListener('DOMContentLoaded', () => {
        const selectAll = document.getElementById('select-all'); //Checkbox para seleccionar todos
        const deleteBtn = document.getElementById('delete-selected'); //checkbox por elemento
        const tableBody = document.querySelector('tbody'); //Para añadir efecto de seleccion
        const botones_editar = tableBody.querySelectorAll('#btn_editar_registro'); //botones para abrir modal
        const btn_guardar_cambios = document.getElementById('btn_guardar_cambios') //Btn para lanzar el update a la bbdd

        // Verificación de que los elementos existen
        if (!selectAll || !deleteBtn || !tableBody || !botones_editar) {
          console.error('No se encontraron los elementos necesarios en el DOM');
          return;
        }

        // Delegación de eventos para los checkboxes
        tableBody.addEventListener('change', (e) => {
          if (e.target.classList.contains('select-row')) {
            // Cambiar el estilo de la fila según el estado del checkbox
            e.target.closest('tr').classList.toggle('fila_seleccionada', e.target.checked);
          }
        });

        // Seleccionar/deseleccionar todos
        selectAll.addEventListener('change', () => {
          const checkboxes = tableBody.querySelectorAll('.select-row');
          checkboxes.forEach(cb => {
            cb.checked = selectAll.checked;
            cb.closest('tr').classList.toggle('fila_seleccionada', cb.checked);
          });
        });

        // Acción al hacer clic en el botón "Eliminar"
        deleteBtn.addEventListener('click', () => {

          const checkboxes = tableBody.querySelectorAll('.select-row');

          checkboxes.forEach((cb, index) => {
            if (cb.checked) {
              cb.closest('tr').remove(); // Borra la fila completa

              // Obtenemos el id del personaje usando el índice de la fila
              //Ya que los elementos se añaden desde personajesObj la posicion dentro de esta lista es la misma que en la tabla.
              const id = personajesObj[index].id;

              // Conectar con PHP para eliminar el registro
              eliminarDeBaseDeDatos(id); // Esto debe ser la función que conecta con PHP
            }
          });
        });

        //Cargar datos del personaje al dialog modal
        let act_id; //Variable para guardar el id del elemento siendo editado
        botones_editar.forEach((btn, index) => {

          btn.addEventListener('click', () => {

            //Obtenemos los elementos del popup
            const in_nombre_popup = document.getElementById('name-modal');
            const in_apodo_popup = document.getElementById('apodo-modal');
            const in_casado_popup = document.getElementById('casado-modal');
            const in_en_equipo_popup = document.getElementById('equipo-modal');
            const in_descripcion_popup = document.getElementById('descripcion-modal');

            //Obtenemos el ersonaje asociado al registro:
            let personaje = personajesObj[index];
            act_id=personaje.id;

            //añadimos los datos correspondientes una vez cargue el modal:
            waitForElement('.modal > *', () => {
              in_nombre_popup.value = personaje.nombre;
              in_apodo_popup.value = personaje.apodo;
              in_descripcion_popup.value = personaje.descripcion;

              in_casado_popup.checked = personaje.casado == 1;
              in_en_equipo_popup.checked = personaje.en_equipo == 1;
            });

          })
        });

        //Event listener para el boton que lanze el update:
        btn_guardar_cambios.addEventListener('click', ()=>{

          //Recuperar los datos del formulario para editar y mandarlos con el metodo actualizarDatos:
            const nombre_popup = document.getElementById('name-modal').value;
            const apodo_popup = document.getElementById('apodo-modal').value;
            const casado_popup = document.getElementById('casado-modal').checked? 1:0;
            const en_equipo_popup = document.getElementById('equipo-modal').checked? 1:0;
            const descripcion_popup = document.getElementById('descripcion-modal').value;

            //Enviamos los datos + el indice almacenado al pulsar el boton editar
            actualizarDatos(act_id, nombre_popup, apodo_popup, casado_popup, en_equipo_popup, descripcion_popup);
            //Una vez actualizado liberamos el valor del indice actual
            act_id=null;

        });

        
      }


    );
  </script>

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>

</body>

</html>
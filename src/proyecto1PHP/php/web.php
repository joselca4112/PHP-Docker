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

  <!-- Datatable CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

  <title>Formulario Boostrap+PHP</title>
</head>

<body>

  <!-- Barra superior -->
  <div class="container-flex text-center h5 sticky-top mb-0 ">
    <div class="row row cols-md-2">
      <a class="text-white bg-dark col-md-2 text-wrap text-center pt-2 pb-2 pl-3" id="no-underline"
        href="">Personajes</a>
      <input class="form-control-lg bg-dark border-0 rounded-0 col pt-2 pl-5" id="buscador" placeholder="Buscar por nombre..."
        type="text" aria-label="Search">
      </input>
      <a class="navbar-nav col col-md-2 text-muted bg-dark py-2 pr-3 pl-1 h6" href="">Sign out</a>
    </div>
  </div>

  <div class="d-flex">

    <!-- Barra lateral -->
    <nav class="col-md-2 d-none d-md-block sidebar pt-3 bg-light">
      <div class="container-flexbg-light h6 sidebar-sticky">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active text-primary" href="#" id="nav-table">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-database me-2">
                <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
                <path d="M3 5v14c0 1.66 4.03 3 9 3s9-1.34 9-3V5"></path>
                <path d="M3 12c0 1.66 4.03 3 9 3s9-1.34 9-3"></path>
              </svg>
              Tabla de datos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" id="nav-form">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-plus-square me-2">
                <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                <line x1="12" y1="8" x2="12" y2="16"></line>
                <line x1="8" y1="12" x2="16" y2="12"></line>
              </svg>
              Añadir nuevo</a>
          </li>
        </ul>
        <hr class="dropdown-divider">

        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <button class="btn btn-outline-secondary d-none d-md-block w-100 text-center d-flex align-items-center justify-content-center gap-2 small">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-calendar">
                  <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                  <line x1="16" y1="2" x2="16" y2="6"></line>
                  <line x1="8" y1="2" x2="8" y2="6"></line>
                  <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
                Esta semana
              </button>
            </a>

          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <button class="btn btn-outline-secondary d-none d-md-block w-100 text-center d-flex px-1 align-items-center justify-content-center gap-2 small">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-calendar">
                  <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                  <line x1="16" y1="2" x2="16" y2="6"></line>
                  <line x1="8" y1="2" x2="8" y2="6"></line>
                  <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
                Semana pasada
              </button>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <button class="btn btn-outline-secondary d-none d-md-block w-100 text-center d-flex align-items-center justify-content-center gap-2 small">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                  class="feather feather-calendar">
                  <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                  <line x1="16" y1="2" x2="16" y2="6"></line>
                  <line x1="8" y1="2" x2="8" y2="6"></line>
                  <line x1="3" y1="10" x2="21" y2="10"></line>
                </svg>
                Este mes
              </button>
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="col-md-10 ml-sm-auto pt-3 px-4">

      <!-- tab del formulario para añadir personaje -->
      <div id="form-tab" class="tab-pane d-none  m-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap mb-3">
          <h1>Añadir personaje </h1>
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
                <div class="form-group d-flex justify-content-between flex-wrap flex-md-nowrap">
                  <input value="Añadir" class="btn btn-primary" onclick="add_to_list()" type="submit" />
                  <button class="btn btn-secondary" type="button" onclick="limpiar_formulario()"> Limpiar </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>

      <!-- tab de la lista de personajes -->
      <div id="table-tab" class="tab-pane d-block">
        <p>
        <h1>Personajes actuales </h1>
        </p>
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap mb-4">
          <button class="btn btn-primary mt-2" id="delete-selected">Eliminar selección</button>
          <button class="btn btn-outline-secondary" id="downloadBtn">Exportar csv</button>
        </div>


        <div class="table-responsive">
          <table class="table table-hover mt-5 text-center" id="analiticaTable">
            <thead>
              <tr class="table-secondary">
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
          <h1 class="lead d-none" id="txt-no-data">No se encontraron datos. Añade un personaje nuevo.</h1>
        </div>
      </div>

    </main>

  </div>

  <!-- Modal de detalles-->
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
        <!-- Botones del modal -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>

          <button type="button" class="btn btn-warning" id="btn_modificar">Modificar</button>
          <button type="button" class="btn btn-success d-none" id="btn_guardar" data-dismiss="modal">Guardar</button>
          <button type="button" class="btn btn-danger d-none" id="btn_cancelar">Cancelar</button>
        </div>

      </div>
    </div>
  </div>

  <!-- Para navegar entre tabs: -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const navLinks = document.querySelectorAll('.nav-link');
      const tabMap = {
        'nav-table': 'table-tab',
        'nav-form': 'form-tab'
      };

      navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
          e.preventDefault();

          // Quitar clase 'active' a todos los nav-link
          navLinks.forEach(l => l.classList.remove('active', 'text-primary'));

          // Ocultar todos los tabs
          Object.values(tabMap).forEach(id => {
            const el = document.getElementById(id);
            el.classList.add('d-none');
            el.classList.remove('d-block');
          });

          // Activar el nav-link actual
          this.classList.add('active', 'text-primary');

          // Mostrar el tab correspondiente
          const tabId = tabMap[this.id];
          const targetTab = document.getElementById(tabId);
          targetTab.classList.remove('d-none');
          targetTab.classList.add('d-block');
        });
      });
    });
  </script>

  <!-- Para alertar mas precisas -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- jQuery -->
  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- DataTables JS -->
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
  <!-- link a JS para boton csv-->
  <script src="proyecto1PHP/js/downloadbutton.js"></script>
  <!-- js principal con funciones-->
  <script src="proyecto1PHP/js/script.js"></script>
  
  <!-- Script con funciones del arbol dom que deben conectar con PHP -->
  <script>
    <? //Para obtener la lista de personajes cargados desde script.php:
    $personajes_cargados = isset($_SESSION['list_personajes']) ? $_SESSION['list_personajes'] : [];
    ?>
    // los transformamos a una variable de js
    const personajesjson = <?php echo json_encode($personajes_cargados); ?>;

    //Los 'casteamos' a un objeto de la clase Personaje
    personajesjson.forEach(data => {
      list_personajes.push(new Personaje(
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
    });

    // funcion para cargar los datos guardados en la bbdd
    document.addEventListener('DOMContentLoaded', function() {
      //Comprobamos que se hayan recuperado datos
      if (list_personajes.length > 0) {
        // iteramos la lista y vamos añadiendolos 
        list_personajes.forEach(personaje => {
          anadir_dato_html(personaje);
        });
      } else {
        //Si no se recuperan datos se lo mostramos al usuario para que añada:
        let txt_aux = document.getElementById('txt-no-data');
        txt_aux.classList.add('d-block');
        txt_aux.classList.remove('d-none');
      }
    });
  </script>

  <script src="proyecto1PHP/js/domEvents.js">
    //añadir eventos a los botones
  </script>

  <!-- boostrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
    crossorigin="anonymous"></script>

</body>

</html>
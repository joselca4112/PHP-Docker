//Añadir eventos a los botones y demas
document.addEventListener('DOMContentLoaded', () => {
    const selectAll = document.getElementById('select-all'); //Checkbox para seleccionar todos
    const deleteBtn = document.getElementById('delete-selected'); //checkbox por elemento
    const tableBody = document.querySelector('tbody'); //Para añadir efecto de seleccion
    const btn_guardar_cambios = document.getElementById('btn_guardar') //Btn para lanzar el update a la bbdd
    const btn_modificar = document.getElementById('btn_modificar');
    const btn_cancelar = document.getElementById('btn_cancelar')

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

                personajesObj.splice(index, 1);

                // Conectar con PHP para eliminar el registro
                eliminarDeBaseDeDatos(id); // Esto debe ser la función que conecta con PHP
            }
        });

        if (!personajesObj.length > 0) {
            //Si nos quedamos sin datos al borrar mostramos el texto de 'sin datos'
            let txt_aux = document.getElementById('txt-no-data');
            txt_aux.classList.add('d-block');
            txt_aux.classList.remove('d-none');
        }
    });

    // Evento: Modificar, pulsar el btn modificar dentro del modal:
    btn_modificar.addEventListener('click', function () {
        toggleCamposModal(false);
        this.classList.add('d-none');
        btn_guardar_cambios.classList.remove('d-none');
        btn_cancelar.classList.remove('d-none');
    });

    // Evento: Cancelar (volver al modo solo lectura sin guardar)
    btn_cancelar.addEventListener('click', function () {
        toggleCamposModal(true);
        this.classList.add('d-none');
        btn_guardar_cambios.classList.add('d-none');
        btn_modificar.classList.remove('d-none');
    });

    //buscador de arriba
    document.getElementById("buscador").addEventListener("keyup", function () {
        const filtro = this.value.toLowerCase();
        document.querySelectorAll("#analiticaTable tbody tr").forEach(fila => {
            const texto = fila.querySelector("#td-nombre").textContent.toLowerCase();
            fila.style.display = texto.includes(filtro) ? "" : "none";
        });
    });

}
);


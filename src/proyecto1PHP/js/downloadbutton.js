
//simplemente hay que ponerle al boton id downloadBtn y a la tabla id analiticaTable
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById("downloadBtn").addEventListener("click", function () {
        // Obtiene la tabla
        var table = document.getElementById("analiticaTable");

        // Inicializa un array para almacenar las filas CSV
        var csv = [];

        // Obtén las cabeceras de la tabla
        var headers = table.querySelectorAll("th");
        var headerRow = [];
        headers.forEach(function (header) {
            headerRow.push(header.innerText.trim());
        });
        csv.push(headerRow.join(",")); // Agrega las cabeceras al CSV

        // Obtén los datos de las filas
        var rows = table.querySelectorAll("tr");
        rows.forEach(function (row, index) {
            // Evita la primera fila (que son las cabeceras)
            if (index === 0) return;

            var rowData = [];
            var cells = row.querySelectorAll("td");
            cells.forEach(function (cell) {
                rowData.push(cell.innerText.trim());
            });

            csv.push(rowData.join(",")); // Agrega los datos de la fila al CSV
        });

        // Crea un archivo CSV a partir del contenido del array
        var csvFile = new Blob([csv.join("\n")], { type: "text/csv" });

        // Crea un enlace para descargar el archivo CSV
        var link = document.createElement("a");
        link.href = URL.createObjectURL(csvFile);
        link.download = "tabla_datos.csv"; // El nombre del archivo CSV
        link.click();
    });
})
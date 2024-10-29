document.addEventListener('DOMContentLoaded', function () {    

    fetch(`../Logica/readCsv.php?filePath=${encodeURIComponent(rutaArchivo)}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error(data.error);
                return;
            }
            
            data = data.map(row => row.map(cell => cell === "" ? "-" : cell));

            data = data.map((row, rowIndex) => 
                row.map((cell, colIndex) => 
                    (rowIndex > 0 && colIndex > 0 && !opciones.includes(cell)) ? `-- '${cell}' -- Error: Ejercicio llamado '${cell}' eliminado del sistema --` : cell
                )
            );

            const container = document.getElementById('excelGrid');
            const hot = new Handsontable(container, {
                data: data,
                rowHeaders: false,
                rowHeights: 50,
                autoRowSize: true,
                cells: function (row, col, prop) {
                    const cellProperties = {};
                    // Hacer solo lectura la primera fila y la primera columna
                        cellProperties.readOnly = true;   
                    return cellProperties;
                },
                afterOnCellMouseDown: function(event, coords, TD) {
                    console.log('Clic en la celda:', coords); // Registro del clic
                    if (coords.row > 0 && coords.col > 0) {
                        const cellValue = hot.getDataAtCell(coords.row, coords.col);
                        console.log('Valor de la celda:', cellValue); // Registro del valor de la celda
                        if (cellValue && cellValue!=="-" && opciones.includes(cellValue)) {
                            // Actualizar la información del ejercicio
                            actualizarInfoEjercicio(cellValue);
                        }
                    }
                },
                licenseKey: 'non-commercial-and-evaluation',
                afterInit: function() {
                    const totalColumns = this.countCols();
                    const columnWidth = totalColumns > 0 ? 1200 / totalColumns : 1200;
                    this.updateSettings({
                        colWidths: Array(totalColumns).fill(columnWidth)
                    });
                    window.scrollTo(0, document.body.scrollHeight);
                }
            });
        })
        .catch(error => console.error('Error al cargar los datos:', error));
        
    function actualizarInfoEjercicio(nombreEjercicio) {
        window.location.href = `../Presentacion/informacionPlan.php?NombrePlan=${encodeURIComponent(NombrePlan)}&NombreEjercicio=${encodeURIComponent(nombreEjercicio)}&modo=ver#`;
    }
});
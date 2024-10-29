document.addEventListener('DOMContentLoaded', function () {

    fetch(`../Logica/readCsv.php?filePath=${encodeURIComponent(rutaArchivo)}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                console.error(data.error);
                return;
            }
            
            // Reemplazar valores vacíos con "-"
            data = data.map(row => row.map(cell => cell === "" ? "-" : cell));

            // Marcar celdas con errores
            data = data.map((row, rowIndex) => 
                row.map((cell, colIndex) => 
                    (rowIndex > 0 && colIndex > 0 && !opciones.includes(cell)) 
                        ? `-- '${cell}' -- Error: Ejercicio llamado '${cell}' eliminado del sistema --` 
                        : cell
                )
            );

            // Inicializar Handsontable
            const container = document.getElementById('excelGrid');
            const hot = new Handsontable(container, {
                data: data,
                rowHeaders: false,
                rowHeights: 50,
                autoRowSize: true,
                cells: function (row, col, prop) {
                    const cellProperties = {};
                    if (row === 0 || col === 0) {
                        cellProperties.readOnly = false;
                    } else {
                        cellProperties.readOnly = false;
                        cellProperties.type = 'dropdown';
                        cellProperties.source = opciones;
                        cellProperties.strict = true;
                        cellProperties.allowInvalid = false;
                    }
                    return cellProperties;
                },
                licenseKey: 'non-commercial-and-evaluation',
                afterInit: function() {
                    UpdateColWidth(this)
                }

            });

            function UpdateColWidth(hot){
                const totalColumns = hot.countCols();
                const columnWidth = totalColumns > 0 ? 1200 / totalColumns : 1200;
                hot.updateSettings({
                    colWidths: Array(totalColumns).fill(columnWidth)
                });
            }

            // Agregar columna
            document.getElementById('newColumnButton').addEventListener('click', function () {
                hot.alter('insert_col_end', hot.countCols());
                UpdateColWidth(hot)
            });

            // Eliminar columna
            document.getElementById('removeColumnButton').addEventListener('click', function () {
                var totalColumns = hot.countCols();
                if (totalColumns > 0) {
                    var lastColumn = totalColumns - 1;
                    var ColData = hot.getDataAtCol(lastColumn);
                    if (ColData) {
                        var canRemove = ColData.every(function(value) {
                            return value === "" || value === "-" || value === null || value === undefined;
                        });
                        if (canRemove) {
                            hot.alter('remove_col', lastColumn);
                        } else {
                            alert('La última columna no puede ser eliminada porque contiene valores diferentes de "" o "-".');
                        }
                    } else {
                        alert('No se pudieron obtener los datos de la columna.');
                    }
                } else {
                    alert('No hay columnas para eliminar.');
                }
                UpdateColWidth(hot)
            });

            // Agregar fila
            document.getElementById('newRowButton').addEventListener('click', function () {
                hot.alter('insert_row_below', hot.countRows());
                UpdateColWidth(hot)
            });

            // Eliminar fila
            document.getElementById('removeRowButton').addEventListener('click', function () {
                var totalRows = hot.countRows();
                if (totalRows > 0) {
                    var lastRow = totalRows - 1;
                    var rowData = hot.getDataAtRow(lastRow);
                    if (rowData) {
                        var canRemove = rowData.every(function(value) {
                            return value === "" || value === "-" || value === null || value === undefined;
                        });
                        if (canRemove) {
                            hot.alter('remove_row', lastRow);
                        } else {
                            alert('La última fila no puede ser eliminada porque contiene valores diferentes de "" o "-".');
                        }
                    } else {
                        alert('No se pudieron obtener los datos de la fila.');
                    }
                } else {
                    alert('No hay filas para eliminar.');
                }
                UpdateColWidth(hot)
            });

            // Guardar datos
            document.getElementById('saveBtn').addEventListener('click', function () {
                const updatedData = hot.getData();
                fetch(`../Logica/saveCsv.php?filePath=${encodeURIComponent(rutaArchivo)}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(updatedData)
                })
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        alert('Datos guardados correctamente');
                    } else {
                        alert('Error al guardar los datos');
                    }
                })
                .catch(error => console.error('Error al guardar los datos:', error));
            });
        })
        .catch(error => console.error('Error al cargar los datos:', error));
});

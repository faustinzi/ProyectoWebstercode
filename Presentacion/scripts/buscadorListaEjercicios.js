arregloBusqueda = [];

function Calculo() {
    var string = document.getElementById("buscadorEjercicios").value.toLowerCase();
    arregloBusqueda = [];
    arregloEjercicios.forEach(elementoA => {
        if (elementoA.toLowerCase().includes(string)) {
            arregloBusqueda.push(elementoA);
        }
    });
    
    var lista = document.getElementById("listaBusqueda");
    lista.innerText = arregloBusqueda.join('>');

    actualizarLista();
}

document.getElementById("buscadorEjercicios").addEventListener('input', Calculo);

function actualizarLista() {
    var articulos = document.querySelectorAll('main section article');

    articulos.forEach(articulo => {
        var nombreEjercicio = articulo.querySelector('h3').innerText;

        if (arregloBusqueda.includes(nombreEjercicio)) {
            articulo.style.display = "grid"; 
        } else {
            articulo.style.display = "none"; 
        }
    });
}
/* funcion validar()

*/

/*
Javascript
Cadena
DOM, eventos
Numeros
Objetos
Arreglos
*/
function validar(){
    /*cumplimiento con dicc de datos*/
    var nombre = document.getElementById('nombre').value;
    //caso debug
    //console.log(nombre);
    if (nombre==null||nombre==''|| !isNaN(nombre) || /^\s+$/.test(nombre)) {
        alert('El valor de nombre no esta correcto');
        document.getElementById('nombre').select();
        return false;       
    }
    return true;

}

function saludar(nombre = 'Sin definir'){
    document.getElementById('saludo').innerHTML = 'Hola '+nombre;
}

/* area general para crear tabla
contenido de asignacion de evento a elementos
uso de funciones anonimas
*/

document.getElementById('crearTabla').addEventListener('click',function(){
    var nRen= 5;
    var nCol = 5;
    //usar metodos para crear nodos
    var cuerpoTabla = document.getElementById('contenidoTabla');

    var tabla = document.getElementById('table');
    var tbody = document.getElementById('tbody');

    tabla.setAttribute('class','table table-bordered')

    //crear los renglones y las celdas (tr,td)

    for (var i = 0; i < nRen; i ++) {
        var fila = document.createElement('tr');

        for(var j = 0;j < nCol; j++){
            var columna = document.createElement('td');
            var textoColumna = document.createTextNode(i + ',' + j);

            //asociar texto a columna y columna a fila
            columna.appendChild(textoColumna);
            fila.appendChild(columna);

        }//columnas
        
        //asociar la fila a tbody
        tbody.appendChild(fila);

    }//filas
    //asociar tbody con tabla
    tabla.appendChild(tbody);
    //asociar tabla con cuerpoTabla
    cuerpoTabla.appendChild(tabla);
});
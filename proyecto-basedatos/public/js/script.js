/*
    function validar()
    * entrada: 
    * salida: boolean true or false
*/

function validar(){
    
    var nombre=document.getElementById('nombre').value;
    //debug

    if(nombre == null || nombre.length <=0 || nombre == '' || /^\s+$/.test(nombre) || !isNaN(nombre)){
        document.getElementById('nombre').select(); //este solo realiza el focus y selecciona el error
        alert('El valor '+ nombre + ' no es valido para nombre');
        //document.getElementById('nombre').focus(); es para enforcar el objeto
        return false;
    }
    return true;
}   

function saludar(nombre='sin determinar'){
    document.getElementById('saludo').innerHTML='Hola '+nombre
}
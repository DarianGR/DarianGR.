/*

ejemplo de uso de JQuery

*/
$('#leer').on('click',function(){
    /*
    XMLHttpRequest:
        1) onreadystatechenge ==> permite validando
            a) el readyState y status (4,200) -- correcto
            == respuesta ==> responseText, responseXML
            b) readyState y status (4, !=200) - incorrecto
            b') readyState y status (!=4, !=200) -- inconrrecto
        2) open ==> methond, url (recurso a llamar)
        3) send ==> datps (data) -- null, ___
    
    */

    // ================ inicio de primer ejemplo ============
  /*  $.ajax({
        statusCode: {
            404: function(){
                $('#lectura').text('Aviso: Elemento no encontrado');
            },
            501: function(){
                $('#lectura').text('Metodo no implementado');
            }
        },
        type: 'GET',
        url: '../archivos/lectura.txt',
        datatype: 'text', //json,xml,script
        //data:,    sLectua + this.responseText
        success:function(sLectura){
            $('#lectura').text(sLectura); //innerText
        },
        error:function(){
            // console.log(evt.responseText);
        }
    });  */
    // ============ fin primer ejemplo =====================
    /* explicacion de otra forma:
    subtitución de success por done, error por fail
    
    */
    $.ajax({
        statusCode: {
            404: function(){
                $('#lectura').text('Aviso: Elemento no encontrado');
            },
            501: function(){
                $('#lectura').text('Metodo no implementado');
            }
        },
        type: 'GET',
        url: '../archivos/lectura.txt',
        datatype: 'text'
    })
    .done(
        function(sLectura){
            $('#lectura').text(sLectura); //innerText
    })
    .fail(function(evt){
        // console.log(evt.responseText);
    });

}); //click









/*funcion saliudar*/
$(function(){
    // antes, JS puro
    //document.querySelector('#saludo').addEventListener('click', function(){})

    /*$('#saludo').click(function(){
        //Todo 2
    });

    $('#saludo').blur(function(){
        //Todo 3
    }); */
    
    $('#saludo').on('click', function(){
        //document.querySelector('#mensaje').innerHTML = variable;

        $('#mensaje').attr('class','text-info');
        $('#mensaje').html('<strong>hola</strong>');
        // $('mensaje')
    });

    

});
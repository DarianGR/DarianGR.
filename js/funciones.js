// Script de ejemplo de uso de jQuery
$(function(){
    document.querySelector('#saludo').addEventListener('click',function(){})
    // equivalente
    /*$('#saludo').click(function(){});
    $('#saludo').dblclick(function(){});
    Es lo mismo a:
    $('#saludo').on('click',function(){});*/

    /* 
        method, url => open
        data => send
        respuesta => responseText, responseXML
        readyState, status => onreadystatechange
        success (4,200) => done
        error (4,501) => fail

    */

    $('#leer').on('click',function(){
        //AJAX CON SUCCES Y ERROR
        /*$.ajax({
            statusCode: {
                404:function(){
                    $('#lectura').text('El recurso no se encuentra');
                },
                400:function(){
                    $('#lectura').text('Método no soportado');
                }
                
            },

            url: '../archivos/lectura.txt',
            type: 'GETs', //method
            dataType:'text', //responseXXX
            success: function(sLectura){
                $('#lectura').text(sLectura);
            },
            //usar error solo para debug
            error: function(evt){
                console.log(evt.responseText);
            }

        });*/

        //AJAX CON DONE Y FAIL
        $.ajax({
            statusCode: {
                404:function(){
                    $('#lectura').text('El recurso no se encuentra');
                },
                400:function(){
                    $('#lectura').text('Método no soportado');
                }
                
            },

            url: '../archivos/lectura.txt',
            type: 'GET', //method
            dataType:'text', //responseXXX                        

        }).done(function(sLectura){
            $('#lectura').text(sLectura);
        }) //fin de done
        .fail(function(evt){});//fin del fail
    }  );
    
    $('#saludo').on('click',function(){
        $('#mensaje').attr('class', 'text-success')
        $('#mensaje').html('Hola ... (quien seas)');
    });
}); 
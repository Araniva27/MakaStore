
//Constante para establecer la ruta y parámetros de comunicación con la API
const apiSesion = '../../core/api/customer.php?site=public&action=';

//Función para validar el usuario al momento de iniciar sesión
$('#loginCliente').submit(function(){
    event.preventDefault();
    $.ajax({
        url: apiSesion + 'login',
        type: 'post',
        data: $('#loginCliente').serialize(),
        datatype: 'json'
    })
    .done(function(response){
         //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
         if(isJSONString(response)){
             const result= JSON.parse(response);
              //Se comprueba si la respuesta es satisfactoria, sino se muestra la excepción
              if(result.status){
                  $('#loginCliente')[0].reset();
                sweetAlert(1, 'Autenticación correcta', 'index.php');            
              }else{
                sweetAlert(2, result.exception, null);
              }
         }else{
            console.log(response);
         }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})


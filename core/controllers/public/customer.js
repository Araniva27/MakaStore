//Constante para establecer la ruta y parámetros de comunicación con la API
const apiClientes = '../../core/api/customer.php?site=public&action=';
//Funcion para registrar clientes

$('#form-createC').submit(function(){
    event.preventDefault(); 
    $.ajax({
        url: apiClientes + 'createC',
        type: 'post',
        data: $('#form-createC').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if(isJSONString(response)){
            const result=JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if(result.status){
                $('#form-createC')[0].reset();
                sweetAlert(1, 'Administrador registrado correctamente', null);
            }else{
                sweetAlert(2, result.exception, null);
            }
        }else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' +jqXHR.status+ jqXHR.statusText);
    });
})
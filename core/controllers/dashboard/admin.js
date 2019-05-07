//Constante para establecer la ruta y parámetros de comunicación con la API
const apiAdmin = '../../core/api/admin.php?site=dashboard&action=';
//Función para registrar admin
$('#registro-admin').submit(function(){
    event.preventDefault(); 
    $.ajax({
        url: apiAdmin + 'create',
        type: 'post',
        data: $('#registro-admin').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if(isJSONString(response)){
            const result=JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if(result.status){
                $('#registro-admin')[0].reset();
                sweetAlert(1, 'Administrador registrado correctamente', null);
            }else{
                sweetAlert(2, result.exception, null);
            }
        }else{
            console.log(response);
            sweetAlert(2,error3(response), null);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: ' +jqXHR.status+ jqXHR.statusText);
    });
})

function error3(response){
    switch (response) {
        case 'Dato duplicado, no se puede guardar':   
            mensaje = 'Nombre de usuario, telefono o correo ya existen';
            break;
        default:
            mensaje = 'Ocurrio un problema, reportese con su administrador';
            break;
    }
    return mensaje;
}
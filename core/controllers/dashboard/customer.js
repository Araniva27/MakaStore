$(document).ready(function()
{
    //inicializacion de la funcion para mostrar datos en la tabla
    showTable(1);    
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiClientes = '../../core/api/customer.php?site=dashboard&action=';

//Función para llenar tabla con los datos de los registros
function fillTable(rows, estado)
{
    let content= '';
    rows.forEach(function(row){
        (row.estado==1) ? icon='visibility' : icon = 'visibility_off';
        content +=`
            <tr>
                <td>${row.idCliente}</td>
                <td>${row.nombre}</td>
                <td>${row.apellido}</td>
                <td>${row.correo}</td>
                <td>${row.usuario}</td>
                <td><i class="material-icons">${icon}</i></td>
                <td>${row.direccion}</td>`;
                if(estado==0){
                    content += ` 
                    <td><a href="#" onclick="enableCustomer(${row.idCliente})" class="waves-effect waves-grey btn green tooltipped" data-tooltip="Eliminar"><i class="material-icons">check</i></a></td>`;
                }else{
                    content += `       
                    <td>
                        <a href="#" onclick="confirmDelete(${row.idCliente})" class="waves-effect waves-grey btn red tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>     
                        <a href="#" onclick="modalUpdate(${row.idCliente})" class="waves-effect waves-light btn grey tooltipped" data-tooltip="Modificar"><i class="material-icons">mode_edit</i></a> 
                    </td>            
                }
                
            </tr>
        `;
            }
    });
    $('#tbody-read').html(content);    
    $('#tbody-read').html(content);
    var table = $('#tabla-clientes').DataTable({
        "oLanguage":{
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        retrieve: true
       
    });
    $('select').formSelect();
    $('.tooltipped').tooltip();
}

//Función para obtener y mostrar los registros disponibles
function showTable(estado){
    $.ajax({
        url: apiClientes + 'read',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                fillTable(result.dataset,estado);
            } else {
                sweetAlert(4, result.exception, null);
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

function modalUpdate(id)
{
    $.ajax({
        url: apiClientes + 'get',
        type: 'post',
        data:{
            idCliente: id
        },
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio para mostrar los valores en el formulario, sino se muestra la excepción
            if (result.status) {
                $('#idCliente').val(result.dataset.idCliente);
                (result.dataset.estado == 1) ? $('#update_estado').prop('checked', true) : $('#update_estado').prop('checked', false);                
                M.updateTextFields();
                $('#modalUpdate').modal('open');
            } else {
                sweetAlert(2, result.exception, null);
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}

$('#form-update').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiClientes + 'update',
        type: 'post',
        data: new FormData($('#form-update')[0]),
        datatype: 'json',
        cache: false,
        contentType: false,
        processData: false
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                $('#modalUpdate').modal('close');
                if (result.status == 1) {
                    sweetAlert(1, 'Cliente modificado correctamente', null);
                } else if(result.status == 2) {
                    sweetAlert(3, 'Cliente modificado. ' + result.exception, null);
                } else {
                    sweetAlert(1, 'Cliente modificado. ' + result.exception, null);
                }
                $('#tabla-clientes').DataTable().destroy();
                showTable();
            } else {
                sweetAlert(2, result.exception, null);
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})

//Función para eliminar un registro seleccionado
function confirmDelete(id)
{
    swal({
        title: 'Advertencia',
        text: '¿Quiere eliminar el producto?',
        icon: 'warning',
        buttons: ['Cancelar', 'Aceptar'],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function(value){
        if (value) {
            $.ajax({
                url: apiClientes + 'delete',
                type: 'post',
                data:{
                    idCliente: id,                    
                },
                datatype: 'json'
            })
            .done(function(response){
                //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
                if (isJSONString(response)) {
                    const result = JSON.parse(response);
                    //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                    if (result.status) {
                        if (result.status == 1) {
                            sweetAlert(1, 'Cliente eliminado correctamente', null);
                        } else {
                            sweetAlert(3, 'Cliente eliminado. ' + result.exception, null);
                        }
                        $('#tabla-clientes').DataTable().destroy();
                        showTable();
                    } else {
                        sweetAlert(2, result.exception, null);
                    }
                } else {
                    console.log(response);
                }
            })
            .fail(function(jqXHR){
                //Se muestran en consola los posibles errores de la solicitud AJAX
                console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
            });
        }
    });
}

//funcion para mostrar los clienes eliminados
$("#btnClientesEliminados").on("click",function(){
    $.ajax({
        url: apiClientes + 'readEliminados',
        type: 'post',
        data: null,
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                fillTable(result.dataset,0);
            } else {
                sweetAlert(4, result.exception, null);
            }
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
    
});

function enableCustomer(id)
{
    swal({
        title: 'Advertencia',
        text: '¿Quiere habilitar el cliente?',
        icon: 'warning',
        buttons: ['Cancelar', 'Aceptar'],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function(value){
        if (value) {
            $.ajax({
                url: apiClientes + 'enable',
                type: 'post',
                data:{
                    idCliente: id,                    
                },
                datatype: 'json'
            })
            .done(function(response){
                //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
                if (isJSONString(response)) {
                    const result = JSON.parse(response);
                    //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                    if (result.status) {
                        if (result.status == 1) {
                            sweetAlert(1, 'Cliente habilitado correctamente', null);
                        } else {
                            sweetAlert(3, 'Cliente habilitado. ' + result.exception, null);
                        }
                        $('#tabla-clientes').DataTable().destroy();
                        showTable();
                    } else {
                        sweetAlert(2, result.exception, null);
                    }
                } else {
                    console.log(response);
                }
            })
            .fail(function(jqXHR){
                //Se muestran en consola los posibles errores de la solicitud AJAX
                console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
            });
        }
    });
}

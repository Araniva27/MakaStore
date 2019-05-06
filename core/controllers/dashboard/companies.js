$(document).ready(function()
{
    showTable(1);
})
//Constante para establecer la ruta y parámetros de comunicación con la API
const apiCompanies = '../../core/api/companies.php?site=dashboard&action=';

//funcion para llenar tabla con registros de la base de datos

function fillTable(rows, estado){
    let content='';
    
    rows.forEach(function(row){
        (row.estado == 1) ? icon = 'visibility' : icon = 'visibility_off';
        content += `
            <tr>
                <td>${row.idProveedor}</td>
                <td>${row.nombreProveedor}</td>
                <td>${row.direccion}</td>
                <td>${row.telefono}</td>
                <td>${row.correo}</td>
                <td><i class="material-icons">${icon}</i></td>`;
                if(estado == 0){
                    content += ` 
                    <td>
                        <a href="#" onclick="enableCompanie(${row.idProveedor})" class="waves-effect waves-grey btn green tooltipped" data-tooltip="Habilitar"><i class="material-icons">check</i></a>
                    </td> `;
                }else{
                    content += ` 
                    <td>
                     <a href="#" onclick="confirmDelete(${row.idProveedor})" class="waves-effect waves-grey btn red tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>               
                    <a class="waves-effect waves-light btn grey tooltipped" onclick= "modalUpdate(${row.idProveedor})" data-position="top" data-delay="50" data-tooltip="Modificar" href="#"><i class="material-icons center">update</i>
                    </a>
                </td>
            </tr>`;
                }
    });
    $('#tbody-read').html(content);
    var table = $('#tabla-proveedores').DataTable({
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
        url: apiCompanies +'read',
        type: 'post',
        data: null,
        datatype: 'json',
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if(isJSONString(response)){
            const result = JSON.parse(response);
            if(result.status){
                fillTable(result.dataset,estado);  
            }else{
                sweetAlert(4,result.exception, null);
            }
        }else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: '.jqXHR.status+' '+jqXHR.statusText);
    });
}

var form_search = document.getElementById('buscar');

function chepe(){
    
}
//funcion para mostrar los resultados de una busqueda
$('#form-search').submit(function(){
    event.preventDefault();
    if(form_search.value == '')
       showTable();
    else{
        $.ajax({
            url: apiCompanies +'search',
            type: 'post',
            data: $('#form-search').serialize(),
            datatype: 'json'        
        })
        .done(function(response){
            //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
            if(isJSONString(response)){ 
                const result =JSON.parse(response);
                //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
                if(result.status){
                    sweetAlert(4,'Coincidencias: ' + result.dataset.length, null);
                    fillTable(result.dataset);
                }
                else{
                    sweetAlert(3,result.exception, null);
                }
            }else{
                console.log(response);
            }
        })
        .fail(function(jqXHR){
            console.log('Error:' .jqXHR.status+' '+jqXHR.statusText);
        })
    }
    
})

//funcion para crear un nuevo registro
$('#form-create').submit(function(){
    event.preventDefault();

    $.ajax({
        url: apiCompanies + 'create',
        type: 'post',
        data: new FormData($('#form-create')[0]),
        datatype: 'json',
        cache: false,
        contentType: false,
        processData: false,
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if(isJSONString(response)){
            const result= JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if(result.status){
                $('#form-create')[0].reset();
                $('#modal-create').modal('close');
                if(result.status==1){
                    sweetAlert(1, 'Proveedor registrado correctamente', null);
                }else{
                    sweetAlert(3,'Categoria creada. ' +result.exception, null);
                }
                $('#tabla-proveedores').DataTable().destroy();
                showTable();
            }else{
                sweetAlert(4, result.exception, null);
            }
        }else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' +jqXHR.status+ ' ' +jqXHR.statusText);
    })
})
//Funcion para cargar datos en el modal 
function modalUpdate(id){
    $.ajax({
        url: apiCompanies + 'get',
        type: 'post',
        data:{
            idProveedor: id
        }, 
        datatype: 'json'
    })
    .done(function(response){
        if(isJSONString(response)){
            const result= JSON.parse(response);
            if(result.status){
                /* Asignacion de los campos del modal */
                $('#form-update')[0].reset();
                $('#idProveedor').val(result.dataset.idProveedor);
                $('#update_nombre').val(result.dataset.nombreProveedor);
                $('#update_direccion').val(result.dataset.direccion);
                $('#update_telefono').val(result.dataset.telefono);
                $('#update_correo').val(result.dataset.correo);
                (result.dataset.estado == 1) ? $('#update_state').prop('checked', true) :  $('#update_state').prop('checked', false);
                M.updateTextFields();
                $('#modal-update').modal('open');
            }else{
                sweetAlert(2,result.exception, null);
            }
        }else{
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        console.log('Error: '+jqXHR.status +' '+ jqXHR.statusText);
    });
}
//funcion para modificar un registro
$('#form-update').submit(function(){
    event.preventDefault();
    $.ajax({
        url: apiCompanies + 'update',
        type: 'post',
        data: new FormData($('#form-update')[0]),
        datatype: 'json',
        cache: false,
        contentType: false,
        processData: false
    })
    .done(function(response){
        if(isJSONString(response)){
            const result= JSON.parse(response);
            if(result.status){
                $('#modal-update').modal('close');
                if(result.status == 1){
                    sweetAlert(1, 'Proveedor modificado correctamente', null);
                }else if(result.status == 2){
                    sweetAlert(3, 'Proveedor modificado. '+ result.exception, null );
                }else{
                    sweetAlert(1, 'Proveedor modificado. '+ result.exception, null);
                }
                $('#tabla-proveedores').DataTable().destroy();
                showTable();
            } else {
                sweetAlert(2,result.exception,null);
            }
        }else{
                console.log(response);
            }
    })
    .fail(function(jqXHR){
        console.log('Error: '+ jqXHR.status+ ' ' + jqXHR.statusText);
    });
})
//Funcion para eliminar productos
function confirmDelete(id){
    swal({
        title: 'Advertencia',
        text: '¿Quiere eliminar la compañia?',
        icon: 'warning',
        buttons: ['Cancelar', 'Aceptar'],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function(value){
        if (value) {
            $.ajax({
                url: apiCompanies + 'delete',
                type: 'post',
                data:{
                    idProveedor: id,                    
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
                            sweetAlert(1, 'Proveedor eliminado correctamente', null);
                        } else {
                            sweetAlert(3, 'Proveedor eliminado. ' + result.exception, null);
                        }
                        $('#tabla-proveedores').DataTable().destroy();
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
//Funcion para leer los proveeedores eliminados
$("#btnProveedoresEliminado").on("click",function(){
    $.ajax({
        url: apiCompanies + 'readEliminados',
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
//Funcipn para habilitar compañias
function enableCompanie(id)
{
    swal({
        title: 'Advertencia',
        text: '¿Quiere habilitar el proveedor?',
        icon: 'warning',
        buttons: ['Cancelar', 'Aceptar'],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function(value){
        if (value) {
            $.ajax({
                url: apiCompanies + 'enable',
                type: 'post',
                data:{
                    idProveedor: id,                    
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
                            sweetAlert(1, 'Proveedor habilitado correctamente', null);
                        } else {
                            sweetAlert(3, 'Proveedor habilitado. ' + result.exception, null);
                        }
                        $('#tabla-proveedores').DataTable().destroy();
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

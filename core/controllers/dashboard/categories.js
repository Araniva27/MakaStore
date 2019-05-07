$(document).ready(function()
{
    showTable(1);
})
//Constante para establecer la ruta y parámetros de comunicación con la API
const apiCategories = '../../core/api/categories.php?site=dashboard&action=';
//funcion para llenar campos de la tabla  
function fillTable(rows, estado)
{
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function(row){
        (row.estado == 1) ? icon = 'visibility' : icon = 'visibility_off';
        content += `
            <tr>
                <td>${row.idCategoria}</td>
                <td><img src="../../resource/img/categorias/${row.foto}" class="materialboxed" height="100"></td>
                <td>${row.nomCategoria}</td>
                <td><i class="material-icons">${icon}</i></td>`;
                if(estado==0){
                    content += ` 
                <td>
                    <a href="#" onclick="enableCategory(${row.idCategoria})" class="waves-effect waves-grey btn green tooltipped" data-tooltip="Habilitar"><i class="material-icons">check</i></a>
                </td> `;
                }else{
                    content += `               
                <td>
                <a href="#" onclick="confirmDelete(${row.idCategoria})" class="waves-effect waves-grey btn red tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                <a href="#" onclick="modalUpdate(${row.idCategoria})" class="waves-effect waves-grey btn blue tooltipped" data-tooltip="Modificar"><i class="material-icons">mode_edit</i></a>                                                 
            </tr>               
            `;
                }
    });
    //aplicacion del pluggin datatable
    
    $('#tbody-read').html(content);  
    table('#tabla-categorias'); 
    $('.tooltipped').tooltip();   
    $('.materialboxed').materialbox();
}

function showTable(estado)
{
    $.ajax({
        url: apiCategories + 'readCategorias',
        type: 'post',
        data: {
            estado:estado
        },
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

//Función para crear un nuevo registro
$('#form-create').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiCategories + 'create',
        type: 'post',
        data: new FormData($('#form-create')[0]),
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
                $('#form-create')[0].reset();
                $('#modalcate').modal('close');
                if (result.status == 1) {
                    sweetAlert(1, 'Categoria creada correctamente', null);
                } else {
                    sweetAlert(3, 'Categoría creada. ' + result.exception, null);
                }
                $('#tabla-categorias').DataTable().clear();
                $('#tabla-categorias').DataTable().destroy();
                showTable();
            } else {
                sweetAlert(2, result.exception, null);
                
            }
        } else {
            console.log(response);
            sweetAlert(2,error(response), null);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})

//funcion para llenar los campos del formulario de acuerdo al producto seleccionado 
function modalUpdate(id)
{
    $.ajax({
        url: apiCategories + 'get',
        type: 'post',
        data:{
            idCategoria: id
        },
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio para mostrar los valores en el formulario, sino se muestra la excepción
            if (result.status) {
                $('#form-update')[0].reset();
                $('#idCategoria').val(result.dataset.idCategoria);
                $('#update_categoria').val(result.dataset.nomCategoria); 
                $('#imagen_categoria').val(result.dataset.foto);               
                $('#update_descripcion').val(result.dataset.descripcion);
                (result.dataset.estado == 1) ? $('#update_estado').prop('checked', true) : $('#update_estado').prop('checked', false);
                M.updateTextFields();
                $('#modalM').modal('open');
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
//funcion para actualizar categorias

$('#form-update').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiCategories + 'update',
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
                $('#modalM').modal('close');
                if (result.status == 1) {
                    sweetAlert(1, 'Categoría modificada correctamente', null);
                } else if(result.status == 2) {
                    sweetAlert(3, 'Categoría modificada. ' + result.exception, null);
                } else {
                    sweetAlert(1, 'Categoría modificada. ' + result.exception, null);
                }
                $('#tabla-categorias').DataTable().destroy();
                showTable();
            } else {
                sweetAlert(2, result.exception, null);
            }
        } else {
            console.log(response);
            sweetAlert(2,error(response), null);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
})

//Función para eliminar un registro seleccionado
function confirmDelete(id, file)
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
                url: apiCategories + 'delete',
                type: 'post',
                data:{
                    idCategoria: id,
                    foto: file
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
                            sweetAlert(1, 'Categoría eliminada correctamente', null);
                        } else {
                            sweetAlert(3, 'Categoría eliminada. ' + result.exception, null);
                        }                                                  
                        $('#tabla-categorias').DataTable().destroy();
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
//funcion para mostrar las categorías eliminadas
$("#btnEliminados").on("click",function(){
    $.ajax({
        url: apiCategories + 'readEliminados',
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

//funcion para habilitar las categorías que ya fueron eliminadas
function enableCategory(id)
{
    swal({
        title: 'Advertencia',
        text: '¿Quiere habilitar el producto?',
        icon: 'warning',
        buttons: ['Cancelar', 'Aceptar'],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function(value){
        if (value) {
            $.ajax({
                url: apiCategories + 'enable',
                type: 'post',
                data:{
                    idCategoria: id,                    
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
                            sweetAlert(1, 'Categoría habilitada correctamente', null);
                        } else {
                            sweetAlert(3, 'Categoría habilitada. ' + result.exception, null);
                        }                                 
                        $('#tabla-categorias').DataTable().destroy();     
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

function error(response){
    switch (response) {
        case 'Dato duplicado, no se puede guardar':   
            mensaje = 'Nombre de la categoria ya existe';
            break;
        default:
            mensaje = 'Ocurrio un problema, reportese con su administrador';
            break;
    }
    return mensaje;
}


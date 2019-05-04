$(document).ready(function()
{
    showTable(1);
    showSelectProveedores('create_proveedor', null);
    showSelectCategoria('create_categoria', null);
})
//Constante para establecer la ruta y parámetros de comunicación con la API
const apiProductos = '../../core/api/products.php?site=dashboard&action=';
//funcion para llenar campos de la tabla      
function fillTable(rows, estado)
{
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function(row){
        (row.estado == 1) ? icon = 'visibility' : icon = 'visibility_off';
        content += `
            <tr>
                <td>${row.idProducto}</td>
                <td><img src="../../resource/img/productos/${row.foto}" class="materialboxed" height="100"></td>
                <td>${row.nombre}</td>
                <td>${row.precio}</td>
                <td>${row.cantidad}</td>
                <td>${row.nombreProveedor}</td>
                <td><i class="material-icons">${icon}</i></td>`;
                if(estado==0){
                    content += ` 
                <td>
                    <a href="#" onclick="enableProduct(${row.idProducto})" class="waves-effect waves-grey btn green tooltipped" data-tooltip="Habilitar"><i class="material-icons">check</i></a>
                </td> `;
                }else{
                    content += `               
                <td>
                <a href="#" onclick="confirmDelete(${row.idProducto})" class="waves-effect waves-grey btn red tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                <a href="#" onclick="readComments(${row.idProducto})" class="waves-effect waves-grey btn yellow tooltipped" data-tooltip="Comentarios"><i class="material-icons">list</i></a>
                <a href="#" onclick="modalUpdate(${row.idProducto})" class="waves-effect waves-grey btn blue tooltipped" data-tooltip="Modificar"><i class="material-icons">mode_edit</i></a>                    
                <a href="#" onclick="modalStock(${row.idProducto})" class="waves-effect waves-grey btn green tooltipped" data-tooltip="Reabastecer"><i class="material-icons">add</i></a>                                   
                
            </tr>               
            `;
                }
    });
    //aplicacion del pluggin datatable
    
    $('#tbody-read').html(content);  
    table('#tabla-productos'); 
    $('.tooltipped').tooltip();   
    $('.materialboxed').materialbox();
}
//funcion para mostrar tabla
function showTable(estado)
{
    $.ajax({
        url: apiProductos + 'readProductos',
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


//funcion para llenar las cartas con los comentarios de los productos

function fillCards(rows)
{
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function(row){
        (row.estado == 1) ? icon = 'visibility' : icon = 'visibility_off';
        content += `
        <div class="card white">
            <input class='validate' type="hidden"  value="${row.idComentario}"/>
            <div class="card-content white-text hoverable">
                <p class="black-text">
                    <strong class="blue-text">Producto:</strong> ${row.producto}</p>
                <p class="black-text">
                    <strong class="blue-text">Cliente:</strong> ${row.cliente}</p>
                    <p class="black-text">
                    <strong class="blue-text">Usuario:</strong> ${row.usuario}</p>
                <p class="black-text">
                    <strong class="blue-text">Cliente:</strong> ${row.cliente}</p>
                    <p class="black-text">
                    <strong class="blue-text">Comentario:</strong> ${row.comentario}</p>
                    <p class="black-text">
                    <strong class="blue-text">Estado:</strong><i class="material-icons"> ${icon}</i></p>
                    <a href="#" onclick="updateState(${row.idComentario})" class="waves-effect waves-grey btn blue tooltipped" data-tooltip="Modificar estado"><i class="material-icons">mode_edit</i></a>                    
            </div>
        </div>
        `;
    });
    $('#modal-content').html(content);
    $('select').formSelect();
    $('.tooltipped').tooltip();   
    $('.materialboxed').materialbox();
}

/* function showCard()
{
    $.ajax({
        url: apiProductos + 'readComentarios',
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
                fillCards(result.dataset);
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
} */
//funcion para actualizar estado de los comentarios
function updateState(id)
{
    $.ajax({
        url: apiProductos + 'getComentarios2',
        type: 'post',
        data:{
            idComentario: id
        },
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio para mostrar los valores en el formulario, sino se muestra la excepción
            if (result.status) {       
                $('#form-updateState')[0].reset();
                $('#idComentario').val(result.dataset.idComentario);
                $('#idProd').val(result.dataset.idProducto);
                (result.dataset.estado == 1) ? $('#update_estadoC').prop('checked', true) : $('#update_estadoC').prop('checked', false);
                $('#modalP').modal('close'); 
                $('#modalState').modal('open');                        
            } else {
                sweetAlert(2, result.status, null);
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
//evento en el boton para actualizar estado
$('#form-updateState').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiProductos + 'updateState',
        type: 'post',
        data: new FormData($('#form-updateState')[0]),
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
                $('#modalState').modal('close');                
                if (result.status == 1) {
                    sweetAlert(1, 'Estado modificado correctamente', null);
                } else if(result.status == 2) {
                    sweetAlert(3, 'Estado modificado. ' + result.exception, null);
                } else {
                    sweetAlert(1, 'Estado modificado. ' + result.exception, null);
                }
                readComments($('#idProd').val());
            } else {
                console.log(response);
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


//funcion para leer los comentarios
function readComments(id)
{
    $.ajax({
        url: apiProductos + 'getComentarios',
        type: 'post',
        data:{
            idProducto: id
        },
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio para mostrar los valores en el formulario, sino se muestra la excepción
            if (result.status) {       
                fillCards(result.dataset);         
                $('#modalP').modal('open');                        
            } else {
                sweetAlert(2, 'Este producto no tiene comentarios', null);
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

//Función para cargar las caterias en el select del formulario
function showSelectProveedores(idSelect, value)
{
    $.ajax({
        url: apiProductos + 'readProveedores',
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
                let content = '';
                if (!value) {
                    content += '<option value="" disabled selected>Seleccione compañia</option>';
                }
                result.dataset.forEach(function(row){
                    if (row.idProveedor != value) {
                        content += `<option value="${row.idProveedor}">${row.nombreProveedor}</option>`;
                    } else {
                        content += `<option value="${row.idProveedor}" selected>${row.nombreProveedor}</option>`;
                    }
                });
                $('#' + idSelect).html(content);
            } else {
                $('#' + idSelect).html('<option value="">No hay opciones</option>');
            }
            $('select').formSelect();
        } else {
            console.log(response);
        }
    })
    .fail(function(jqXHR){
        //Se muestran en consola los posibles errores de la solicitud AJAX
        console.log('Error: ' + jqXHR.status + ' ' + jqXHR.statusText);
    });
}
//Función para cargar las caterias en el select del formulario
function showSelectCategoria(idSelect, value)
{
    $.ajax({
        url: apiProductos + 'readCategoria',
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
                let content = '';
                if (!value) {
                    content += '<option value="" disabled selected>Seleccione una categoria</option>';
                }
                result.dataset.forEach(function(row){
                    if (row.idCategoria != value) {
                        content += `<option value="${row.idCategoria}">${row.nomCategoria}</option>`;
                    } else {
                        content += `<option value="${row.idCategoria}" selected>${row.nomCategoria}</option>`;
                    }
                });
                $('#' + idSelect).html(content);
            } else {
                $('#' + idSelect).html('<option value="">No hay opciones</option>');
            }
            $('select').formSelect();
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
        url: apiProductos + 'create',
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
                $('#modalprod').modal('close');
                if (result.status == 1) {
                    sweetAlert(1, 'Producto creado correctamente', null);
                } else {
                    sweetAlert(3, 'Producto creado. ' + result.exception, null);
                }
                $('#tabla-productos').DataTable().clear();
                $('#tabla-productos').DataTable().destroy();
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

//funcion para llenar los campos del formulario de acuerdo al producto seleccionado 
function modalUpdate(id)
{
    $.ajax({
        url: apiProductos + 'get',
        type: 'post',
        data:{
            idProducto: id
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
                $('#idProducto').val(result.dataset.idProducto);
                $('#imagen_producto').val(result.dataset.foto);
                $('#update_producto').val(result.dataset.nombre);                
                $('#update_precio').val(result.dataset.precio);
                $('#update_descripcion').val(result.dataset.descripcion);
                (result.dataset.estado == 1) ? $('#update_estado').prop('checked', true) : $('#update_estado').prop('checked', false);
                showSelectProveedores('update_proveedor', result.dataset.idProveedor);
                showSelectCategoria('update_categoria', result.dataset.idCategoria);
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

function modalStock(id)
{
    $.ajax({
        url: apiProductos + 'getCantidad',
        type: 'post',
        data:{
            idProducto: id
        },
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio para mostrar los valores en el formulario, sino se muestra la excepción
            if (result.status) {
                $('#form-cantidad')[0].reset();
                $('#idProductoC').val(result.dataset.idProducto);                                      
                M.updateTextFields();
                $('#modalE').modal('open');                
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

$('#form-cantidad').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiProductos + 'updateCantidad',
        type: 'post',
        data: new FormData($('#form-cantidad')[0]),
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
                $('#modalE').modal('close');
                if (result.status == 1) {
                    sweetAlert(1, 'Cantidad agregada correctamente', null);
                } else if(result.status == 2) {
                    sweetAlert(3, 'Cantidad agregada. ' + result.exception, null);
                } else {
                    sweetAlert(1, 'Cantidad modificada. ' + result.exception, null);
                }
                $('#tabla-productos').DataTable().destroy();
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
//funcion para actualizar producto
$('#form-update').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiProductos + 'update',
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
                    sweetAlert(1, 'Producto modificado correctamente', null);
                } else if(result.status == 2) {
                    sweetAlert(3, 'Producto modificado. ' + result.exception, null);
                } else {
                    sweetAlert(1, 'Producto modificado. ' + result.exception, null);
                }
                $('#tabla-productos').DataTable().destroy();
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
                url: apiProductos + 'delete',
                type: 'post',
                data:{
                    idProducto: id,
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
                            sweetAlert(1, 'Producto eliminado correctamente', null);
                        } else {
                            sweetAlert(3, 'Producto eliminado. ' + result.exception, null);
                        }                                                  
                        $('#tabla-productos').DataTable().destroy();
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
//funcion para mostrar los productos eliminados
$("#btnEliminados").on("click",function(){
    $.ajax({
        url: apiProductos + 'readEliminados',
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

//funcion para habilitar los productos que ya fueron eliminados
function enableProduct(id)
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
                url: apiProductos + 'enable',
                type: 'post',
                data:{
                    idProducto: id,                    
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
                            sweetAlert(1, 'Producto habilitado correctamente', null);
                        } else {
                            sweetAlert(3, 'Producto habilitado. ' + result.exception, null);
                        }                                 
                        $('#tabla-productos').DataTable().destroy();     
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
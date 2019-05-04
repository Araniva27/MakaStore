$(document).ready(function()
{
    $('.slider').slider();
    readCategorias();
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiCatalogo = '../../core/api/products.php?site=public&action=';

//Función para obtener y mostrar las categorías de productos
function readCategorias()
{
    $.ajax({
        url: apiCatalogo + 'readCategorias',
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
                let label= '';
                result.dataset.forEach(function(row){
                    content += `
                        <div class="col s12 m6 l4">
                            <div class="card hoverable">  
                                <div class="card-image waves-effect waves-block waves-light">
                                    <img class="activator" src="../../resource/img/categorias/${row.foto}">                              
                                </div>    
                                <div class="card-content">
                                    <span class="card-title activator grey-text text-darken-4">${row.nomCategoria}<i class="material-icons right">more_vert</i></span>
                                    <p class="center"><a href="#" onclick="readProductosCategoria(${row.idCategoria}, '${row.nomCategoria}')" class="tooltipped" data-tooltip="Ver más"><i class="material-icons small">add</i></a></p>
                                </div> 
                                <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-4">${row.nomCategoria}<i class="material-icons right">close</i></span>
                                    <p>${row.descripcion}</p>
                                </div>                              
                            </div>
                        </div>
                    `;
                });
                                
                $('#title').text('Nuestro catálogo');
                $('#catalogo').html(content);
                $('.tooltipped').tooltip();
            } else {
                $('#title').html('<i class="material-icons small">cloud_off</i><span class="red-text">' + result.exception + '</span>');
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

//Función para obtener y mostrar los productos de acuerdo a la categoría seleccionada
function readProductosCategoria(id, categoria)
{
    $('#slider').hide();
    $.ajax({
        url: apiCatalogo + 'readProductos',
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
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                let content = '';
                var busqueda= '';

                busqueda += `
                    <nav>
                        <div class="nav-wrapper blue">
                            <form>
                                <div class="input-field">
                                    <input id="search" type="search" required>
                                    <label class="label-icon" for="search">
                                        <i class="material-icons">search</i>
                                    </label>
                                    <i class="material-icons">close</i>
                                </div>
                                <div class="row center">
                                    
                                </div>
                            </form>
                        </div>
                    </nav>
                    <br><br>
                    `;
                result.dataset.forEach(function(row){                    
                    content += `
                        <div class="col s12 m6 l4">
                            <div class="card hoverable">
                                <div class="card-image">
                                    <img src="../../resource/img/productos/${row.foto}" class="materialboxed">
                                    <a href="#" onclick="getProducto(${row.idProducto})" class="btn-floating halfway-fab waves-effect waves-light red tooltipped" data-tooltip="Ver detalle"><i class="material-icons">add</i></a>
                                </div>
                                <div class="card-content">
                                    <span class="card-title">${row.nombre}</span>
                                    <p>Precio(US$) ${row.precio}</p>
                                </div>
                            </div>
                        </div>
                    `;
                });
                $('#title').text('Categoría: ' + categoria);                
                $('#barraBusqueda').html(busqueda);
                $('#catalogo').html(content);
                $('.materialboxed').materialbox();
                $('.tooltipped').tooltip();
            } else {
                $('#title').html('<i class="material-icons small">cloud_off</i><span class="red-text">' + result.exception + '</span>');
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

//Función para obtener y mostrar los datos del producto seleccionado
function getProducto(id)
{
    $.ajax({
        url: apiCatalogo + 'detailProducto',
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
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                let content = `
                    <div class="card horizontal">
                        <div class="card-image">
                            <img src="../../resource/img/productos/${result.dataset.foto}">
                        </div>
                        <div class="card-stacked">
                            <div class="card-content">
                                <h3 class="header">${result.dataset.nombre}</h3>
                                <p>${result.dataset.descripcion}</p>
                                <p><b>Precio(US$) ${result.dataset.precio}</b></p><br>
                                <p><a href="#" onclick="readComments(${result.dataset.idProducto})" class="waves-effect waves-grey btn blue tooltipped" data-tooltip="Comentarios"><i class="material-icons">list</i></a>
                                <a href="#" onclick=" readValuations(${result.dataset.idProducto})" class="waves-effect waves-grey btn blue tooltipped" data-tooltip="Puntuaciones"><i class="material-icons">star</i></a>
                                <a href="#" onclick="modalCommentary(${result.dataset.idProducto})" class="waves-effect waves-grey btn blue tooltipped" data-tooltip="Agregar comentario"><i class="material-icons">add</i></a>
                                <a href="#" onclick="modalPunctuation(${result.dataset.idProducto})" class="waves-effect waves-grey btn blue tooltipped" data-tooltip="Agregar puntuacion"><i class="material-icons">add_star</i></a>
                                </p>
                            </div>
                            <div class="card-action">
                                <form method="post" id="form-cantidad">
                                    <div class="row center">
                                        <div class="input-field col s12 m6">
                                            <i class="material-icons prefix">list</i>
                                            <input id="cantidad" type="number" name="cantidad" min="1" class="validate">
                                            <label for="cantidad">Cantidad</label>
                                        </div>
                                        <div class="input-field col s12 m6">
                                            <button type="submit" class="btn waves-effect waves-light blue tooltipped" data-tooltip="Agregar al carrito"><i class="material-icons">add_shopping_cart</i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                `;
                $('#title').text('Detalles del producto');
                $('#barraBusqueda').html(null);
                $('#catalogo').html(content);
                $('.tooltipped').tooltip();
            } else {
                $('#title').html('<i class="material-icons small">cloud_off</i><span class="red-text">' + result.exception + '</span>');
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
function readComments(idProducto){
    alert(idProducto);
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
                    <strong class="blue-text">Comentario:</strong> ${row.comentario}</p>
                    <p class="black-text">                                  
            </div>
        </div>
        `;
    });
    $('#modal-content').html(content);
    $('select').formSelect();
    $('.tooltipped').tooltip();   
    $('.materialboxed').materialbox();
}

//funcion para leer los comentarios
function readComments(id)
{
    $.ajax({
        url: apiCatalogo + 'getComentarios',
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

//funcion para llenar las cartas con las valoraciones de los productos

function fillCardsValuations(rows)
{
    let content = '';
    //Se recorren las filas para armar el cuerpo de la tabla y se utiliza comilla invertida para escapar los caracteres especiales
    rows.forEach(function(row){       
        content += `
        <div class="col s12 m6 l4">
            <div class="card white">              
                <div class="card-content white-text hoverable">
                    <p class="black-text">
                        <strong class="blue-text">Producto:</strong> ${row.producto}</p>
                    <p class="black-text">
                        <strong class="blue-text">Cliente:</strong> ${row.cliente}</p>                   
                    <p class="black-text">                   
                        <strong class="blue-text">Puntuacion:</strong> ${row.valoracion}</p>
                        <p class="black-text">                                  
                </div>
            </div>
        </div>    
        `;
    });
    $('#modal-content').html(content);
    $('select').formSelect();
    $('.tooltipped').tooltip();   
    $('.materialboxed').materialbox();
}

//funcion para leer los comentarios
function readValuations(id)
{
    $.ajax({
        url: apiCatalogo + 'getValoraciones',
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
                fillCardsValuations(result.dataset);         
                $('#modalP').modal('open');                        
            } else {
                sweetAlert(2, 'Este producto no tiene valoraciones', null);
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


//funcion para abrir modal de agregar comentario 
function modalCommentary(id)
{
    $.ajax({
        url: apiCatalogo + 'get',
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
                $('#form-comentario')[0].reset();
                $('#idProducto').val(result.dataset.idProducto);                           
                M.updateTextFields();
                $('#modalComentario').modal('open');
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

//Función para realizar un nuevo comentario
$('#form-comentario').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiCatalogo + 'comment',
        type: 'post',
        data: new FormData($('#form-comentario')[0]),
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
                $('#form-comentario')[0].reset();
                $('#modalComentario').modal('close');
                if (result.status == 1) {
                    sweetAlert(1, 'Comentario registrado con exito', null);
                } else {
                    sweetAlert(3, 'Comentario registrado. ' + result.exception, null);
                }             
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


//funcion para abrir modal de agregar comentario 
function modalPunctuation(id)
{
    $.ajax({
        url: apiCatalogo + 'get',
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
                $('#form-valoracion')[0].reset();
                $('#idProducto2').val(result.dataset.idProducto);                           
                M.updateTextFields();
                $('#modalPuntuacion').modal('open');
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

//Función para realizar puntuacion
$('#form-valoracion').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiCatalogo + 'punctuation',
        type: 'post',
        data: new FormData($('#form-valoracion')[0]),
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
                $('#form-valoracion')[0].reset();
                $('#modalPuntuacion').modal('close');
                if (result.status == 1) {
                    sweetAlert(1, 'Valoración registrada con exito', null);
                } else {
                    sweetAlert(3, 'Valoración registrada. ' + result.exception, null);
                }             
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

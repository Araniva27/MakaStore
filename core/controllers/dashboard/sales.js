$(document).ready(function()
{
    //inicializacion de la funcion para mostrar datos en la tabla
    showTable(); 
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiVentas = '../../core/api/sales.php?site=dashboard&action=';

//Función para llenar tabla con los datos de los registros
function fillTable(rows)
{    
    let content= '';
    rows.forEach(function(row){   
        if(row.estado == 'Realizada'){
            content +=`
            <tr>
                <td>${row.idVenta}</td>
                <td>${row.nombre}</td>
                <td>${row.fecha_hora}</td>
                <td>${row.estado}</td>                                            
                <td><a href="#" onclick="modalDetalles(${row.idVenta})" class="waves-effect waves-light btn grey tooltipped" data-tooltip="Detalle"><i class="material-icons">list</i></a></td>                
            </tr>
        `;
        }   else{
            content +=`
            <tr>
                <td>${row.idVenta}</td>
                <td>${row.nombre}</td>
                <td>${row.fecha_hora}</td>
                <td>${row.estado}</td>                                            
                <td>
                    <a href="#" onclick="modalDetalles(${row.idVenta})" class="waves-effect waves-light btn grey tooltipped" data-tooltip="Detalle"><i class="material-icons">list</i></a>
                    <a href="#" onclick="updateStateSale(${row.idVenta})" class="waves-effect waves-light btn green tooltipped" data-tooltip="Entregar"><i class="material-icons">airport_shuttle</i></a>
                </td>                
            </tr>
        `;
        }  
        
    });

    $('#tbody-read').html(content);
    var table = $('#tabla-ventas').DataTable({
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

function showTable(){
    $.ajax({
        url: apiVentas + 'read',
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
                fillTable(result.dataset);
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
//Funcion para mostrar la tabla con los detalles de la compra
function fillTable2(rows)
{   
    let content= '';
    let label = '';
    let totalVenta = 0;
    rows.forEach(function(row){ 
        var subtotal=parseFloat(row.Total).toFixed(2);
        console.log(subtotal);       
        content +=`
            <tr>
                <td>${row.idDetalle}</td>
                <td>${row.nombre}</td>
                <td>${row.cantidad}</td>
                <td>${row.precio}</td>
                <td>${subtotal}</td>                                                               
            </tr>
        `;
        totalVenta= parseFloat(subtotal)+ parseFloat(totalVenta);
        
    });
    label = `<h5 id="labelTotal">Total: $${parseFloat(totalVenta).toFixed(2)}</h5>`;     
    $('#detalle').html(content);
    $('#total').html(label);    
    console.log(totalVenta);

}

/*function showTable2(){
    $.ajax({
        url: apiVentas + 'read2',
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
                fillTable2(result.dataset);
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
}*/


function modalDetalles(id)
{
    $.ajax({
        url: apiVentas + 'detalle',
        type: 'post',
        data:{
            idVenta: id
        },
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio para mostrar los valores en el formulario, sino se muestra la excepción
            if (result.status) {
                $('#idVenta').val(result.dataset.idVenta);
                fillTable2(result.dataset);
                $('#modalDetalle').modal('open');
                $(document).ready(function()
                {  
                    showTable(); 
                })
                

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

//Función para mostrar los resultados de una búsqueda
$('#buscarVenta').submit(function()
{
    event.preventDefault();
    $.ajax({
        url: apiVentas+ 'search',
        type: 'post',
        data: $('#buscarVenta').serialize(),
        datatype: 'json'
    })
    .done(function(response){
        //Se verifica si la respuesta de la API es una cadena JSON, sino se muestra el resultado en consola
        if (isJSONString(response)) {
            const result = JSON.parse(response);
            //Se comprueba si el resultado es satisfactorio, sino se muestra la excepción
            if (result.status) {
                sweetAlert(4, 'Coincidencias: ' + result.dataset.length, null);
                fillTable(result.dataset);
            } else {
                sweetAlert(3, result.exception, null);
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

function updateStateSale(id)
{
    swal({
        title: 'Advertencia',
        text: '¿Quiere actualizar el estado de la venta',
        icon: 'warning',
        buttons: ['Cancelar', 'Aceptar'],
        closeOnClickOutside: false,
        closeOnEsc: false
    })
    .then(function(value){
        if (value) {
            $.ajax({
                url: apiVentas + 'updateState',
                type: 'post',
                data:{
                    idVenta: id                    
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
                            sweetAlert(1, 'Estado de venta actualizado correctamente', null);
                            console.log(id);
                        } else {
                            sweetAlert(3, 'Categoría eliminada. ' + result.exception, null);
                        }                                                  
                        $('#tabla-ventas').DataTable().destroy();
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

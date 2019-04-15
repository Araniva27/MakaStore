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
        content +=`
            <tr>
                <td>${row.idVenta}</td>
                <td>${row.nombre}</td>
                <td>${row.fecha_hora}</td>
                <td>${row.estado}</td>                            
                <td><a href="#" onclick="confirmDelete(${row.idCliente})" class="waves-effect waves-grey btn red tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a></td>
                <td><a href="#" onclick="modalDetalles(${row.idVenta})" class="waves-effect waves-light btn grey tooltipped" data-tooltip="Detalle"><i class="material-icons">list</i></a></td>                
            </tr>
        `;
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

function fillTable2(rows)
{
    let content= '';
    rows.forEach(function(row){        
        content +=`
            <tr>
                <td>${row.idDetalle}</td>
                <td>${row.nombre}</td>
                <td>${row.cantidad}</td>
                <td>${row.precio}</td>
                <td>${row.Total}</td>                                                               
            </tr>
        `;
    });
    $('#detalle').html(content);    

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

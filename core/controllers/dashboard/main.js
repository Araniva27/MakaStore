$(document).ready(function(){
    showChartSale(); 
    chartStockProvider();   
})

//Constante para establecer la ruta y parámetros de comunicación con la API
const apiVentas = '../../core/api/sales.php?site=dashboard&action=';
const apiProductos = '../../core/api/products.php?site=dashboard&action=';

//Función para obtener y mostrar los registros del grafico
function showChartSale(){
    $.ajax({
        url: apiVentas + 'readSalesChart',
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
               // fillChart(result.dataset);
               let fechas = [];
               let datos = [];
                result.dataset.forEach(function(row){
                    fechas.push(row.fecha);
                    datos.push(row.total);
                });

                graficoBarras('graficoVentas', fechas, datos, 'Monto vendido($)', 'Gráfico de ventas por fecha');                
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

function chartStockProvider(){
    console.log('hola');
    $.ajax({
        url: apiProductos + 'readProductsCategory',
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
               // fillChart(result.dataset);
               let compañia = [];
               let datos = [];
                result.dataset.forEach(function(row){
                    compañia.push(row.proveedor);
                    datos.push(row.contador);
                });

                graficoBarras('graficoCategorias', compañia, datos, 'Cantidad de productos por proveedor', 'Gráfico de ventas por fecha');                
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


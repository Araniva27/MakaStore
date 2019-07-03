//Función para comprobar si una cadena tiene formato JSON
function isJSONString(string)
{
    try {
        if (string != "[]") {
            JSON.parse(string);
            return true;
        } else {
            return false;
        }
    } catch(error) {
        return false;
    }
}

//Función para manejar los mensajes de notificación al usuario
function sweetAlert(type, text, url)
{
    switch (type) {
        case 1:
            title = "Éxito";
            icon = "success";
            break;
        case 2:
            title = "Error";
            icon = "error";
            break;
        case 3:
            title = "Advertencia";
            icon = "warning";
            break;
        case 4:
            title = "Aviso";
            icon = "info";
    }
    if (url) {
        swal({
            title: title,
            text: text,
            icon: icon,
            button: 'Aceptar',
            closeOnClickOutside: false,
            closeOnEsc: false
        })
        .then(function(value){
            console.log(value);
            location.href = url
        });
    } else {
        swal({
            title: title,
            text: text,
            icon: icon,
            button: 'Aceptar',
            closeOnClickOutside: false,
            closeOnEsc: false
        });
    }
}

function graficoBarras(canvas, x, y,legend, title){
    let colors = [];
    for (i = 0; i < x.length; i++) {
        colors.push('#' + (Math.random().toString(16)).substring(2, 8));
    }
    
    var context = $('#'+canvas);    
    var grafico = new Chart(context,{        
        type: 'bar',        
        data: {
            labels: x,
            datasets: [
                {
                label: legend,
                backgroundColor: colors,
                data: y
                },
            ]
        },
        options: {
          legend: { display: false },
          title: {
            display: true,
            text: title
          }
        }
    });        
}

function graficoPastel(x,y,legend, title){
    let colors = [];
    for (i = 0; i < x.length; i++) {
        colors.push('#' + (Math.random().toString(16)).substring(2, 8));
    }

    var context = $('#'+canvas);    
    var grafico = new Chart(context,{        
        type: 'doughnut',        
        data: {
            labels: x,
            datasets: [
                {
                label: legend,
                backgroundColor: colors,
                data: y
                },
            ]
        },
        options: {
          legend: { display: false },
          title: {
            display: true,
            text: title
          }
        }
    });       
    
}

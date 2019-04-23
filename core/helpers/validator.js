
$(function(){
    $.validator.addMethod('alfabetico', function (value, element){
        return this.optional(element) || /^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]+$/i.test(value);
    });
    
    $("#btnRegistrarA").on("click",function(){
        $("#registro-admin").validate
        ({
            rules:
            {
                nombre_admin:{required: true, alfabetico: true, minlength: 1, maxlength:50}
            },
            messages:
            {
                nombre_admin:{required: '<br><br><p style="color: red" style="position: fixed">Campo obligatorio</p>', alfabetico: '<br><br><p style="color: red">Solo letras</p>', maxlength:'<br><br><p style="color: red" style="position: fixed">Longitud maxima 50 caracteres</p>', minlength: '<br><br><p style="color: red" style="position: fixed">La lognitud minima es de un caracteres</p>', maxlength:'<br><br><p style="color: red" style="position: fixed">Longitud maxima 50 caracteres</p>'}
            }
        });            
    });
});



function soloLetras(e){
    key=e.keyCode || e.which;
    teclado=String.fromCharCode(key).toLowerCase();
    letras="abcdefghijklmnopqrstuvwxyz";
    especiales= "8-37-38-46-164";
    teclado_especial=false;

    for(var i in especiales){
        if(key==especiales[i]){
            teclado_especial=true;break;
        }
    }

    if(letras.indexOf(teclado)==-1 && !teclado_especial){
        return false;
    }
}

function validarTelefono(e){
    key=e.keyCode || e.which;
    teclado=String.fromCharCode(key).toLowerCase();
    numeros="0123456789-";
    especiales= "8-37-38-46-164";
    teclado_especial=false;

    for(var i in especiales){
        if(key==especiales[i]){
            teclado_especial=true;break;
        }
    }

    if(letras.indexOf(teclado)==-1 && !teclado_especial){
        return false;
    }
}


//Campos del formulario de modificacion de datos
const usuario = document.getElementById('usuario');
const contraseña = document.getElementById('contrasena');

//Obtencion del formulario de registro de productos
const formulario = document.getElementById('form-loginA');

//Colores de validacion
const verdeM = '#4CAF50';
const rojoM = '#F44336';

//Funcion para validar si el campo es vacio
function checkIfEmpty(field)
{
    if(isEmpty(field.value.trim())){
        setInvalid(field, `Este campo no puede ser vacio`);
        return true;
    }else{
        setValid(field);
        return false;
    }
}

function isEmpty(value)
{   
    if(value == '') return true;
    return false;
}

function setInvalid(field, message)
{
    field.className='invalid';
    field.nextElementSibling.innerHTML = message;
    field.nextElementSibling.style.color = rojoM;
}

function setValid(field)
{
    field.className='valid';
    field.nextElementSibling.innerHTML = '';
    //field.nextElementSibling.style.color = verde;
}
//Funcion para validar usuario
function validateUsuario()
{
     //verificar si el campo esta vacio
     if(checkIfEmpty(usuario)) return;
     if(!validateAlphanumeric(usuario)) return;
     return true;
}

//Funcion para validar contraseña
function validateContraseña()
{
     //verificar si el campo esta vacio
     if(checkIfEmpty(contraseña)) return;
     if(!validateAlphanumeric(contraseña)) return;
     return true;
}


//Funcion para validar letras y numeros
function validateAlphanumeric(field){
    if(/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ\s\.,]+$/.test(field.value)){
        setValid(field);
        return true;
    }else{
        setInvalid(field, `Este campo solo debe contener letras y numeros`);
        return false;
    }
}
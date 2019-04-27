//Campos del formulario de registro de Administradores
const nombre = document.getElementById('nombre_admin');
const apellido = document.getElementById('apellido_admin');
const usuario = document.getElementById('usuario_admin');
const contraseña = document.getElementById('contra_admin');
const telefono = document.getElementById('telefono_admin');
const correo = document.getElementById('correo_admin');
const direccion = document.getElementById('direccion_admin');

//Obtencion del formulario
const formulario = document.getElementById('registro-admin');
 
//Colores de validacion
const verde = '#4CAF50';
const rojo = '#F44336';

//Funcion para validar nombre
function validateNombre()
{
    //verificar si el campo esta vacio
    if(checkIfEmpty(nombre)) return;
    if(!checkIfOnlyLetters(nombre)) return;
    return true;
}
//Funcion para validar apellido
function validateApellido()
{
    //verificar si el campo esta vacio
    if(checkIfEmpty(apellido)) return;
    if(!checkIfOnlyLetters(apellido)) return;
    return true;
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

//Funcion para validar telefono
function validateTelefono()
{
    //verificar si el campo esta vacio
    if(checkIfEmpty(telefono)) return;
    if(!validatePhone(telefono)) return;
    return true;
    
}

//Funcion para validar correo
function validateCorreo()
{
    //verificar si el campo esta vacio
    if(checkIfEmpty(correo)) return;
    if(!validateEmail(correo)) return;
    return true;
    
}

//Funcion para validar usuario
function validateDireccion()
{
    //verificar si el campo esta vacio
    if(checkIfEmpty(direccion)) return;
    if(!validateAlphanumeric(direccion)) return;
    return true;
    
}
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
    field.nextElementSibling.style.color = rojo;
}

function setValid(field)
{
    field.className='valid';
    field.nextElementSibling.innerHTML = '';
    //field.nextElementSibling.style.color = verde;
}
//Funcion para validar solo letras
function checkIfOnlyLetters(field)
{
    if(/^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]+$/.test(field.value)){
         setValid(field);
         return true;
    }else{
        setInvalid(field, `Este campo solo debe contener letras`);
        return false;
    }
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

//Funcion para validar telefono
function validatePhone(field){
    if(/^([0-9]{4})(-)([0-9]{4})+$/.test(field.value)){
        setValid(field);
        return true;
    }else{
        setInvalid(field, `Telefono no cumple el formato ####--####`);
        return false;
    }
}

//Funcion para validar correo
function validateEmail(field){
    if(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)+$/.test(field.value)){
        setValid(field);
        return true;
    }else{
        setInvalid(field, `Correo incorrecto`);
        return false;
    }
}

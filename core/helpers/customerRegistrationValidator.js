//Campos del formulario de modificacion de datos
const nombre = document.getElementById('nombre');
const apelllido = document.getElementById('apellido');
const usuario = document.getElementById('usuario');
const contraseña = document.getElementById('contra');
const telefono = document.getElementById('telefono');
const correo = document.getElementById('correo');
const direccion = document.getElementById('direccion');

//Obtencion del formulario de registro de productos
const formularioClientes = document.getElementById('form-createC');

//Obtencion del formulario de registro de productos
const formularioLoginClientes = document.getElementById('loginCliente');

const usuario2 = document.getElementById('usuarioCliente');
const contraseña2 = document.getElementById('ContraseñaCliente');

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
//funcion para validar nombre
function validateNombre(){
     //verificar si el campo esta vacio
     if(checkIfEmpty(nombre)) return;
     if(!checkIfOnlyLetters(nombre)) return;
     return true;
}
//funcion para validar apellido
function validateApellido(){
     //verificar si el campo esta vacio
     if(checkIfEmpty(apellido)) return;
     if(!checkIfOnlyLetters(apelllido)) return;
     return true;
}
//funcion para validar usuario
function validateUsuario(){
     //verificar si el campo esta vacio
     if(checkIfEmpty(usuario)) return;
     if(!checkIfOnlyLetters(usuario)) return;
     return true;
}
//funcion para validar contraseña
function validateContraseña(){
     //verificar si el campo esta vacio
     if(checkIfEmpty(contraseña)) return;
     if(!validateAlphanumeric(contraseña)) return;
     return true;
}
//funcion para validar telefono
function validateTelefono(){
     //verificar si el campo esta vacio
     if(checkIfEmpty(telefono)) return;
     if(!validatePhone(telefono)) return;
     return true;
}
//funcion para validar correo
function validateCorreo(){
     //verificar si el campo esta vacio
     if(checkIfEmpty(correo)) return;
     if(!validateCorreo(correo)) return;
     return true;
}
//funcion para validar direccion
function validateDireccion(){
     //verificar si el campo esta vacio
     if(checkIfEmpty(direccion)) return;
     if(!validateAlphanumeric(direccion)) return;
     return true;
}

//funcion para validar usuario
function validateUsuario2(){
    //verificar si el campo esta vacio
    if(checkIfEmpty(usuario2)) return;
    if(!validateAlphanumeric(usuario2)) return;
    return true;
}

//funcion para validar contraseña
function validateContraseña2(){
    //verificar si el campo esta vacio
    if(checkIfEmpty(contraseña2)) return;
    if(!validateAlphanumeric(contraseña2)) return;
    return true;
}
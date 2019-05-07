//Campos del formulario de registro de companies
const nombre = document.getElementById('create_nombre');
const direccion = document.getElementById('create_direccion');
const telefono = document.getElementById('create_telefono');
const correo = document.getElementById('create_correo');

//Obtencion del formulario de registro de productos
const formularioCompanies = document.getElementById('form-create');

//Obtencion del formulario de modificacion de productos
const formularioCompaniesUpdate = document.getElementById('form-update');

//Campos del formulario de actualizacion de companies
const nombreActualizado = document.getElementById('update_nombre');
const direccionActualizado = document.getElementById('update_direccion');
const telefonoActualizado = document.getElementById('update_telefono');
const correoActualizado = document.getElementById('update_correo');

//Colores de validacion
const verde = '#4CAF50';
const rojo = '#F44336';

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
function checkIfOnlyLetters(field, minLength, maxLength)
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


function validateNombre()
{
     //verificar si el campo esta vacio
     if(checkIfEmpty(nombre)) return;
     if(!validateAlphanumeric(nombre)) return;
     if(!meetLength(nombre, 1, 50)) return
     return true;
}


function validateNombreA()
{
     //verificar si el campo esta vacio
     if(checkIfEmpty(nombreActualizado)) return;
     if(!validateAlphanumeric(nombreActualizado)) return;
     if(!meetLength(nombreActualizado, 1, 50)) return
     return true;
}


function validateDireccion()
{
     //verificar si el campo esta vacio
     if(checkIfEmpty(direccion)) return;
     if(!validateAlphanumeric(direccion)) return;
     if(!meetLength(direccion, 1, 100)) return
     return true;
}

function validateDireccionA()
{
     //verificar si el campo esta vacio
     if(checkIfEmpty(direccionActualizado)) return;
     if(!validateAlphanumeric(direccionActualizado)) return;
     if(!meetLength(direccion, 1, 100)) return
     return true;
}


function validateTelefono()
{
     //verificar si el campo esta vacio
     if(checkIfEmpty(telefono)) return;
     if(!validatePhone(telefono)) return;
     return true;
}

function validateTelefonoA()
{
     //verificar si el campo esta vacio
     if(checkIfEmpty(telefonoActualizado)) return;
     if(!validatePhone(telefonoActualizado)) return;
     return true;
}

function validateCorreo()
{
     //verificar si el campo esta vacio
     if(checkIfEmpty(correo)) return;
     if(!validateEmail(correo)) return;
     return true;
}

function validateCorreoA()
{
     //verificar si el campo esta vacio
     if(checkIfEmpty(correoActualizado)) return;
     if(!validateEmail(correoActualizado)) return;
     return true;
}

function meetLength(field, minLength, maxLength){
    if(field.value.length>=minLength && field.value.length< maxLength){
        setValid(field);
        return true;
    }else if(field.value.length<minLength){
        setInvalid(field,  `Debe de tener al menos ${minLength} caracteres `);
    }else{
        setInvalid(field,  `Debe de tener menos de ${maxLength} caracteres `);
        return false;
    }
    
}
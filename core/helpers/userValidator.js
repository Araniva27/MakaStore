//Campos del formulario de modificacion de datos
const nombreU = document.getElementById('profile_nombre');
const apellidoU = document.getElementById('profile_apellido');
const correoU = document.getElementById('profile_correo');
const usuarioU = document.getElementById('profile_usuario');
const telefonoU = document.getElementById('profile_telefono');
const direccionU = document.getElementById('profile_direccion');

//Campos del formulario de modificacion de contraseña
const contraActual1 = document.getElementById('clave_actual_1');
const contraActual2 = document.getElementById('clave_actual_2');
const contraNueva1 = document.getElementById('clave_nueva_1');
const contraNueva2 = document.getElementById('clave_nueva_2');

//Obtencion del formulario de registro de productos
const formularioModificacion = document.getElementById('form-profile');
//Obtencion del formulario de modificacion de contraseña
const formularioModificacionContra = document.getElementById('form-password');


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

function validateMoney(field){
    if(/^[0-9]+(?:\.[0-9]{1,2})?$/){
        setValid(field);
        return true;
    }else{
        setInvalid(field, `Precio incorrecto`);
        return false;
    }
}

function validateNombreUsuario()
{
     //verificar si el campo esta vacio
     if(checkIfEmpty(nombreU)) return;
     if(!checkIfOnlyLetters(nombreU)) return;
     return true;
}


function validateApellidoUsuario()
{
     //verificar si el campo esta vacio
     if(checkIfEmpty(apellidoU)) return;
     if(!checkIfOnlyLetters(apellidoU)) return;
     return true;
}

//Funcion para validar correo
function validateCorreoUsuario()
{
    //verificar si el campo esta vacio    
    if(!validateEmail(correoU)) return;
    return true;
    
}

//Funcion para validar usuario
function validateUsuario2()
{
    //verificar si el campo esta vacio
    if(checkIfEmpty(usuarioU)) return;
    if(!validateAlphanumeric(usuarioU)) return;
    return true;
    
}

//Funcion para validar telefono
function validateTelefonoUsuario()
{
    //verificar si el campo esta vacio
    if(checkIfEmpty(telefonoU)) return;
    if(!validatePhone(telefonoU)) return;
    return true;
    
}

//Funcion para validar usuario
function validateDireccionUsuario()
{
    //verificar si el campo esta vacio
    if(checkIfEmpty(direccionU)) return;
    if(!validateAlphanumeric(direccionU)) return;
    return true;
    
}
//Funcion para validar contraseña
function validateContraseñaActual1()
{
    //verificar si el campo esta vacio
    if(checkIfEmpty(contraActual1)) return;
    if(!validateAlphanumeric(contraActual1)) return;
    return true;
    
}

//Funcion para validar contraseña
function validateContraseñaActual2()
{
    //verificar si el campo esta vacio
    if(checkIfEmpty(contraActual2)) return;
    if(!validateAlphanumeric(contraActual2)) return;
    return true;
    
}

//Funcion para validar contraseña
function validateContraseñaNueva1()
{
    //verificar si el campo esta vacio
    if(checkIfEmpty(contraNueva1)) return;
    if(!validateAlphanumeric(contraNueva1)) return;
    return true;
    
}

//Funcion para validar contraseña
function validateContraseñaNueva2()
{
    //verificar si el campo esta vacio
    if(checkIfEmpty(contraNueva2)) return;
    if(!validateAlphanumeric(contraNueva2)) return;
    return true;
    
}
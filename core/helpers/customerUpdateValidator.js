//Campos del formulario de modificacion de datos
const nombreC = document.getElementById('profile_nombre');
const apellidoC = document.getElementById('profile_apellido');
const usuarioC = document.getElementById('profile_usuario');
const telefonoC = document.getElementById('profile_telefono');
const correoC = document.getElementById('profile_correo');
const direccionC = document.getElementById('profile_direccion');

//Obtencion del formulario de registro de productos
const formularioActualizarClientes = document.getElementById('form-profile');

//Colores de validacion
const verdeM = '#4CAF50';
const rojoM = '#F44336';

//Funcion para validar si el campo es vacio
function checkIfEmpty2(field)
{
    if(isEmpty2(field.value.trim())){
        setInvalid2(field, `Este campo no puede ser vacio`);
        return true;
    }else{
        setValid2(field);
        return false;
    }
}

function isEmpty2(value)
{   
    if(value == '') return true;
    return false;
}

function setInvalid2(field, message)
{
    field.className='invalid';
    field.nextElementSibling.innerHTML = message;
    field.nextElementSibling.style.color = rojoM;
}

function setValid2(field)
{
    field.className='valid';
    field.nextElementSibling.innerHTML = '';
    //field.nextElementSibling.style.color = verde;
}

//Funcion para validar telefono
function validatePhone2(field){
    if(/^([0-9]{4})(-)([0-9]{4})+$/.test(field.value)){
        setValid2(field);
        return true;
    }else{
        setInvalid2(field, `Telefono no cumple el formato ####--####`);
        return false;
    }
}

//Funcion para validar correo
function validateEmail2(field){
    if(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)+$/.test(field.value)){
        setValid2(field);
        return true;
    }else{
        setInvalid2(field, `Correo incorrecto`);
        return false;
    }
}
//Funcion para validar solo letras
function checkIfOnlyLetters2(field)
{
    if(/^[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]+$/.test(field.value)){
         setValid2(field);
         return true;
    }else{
        setInvalid2(field, `Este campo solo debe contener letras`);
        return false;
    }
}
//Funcion para validar letras y numeros
function validateAlphanumeric2(field){
    if(/^[a-zA-Z0-9ñÑáÁéÉíÍóÓúÚ\s\.,]+$/.test(field.value)){
        setValid2(field);
        return true;
    }else{
        setInvalid2(field, `Este campo solo debe contener letras y numeros`);
        return false;
    }
}
//funcion para validar nombre
function validateNombre2(){
     //verificar si el campo esta vacio
     if(checkIfEmpty2(nombreC)) return;
     if(!checkIfOnlyLetters2(nombreC)) return;
     return true;
}
//funcion para validar apellido
function validateApellido2(){
     //verificar si el campo esta vacio
     if(checkIfEmpty2(apellidoC)) return;
     if(!checkIfOnlyLetters2(apelllidoC)) return;
     return true;
}
//funcion para validar usuario
function validateUsuario2(){
     //verificar si el campo esta vacio
     if(checkIfEmpty2(usuarioC)) return;
     if(!checkIfOnlyLetters2(usuarioC)) return;
     return true;
}

//funcion para validar telefono
function validateTelefono2(){
     //verificar si el campo esta vacio
     if(checkIfEmpty2(telefonoC)) return;
     if(!validatePhone2(telefonoC)) return;
     return true;
}
//funcion para validar correo
function validateCorreo2(){
     //verificar si el campo esta vacio
     if(checkIfEmpty2(correoC)) return;
     if(!validateCorreo2(correoC)) return;
     return true;
}
//funcion para validar direccion
function validateDireccion2(){
     //verificar si el campo esta vacio
     if(checkIfEmpty2(direccionC)) return;
     if(!validateAlphanumeric2(direccionC)) return;
     return true;
}



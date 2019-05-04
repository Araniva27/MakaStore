//Campos del formulario de registro de productos
const nombre = document.getElementById('create_nombreP');
const precio = document.getElementById('create_precioP');
const descripcion = document.getElementById('descripcion');
const imagen = document.getElementById('create_archivo');


//Campos del formulario de actualizacion de datos
const nombreA = document.getElementById('update_producto');
const precioA = document.getElementById('update_precio');
const descripcionA = document.getElementById('update_descripcion');
const imagenA = document.getElementById('update_archivo');

//Obtencion del formulario de registro de productos
const formulario = document.getElementById('form-create');

 
//Colores de validacion
const verde = '#4CAF50';
const rojo = '#F44336';


//Funcion para validar nombre del producto
function validateNombre()
{
     //verificar si el campo esta vacio
     if(checkIfEmpty(nombre)) return;
     if(!validateAlphanumeric(nombre)) return;
     if(!meetLength(nombre, 1, 100))return;
     return true;
}

//Funcion para validar precio del producto
function validatePrecio()
{
     //verificar si el campo esta vacio
     if(checkIfEmpty(precio)) return;
     if(!validateMoney(precio)) return;
     return true;
}

//Funcion para validar imagen del producto
function validateImagen()
{
     //verificar si el campo esta vacio
     if(checkIfEmpty(imagen)) return;    
     return true;
}

//Funcion para validar descripcion del producto
function validateDescripcion()
{
     //verificar si el campo esta vacio
     if(checkIfEmpty(descripcion)) return;
     if(!validateAlphanumeric(descripcion)) return;
     if(!meetLength(descripcion, 1, 500)) return
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

function validateMoney(field){
    if(/^[0-9]+(?:\.[0-9]{1,2})?$/){
        setValid(field);
        return true;
    }else{
        setInvalid(field, `Precio incorrecto`);
        return false;
    }
}

//Obtencion del formulario de modificacion de productos
const formularioActulizar = document.getElementById('form-update');

function validateNombreActualizado()
{
     //verificar si el campo esta vacio
     if(checkIfEmpty(nombreA)) return;
     if(!validateAlphanumeric(nombreA)) return;
     if(!meetLength(nombreA, 1, 100)) return
     return true;
}

//Funcion para validar descripcion del producto
function validateDescripcionActualizada()
{
     //verificar si el campo esta vacio
     if(checkIfEmpty(descripcionA)) return;
     if(!validateAlphanumeric(descripcionA)) return;
     if(!meetLength(descripcionA, 1, 500)) return
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
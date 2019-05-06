//Campos del formulario de registro de categorías
const nombre = document.getElementById('create_nombreC');
const descripcion = document.getElementById('descripcion');
const imagen = document.getElementById('create_archivo');


//Campos del formulario de actualizacion de datos
const nombreA = document.getElementById('update_categoria');
const descripcionA = document.getElementById('update_descripcion');
const imagenA = document.getElementById('update_archivo');

//Obtencion del formulario de registro de categorías
const formulario = document.getElementById('form-create');

 
//Colores de validacion
const verde = '#4CAF50';
const rojo = '#F44336';


//Funcion para validar nombre de la categoría
function validateNombre()
{
     //verificar si el campo esta vacio
     if(checkIfEmpty(nombre)) return;
     if(!checkIfOnlyLetters(nombre)) return;
     return true;
}

//Funcion para validar imagen de la categoría
function validateImagen()
{
     //verificar si el campo esta vacio
     if(checkIfEmpty(imagen)) return;    
     return true;
}

//Funcion para validar descripcion de la categoría
function validateDescripcion()
{
     //verificar si el campo esta vacio
     if(checkIfEmpty(descripcion)) return;
     if(!validateAlphanumeric(descripcion)) return;
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

//Obtencion del formulario de modificacion de categorias
const formularioActualizar = document.getElementById('form-update');

function validateNombreActualizado()
{
     //verificar si el campo esta vacio
     if(checkIfEmpty(nombreA)) return;
     if(!checkIfOnlyLetters(nombreA)) return;
     return true;
}

//Funcion para validar descripcion de la categoria 
function validateDescripcionActualizada()
{
     //verificar si el campo esta vacio
     if(checkIfEmpty(descripcionA)) return;
     if(!validateAlphanumeric(descripcionA)) return;
     return true;
}
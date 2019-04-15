/**Documento javascript donde se inicializan diferentes elementos del sitio web */
$( document ).ready(function(){
    $(".dropdown-trigger").dropdown();//Inicializacion del dropdown del menu del sitio publico
    $('.slider').slider();//Inicializacion del slider de la index del sitio publico
    $('.sidenav').sidenav();//Inicializacion del menu lateral 
    $('.parallax').parallax();//Inicializacion del parallax
    $('.modal').modal();//Inicializacion de modales
    $('.sidenav').sidenav(); 
    $('select').formSelect();//Inicializacion de las listas desplegables
    $('.datepicker').datepicker({//Inicilazion del date picker
      firstDay:1,
      format:'yyyy-mm-dd',
      i18n: {
          months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
          monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nom", "Dic"],
          weekdays: ["Lunes","Martes", "Miercoles", "Jueves", "Viernes", "Sabado", "Domingo"],
          weekdaysShort: ["Lun","Mart", "Mier", "Juev", "Vier", "Sab", "Dom"],
          weekdaysAbbrev: ["L","M", "Mi", "J", "V", "S", "D"],
          cancel:'Cacelar',
          clear:'Limpiar',
          done:'Aceptar'
      }
    });
    $('.tooltipped').tooltip();//Inicializacion del tooltips
    $('.tabs').tabs();//inicializacion del tabs
});


/*$(document).ready(function(){
    $('.slider').slider();
  });

  $(document).ready(function(){
    $('.materialboxed').materialbox();
  });

  $(document).ready(function(){
    $('.sidenav').sidenav();
  });
  
  $(document).ready(function(){
    $('.parallax').parallax();
  });
  
  $(document).ready(function(){
    $('.modal').modal();
  });
  $(document).ready(function(){
    $('.sidenav').sidenav();
  });*/

  /*<div class="row">
            <div class="col s12 m4 offset-m4 ">
            <div class="card"> 
                <div class="card-action teal lighten-2 white-text">
                    <h3>Login</h3>
                </div>
                
                <div class="card-content">
                   
                    <div class="form-field">
                        <label for="username"></label>
                        <input type="text" id="username">
                    </div><br>
                   
                    <div class="form-field">
                        <label for="password"></label>
                        <input type="password" id="password">
                    </div><br>
                   
                    <div class="form-field">
                        <a class="waves-effect waves-light btn">button</a>
                    </div><br>
                    

                </div>
            </div>    
            </div>
        </div>*/


 
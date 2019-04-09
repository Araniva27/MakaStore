<?php
//Inclusion del archivo public_pages.php
  include "../../core/helpers/public_pages.php";
  public_pages::header('Detalle del producto');//Aplicacion del header y envio del parametro del titulo
  
?>
    <br>
    <br>
    <?php
    //aplicacion del metodo detalle_producto
    public_pages:: detalle_producto();
    ?>

     <!--Inclusion de archivos javascript necesarios para la funcionalidad del sitio-->   
    <script src="../../resource/js/jquery-3.3.1.min.js"></script>
    <script src="../../resource/js/materialize.min.js"></script>
    <script src="../../resource/js/initialization.js"></script>
       
    </body>
    
<?php
//Aplicacion del footer en la pagina
   public_pages::footer();
?>  
</html>
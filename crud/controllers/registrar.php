<?php
  if(!empty($_POST['txtRegistrar'])){
    $categoria=$_POST['txtCategoria'];
    $producto=$_POST['txtProducto'];
    $precio=$_POST['txtPrecio'];

    if(!empty($categoria=$_POST['txtCategoria']) and !empty($producto=$_POST['txtProducto']) and !empty($precio=$_POST['txtPrecio'])){

      $registrar=$conexion->query("INSERT INTO `productos` ( id_categoria, Producto, precio) VALUES ('$categoria', '$producto', '$precio');");
      if($registrar == true){
        echo '<div class="alert alert-success">Producto Registrado</div>';
      }else{
        echo '<div class="alert alert-danger">Error al registrar</div>';
      }
    }else{
      echo '<div class="alert alert-danger">Debe llenar todo el formulario</div>';
    }
?>
 <script>
  window.history.replaceState(null, null, window.location.pathname);
 </script>
<?php
  }


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/46b2b0a70b.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
 <script>
  function confirmar(){
    alert("desea eliminar el producto?");
  }
 </script>
<i class="mdi mdi-script-outline:"></i>
<div class="alert alert-primary text-center">CRUD EN PHP & MYSQL</div>
<?php
   include("models/conexion.php");
   include("controllers/update.php");
?>
<div class="row col-12 p-4">
<form action="" class="col p-3" method="post">
    <div class="alert alert-success">Registrar Producto</div>
    <?php
    include("controllers/registrar.php");
    include("controllers/delete.php");
    ?>

    <div class="mb-3">
      <label  class="form-label">Categoria</label>
      <select class="form-select" aria-label="Default select example" name="txtCategoria">
      <option selected>Seleccionar...</option>
      <?php
      $categorias=$conexion->query('select * from categoria');
      while($datos=$categorias->fetch_object()){ ?>
        <option value="<?= $datos->id_categoria ?>"><?= $datos->categoria ?></option>
    <?php  }
      ?>
    </select>
    </div>

    <div class="mb-3">
    <label class="form-label">Producto</label>
    <input type="text" class="form-control" name="txtProducto" >
    </div>

    <div class="mb-3">
    <label class="form-label">Precio</label>
    <input type="number" class="form-control" name="txtPrecio" step="0.01" >
    </div>

    <div class="mb-3">
      <button type="submit" value="ok" name="txtRegistrar" class="btn btn-primary">Registrar</button>
    </div>
</form>

<table class="table col p-3">
  <thead>
    <tr>
      <th scope="col">CODIGO</th>
      <th scope="col">CATEGORIA</th>
      <th scope="col">NOMBRE</th>
      <th scope="col">PRECIO</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $productos=$conexion->query(" select productos.*, categoria.categoria FROM productos
      INNER JOIN categoria ON
      productos.id_categoria=categoria.id_categoria ");

      while($datos = $productos->fetch_object()){ ?>

        <tr>
        <td><?= $datos->id_producto ?></td>
        <td><?= $datos->categoria ?></td>
        <td><?= $datos->Producto ?></td>
        <td>$ <?= $datos->precio ?></td>
        <td>
          <a href="#" class="btn btn-warning" title="Editar" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $datos->id_producto ?>"><i class="fa-solid fa-pen-to-square"></i></a>
          <a href="index.php?id=<?=$datos->id_producto ?>" class="btn btn-danger" title="Eliminar" onclick="confirmar()"><i class="fa-solid fa-trash"></i></a>
        </td>
        </tr>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal<?= $datos->id_producto ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">EDITAR PRODUCTO</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
              <form action="" class="col" method="post">
                <input type="hidden" name="txtId" value="<?= $datos->id_producto?>">
                  <div class="mb-3">
                    <label  class="form-label">Categoria</label>
                    <select class="form-select" aria-label="Default select example" name="txtCategoria">
                    <option selected>Seleccionar...</option>
                  <?php
                    $categoriasDarps=$conexion->query('select * from categoria');
                    while($datosCat=$categoriasDarps->fetch_object()){ ?>
                      <option <?= $datos->id_categoria == $datosCat->id_categoria ? "selected" : "" ?>  value="<?= $datosCat->id_categoria ?>"><?= $datosCat->categoria ?></option>
                  <?php  }
                    ?>
                  </select>
                  </div>

                  <div class="mb-3">
                  <label class="form-label">Producto</label>
                  <input type="text" class="form-control" name="txtProducto" value="<?= $datos->Producto ?>" >
                  </div>

                  <div class="mb-3">
                  <label class="form-label">Precio</label>
                  <input type="number" class="form-control" name="txtPrecio" step="0.01" value="<?= $datos->precio ?>">
              </div>
              <div class="mb-3">
                <button type="submit" name="btnModificar" value="OK" class="btn btn-warning">Modificar</button>
              </div>
              </form>
      </div>
    </div>
  </div>
</div>
    <?php  }
      ?>
  </tbody>
</table>
</div>


    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
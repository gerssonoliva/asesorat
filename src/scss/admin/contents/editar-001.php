
<?php
  require_once "../sesion_admin.php";
  loginRedirect("../login.php");

  $id = !empty($_GET["id"]) ? $_GET["id"] : 0;

  if ($id <= 0) {
      header("Location: ./producto.php ", true, 301);
  }

  require_once "../../app/autoload.php";

  $producto_controller = new ProductoController();

  $producto = $producto_controller->find($id);

  $publicar = trim($producto->pro_publicar);

  $si = "";
  $no = "";

  if ($publicar == "S") {
      $si = "checked='checked'";
  } elseif ($publicar == "N") {
      $no = "checked='checked'";
  }

  $title_page = "Producto";

?>

<!DOCTYPE html>
<html lang="es">

<head>

  <?php

    $setvar = array(
      "titulo"      => "Editar $title_page",
      "follow"      => "",
      "description" => "Administrador",
      "keywords"    => "administrador",
      "active"      => [1, 0],
    );

    $sidebar = array(
      "sidebar_class"  => "",
      "sidebar_toggle" => "only",
      "sidebar_active" => [1, 1],
    );

    require_once "../layout/head_links.phtml";
  ?>

</head>

<body>
  <?php require "../layout/header.phtml"; ?>

  <div class="app-wrap">
    <?php require_once "../layout/sidebar.phtml";?>
    <main role="main" class="main">

      <nav class="full-content" aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-shape shadow-sm radius-0">
          <li class="breadcrumb-item">
            <a href="admin">
              <i class="fas fa-home"></i> Home
            </a>
          </li>
          <li class="breadcrumb-item">
            <a href="admin/producto/producto.php">
              <i class="fas fa-list"></i>
              <?php echo $title_page ;?>s
            </a>
          </li>
          <li class="breadcrumb-item active bg-info text-white" aria-current="page">
            Editar <?php echo $title_page; ?>
          </li>
        </ol>
      </nav>

      <div class="container py-2 py-md-3">
        <div class="row">
          <div class="col-12">
            <h5 class="page-header-title">Editar <?php echo $title_page; ?> </h5>
            <hr class="hr dashed">
          </div>
        </div>
        <div class="row">

          <div class="col-12">
            <form action="admin/producto/update.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" class="form-control" name="accion" id="accion" value="edit">
              <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id ?>">
              <div class="row">

              <div class="col-md-12">
                <div class="form-group">
                  <label for="sub_categoria_id">SubCategoriaId: </label>
                  <select class="custom-select select2-box" name="sub_categoria_id" id="sub_categoria_id" placeholder="SubCategoriaId">
                    <option value="" selected disabled hidden>Seleccionar </option>
                    <option value="text">text</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="categoria_id">CategoriaId: </label>
                  <select class="custom-select select2-box" name="categoria_id" id="categoria_id" placeholder="CategoriaId">
                    <option value="" selected disabled hidden>Seleccionar </option>
                    <option value="text">text</option>
                  </select>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="codigo">Codigo: </label>
                  <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Codigo" value="<?php echo $producto->codigo; ?>">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="nombre">Nombre: </label>
                  <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $producto->nombre; ?>">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="descripcion_corta">DescripcionCorta: </label>
                  <textarea class="form-control ckeditor" name="descripcion_corta" id="descripcion_corta" placeholder="DescripcionCorta" cols="30" rows="6"><?php echo htmlspecialchars_decode($producto->descripcion_corta); ?></textarea>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="precio">Precio: </label>
                  <input type="number" class="form-control" name="precio" id="precio" placeholder="Precio" value="<?php echo $producto->precio; ?>">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="descuento">Descuento: </label>
                  <input type="number" class="form-control" name="descuento" id="descuento" placeholder="Descuento" value="<?php echo $producto->descuento; ?>">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="precio_descuento">PrecioDescuento: </label>
                  <input type="number" class="form-control" name="precio_descuento" id="precio_descuento" placeholder="PrecioDescuento" value="<?php echo $producto->precio_descuento; ?>">
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <label for="num_visitas">NumVisitas: </label>
                  <input type="number" class="form-control" name="num_visitas" id="num_visitas" placeholder="NumVisitas" value="<?php echo $producto->num_visitas; ?>">
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label for="email" class="d-block">Publicar </label>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="publicar" id="si" value="S" <?php echo $si; ?> >
                    <label class="form-check-label" for="si">SI</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="publicar" id="no" value="N" <?php echo $no; ?> >
                    <label class="form-check-label" for="no">NO</label>
                  </div>
                </div>
              </div>

              </div>

              <div class="w-100 text-center">
                <a href="admin/producto/producto.php" class="btn btn-outline-danger"> <i class="fas fa-times"></i> Cancelar</a>
                <button type="submit" class="btn btn-outline-primary rounded-0  "> <i class="fas fa-sync-alt"></i> Actualizar</button>
              </div>

            </form>
          </div>

        </div>

      </div>

    </main>

  </div>

  <?php require_once "../layout/foot_links.phtml"; ?>

</body>

</html>


<?php
  require_once "../sesion_admin.php";
  loginRedirect("../login.php");

  $id = !empty($_GET["id"]) ? $_GET["id"] : 0;

  if ($id <= 0) {
      header("Location: ./suscriptor.php ", true, 301);
  }

  require_once "../../app/autoload.php";

  $suscriptor_controller = new SuscriptorController();

  $suscriptor = $suscriptor_controller->find($id);

  $title_page = "Suscriptor";

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
      "sidebar_active" => [3, 2],
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
            <a href="admin/suscriptor/suscriptor.php">
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
            <form action="admin/suscriptor/update.php" method="POST" enctype="multipart/form-data">
              <input type="hidden" class="form-control" name="accion" id="accion" value="edit">
              <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $id ?>">
              <div class="row">

                <div class="col-md-12">
                  <div class="form-group">
                    <label for="nombre">Nombre: </label>
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" value="<?php echo $suscriptor->nombre; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="carrera">Carrera: </label>
                    <input type="text" class="form-control" name="carrera" id="carrera" placeholder="Carrera" value="<?php echo $suscriptor->carrera; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="celular">N° Celular: </label>
                    <input type="text" class="form-control" name="celular" id="celular" placeholder="N° Celular" value="<?php echo $suscriptor->celular; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="grado">Grado: </label>
                    <input type="text" class="form-control" name="grado" id="grado" placeholder="Grado" value="<?php echo $suscriptor->grado; ?>">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="tel" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $suscriptor->email; ?>">
                  </div>
                </div>
              
              </div>

              <div class="w-100 text-center">
                <a href="admin/suscriptor/suscriptor.php" class="btn btn-outline-danger"> <i class="fas fa-times"></i> Cancelar</a>
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

<?php

    require_once "../sesion_admin.php";

    loginRedirect("../login.php");

    require_once "../../app/autoload.php";

    $user_controller = new UserController();

    $data = $user_controller->getAll();

    $title_page = "Users";

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <?php

    $setvar = array(
      "titulo"     => "$title_page",
      "follow"      => "",
      "description" => "Administrador",
      "keywords"    => "administrador",
      "active"      => [1,0]
    );

    $sidebar = array(
      "sidebar_class"     => "",
      "sidebar_toggle"      => "only",
      "sidebar_active"      => [3,1],
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

          <li class="breadcrumb-item active bg-secondary text-white" aria-current="page">
            <a class="link-white" href="admin/user/user.php">
              <?php echo $title_page; ?>
            </a>
          </li>
        </ol>
      </nav>

      <div class="container-full p-2 fs-x-14">
        <div class="row">
          <div class="col-12">
            <h5 class="page-header-title">Lista de <?php echo $title_page; ?> </h5>
          </div>
          <div class="col-12 mb-3">
            <a href="admin/user/user.php" class="btn btn-outline-primary btn-sm btn-bar" role="button">
              <i class="fas fa-list-ul"></i>
              Listar
            </a>
            <a href="admin/user/nuevo.php" class="btn btn-outline-primary btn-sm btn-bar" role="button">
              <i class="fas fa-file"></i>
              Nuevo
            </a>
          </div>

          <div class="col-12">
            <div class="table-responsive">

              <table id="dataTableList" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <!-- <th width="50">#</th> -->
                    <th width="50">Nº</th>
                    <th>Nombre </th>
                    <th>Apellidos </th>
                    <th>Email </th>
                    <!-- <th>Password </th> -->
                    <th class="text-center fs-x-13">Reset Password</th>
                    <th width="70"></th>
                  </tr>
                </thead>

                <tbody>
                  <?php $cont = 1;?>
                  <?php foreach ($data as &$row) {?>

                    <?php
                      $classBtn = "" ;
                      $title    = "" ;
                      $icon_pub = "" ;

                      if(!empty($row->publicar)){
                        if($row->publicar == "S"){
                          $classBtn =  "btn-outline-danger";
                          $title = "Desactivar/Ocultar" ;
                          $icon_pub = '<i class="fas fa-times"></i>';
                        }
                        else {
                          $classBtn =  "btn-outline-success";
                          $title = "Publicar" ;
                          $icon_pub = '<i class="fas fa-check"></i>';
                        }
                      }

                      /* estado */
                      $title_estado   = "";
                      $class_estado   = "";
                      $class_disabled = "";

                      if($row->estado == 1)
                      {
                        $title_estado = "Eliminar" ;
                      }
                      else
                      {
                        $title_estado   = "Recuperar" ;
                        $class_estado   = "row-disabled";
                        $class_disabled = "is-disabled";
                      }
                    ?>

                  <tr class="<?php echo $class_estado ;?>" >

                    <!-- <td> <?php echo $row->user_id ?> </td> -->
                    <td> <?php echo $cont ?> </td>
                    <td> <?php echo $row->nombre ?> </td>
                    <td> <?php echo $row->apellidos ?> </td>
                    <td> <?php echo $row->email ?> </td>
                    <!-- <td> <?php echo $row->password ?> </td> -->

                    <td class="text-center">
                      <a class="btn btn-outline-info btn-sm lh-1 btn-table" href="admin/user/reset.php?id=<?php echo $row->user_id ?>" title="Reset Password">
                        <i class="fas fa-key"></i>
                      </a>
                    </td>

                    <td class="text-center">
                      <a class="btn btn-outline-primary btn-sm lh-1 btn-table <?php echo $class_disabled ; ?>" href="admin/user/editar.php?id=<?php echo $row->user_id ?>" title="Editar">
                      <i class="fas fa-pencil-alt"></i>
                      </a>
                      <button class="btn btn-outline-danger btn-sm lh-1 btn-table" onclick="modalDelete(<?php echo $row->user_id ?>, `<?php echo $row->nombre ?>`,`<?php echo $title_estado ?>`,`<?php echo $row->estado ?>`);" title="<?php echo $title_estado ;?>">
                      <i class="far fa-trash-alt"></i>
                      </button>
                      <span class="sr-only"><?php echo $row->estado ?></span>
                    </td>
                    <?php $cont = $cont+1; ?>
                  </tr>
                  <?php }?>
                </tbody>

              </table>

            </div>
          </div>

        </div>

      </div>

    </main>

  </div>



  <?php require_once "../layout/foot_links.phtml"?>

  <!-- Modal Delete -->
  <form id="formModal">
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTitle">
            <span> Eliminar </span>
              <?php echo $title_page; ?>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <input type="hidden" name="idRowModal" id="idRowModal">
            <input type="hidden" name="accion" id="accion">
            <input type="hidden" name="publicar" id="publicar">
            <input type="hidden" name="estado" id="estado">
            <div id="dataTextModal">
            </div>

            <div id="modalHistorial" class="d-none">
              <div class="col-12 my-3">
                <label for="si" class="text-bold "> Conservar en historial: </label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="historial" id="si" value="1" checked="checked">
                  <label class="form-check-label" for="si">SI</label>
                </div>

                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="historial" id="no" value="0" >
                  <label class="form-check-label" for="no">NO</label>
                </div>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-outline-danger" id="btn-send">Eliminar </button>
            <div id="alertModal"></div>
          </div>
        </div>
      </div>
    </div>
  </form>

  <?php require_once "../layout/datatables.phtml" ?>

  <script>

  // modals
  (function ($) {
    function processFormModal(event) {

      event.preventDefault();
      var inputs = $("#formModal").serializeFormJSON();
      inputs.id = $("#idRowModal").val();
      var params = JSON.stringify(inputs);

      $.ajax({
        url: "./app/api/user/IndexUser.php",
        dataType: "json",
        type: "post",
        contentType: "application/json",
        data: params,
        processData: false,
        success: function (data, textStatus, jQxhr) {

          if (!data.error && data.data) {
            $("#myModal").modal("hide");
            $("#formModal")[0].reset();
            location.reload();
          }
          else {
            $("#alertModal").html("Error en servidor: " + data.data);
          }

        },
        error: function (jqXhr, textStatus, errorThrown) {
          console.log(errorThrown);
        }
      });

      event.preventDefault();
    }

    $("#formModal").submit(processFormModal);

  })(jQuery);

  // modal DELETE
  function modalDelete(id, textRow, title, estado) {
    $("#idRowModal").val(id);
    $("#accion").val("delete");

    $("#modalHistorial").addClass("d-none");
    $("#modalTitle span").text("Eliminar");

    var text = `¿Esta seguro de <strong> ${title} </strong>: <strong> ${textRow} </strong> ?`;
    $("#dataTextModal").html(text);
    $("#btn-send").text(title);

    $("#estado").val(estado);
    $("#btn-send").addClass("btn-outline-danger");

    if (estado === "0") {
      $("#modalHistorial").addClass("d-none");
      $("#modalHistorial").removeClass("d-block");
    }
    else if (estado === "1") {
      $("#modalHistorial").addClass("d-block");
    }
    $("#myModal").modal("show");
  }

  // modal PUBLICAR
  function modalPublicar(id, textRow, title, publicar) {
    $("#idRowModal").val(id);
    $("#accion").val("publish");
    $("#publicar").val(publicar);

    $("#modalHistorial").addClass("d-none");
    $("#modalTitle span").text("Publicar");

    var text = `¿Esta seguro de <strong> ${title} </strong>: <strong> ${textRow} </strong> ?`;
    $("#dataTextModal").html(text);
    $("#btn-send").text(title);

    $("#btn-send").removeClass("btn-outline-success");
    $("#btn-send").removeClass("btn-outline-danger");

    if (publicar.toLowerCase() === "n") {
      $("#btn-send").addClass("btn-outline-success");
    }
    else{
      $("#btn-send").addClass("btn-outline-danger");
    }

    $("#myModal").modal("show");
  }

</script>


</body>

</html>

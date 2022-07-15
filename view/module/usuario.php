<input type="hidden" id="icode" name="icode">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Usuarios
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
        <li><a href="#"><i class="glyphicon glyphicon-user"></i> Usuarios</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Ingreso de usuarios</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        
      <div class="box-body">  
      <form method="POST" id="formu">

        <!-- ROW 1 -->
          <div class="row">
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="input-group">
                <span class="input-group-addon">Nombre</span>
                <input id="iname" name="iname" type="text" class="form-control">
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="input-group">
                <span class="input-group-addon">Apellido</span>
                <input id="iape" name="iape" type="text" class="form-control">
              </div>
            </div>
          </div>
        <br>
        <!-- ROW 2 -->
        <div class="row">
          <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="input-group">
              <span class="input-group-addon">Usuario</span>
              <input id="iuser" name="iuser" type="text" class="form-control">
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="input-group">
              <span class="input-group-addon">Contraseña</span>
              <input id="icontra" name="icontra" type="password" class="form-control">
            </div>
          </div>
          <!-- ./col -->
        </div>

        <br>

        <!-- ROW 3 -->
        <div class="row">
          <div class="col-lg-12 col-xs-12">
              <!-- small box -->
              <div class="input-group">
                  <span class="input-group-addon">Tipo Usuario</span>
                  <select class="form-control" id="itipousua" name="itipousua">
                  <option value="" selected disabled hidden>Seleccione el tipo de usuario</option>
                  <?php
                      $objCtrTipoUsuaAll = new TipoUsuarioController();

                      if (gettype($objCtrTipoUsuaAll -> getSearchAllTipoUsuario()) == 'boolean') {
                      echo '
                          <option value="1">No hay datos que mostrar</option>
                      ';  
                      } else {
                      foreach ($objCtrTipoUsuaAll -> getSearchAllTipoUsuario() as $key => $value) {
                          echo '
                          <option value='. $value["idTipoUsuario"] .'>'.$value["idTipoUsuario"]. "- " .$value["descripcion"] .'</option>
                          ';
                          }
                      }
                  ?>
                  </select>
              </div>
          </div>
        </div>

        <br>

        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-app bg-blue" type="submit" onclick="validate(event)">
            <i class="fa fa-save"></i> Guardar
          </button>
          <button class="btn btn-app bg-gray" type="submit" onclick="getGenerarReporte(event)">
            <i class="glyphicon glyphicon-list-alt"></i> Reporte
          </button>
        </div>
        <!-- /.box-footer-->
      </form>
      </div>
      <?php
        if (isset($_POST['iname'])){
          $objCtrUser = new UsuarioController();
          $objCtrUser -> setInsertUsuario($_POST['iname'], $_POST['iape'], $_POST['iuser'], $_POST['icontra'], $_POST['itipousua']);
        }
      ?>

    </div>
    <!-- /.box -->

      <!-- Otro box -->
      <div class="box">
        <div class="box-header with-border">
        <h3 class="box-title">Usuarios</h3>
        
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
          title="Collapse">
          <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          
            <table id="users" class="table table-bordered table-striped table-hover">
              <thead>
                <!-- Este tr sirve para los títulos -->
                <tr>
                  <th class="text-center">Codigo</th>
                  <th class="text-center">Nombre</th>
                  <th class="text-center">Apellido</th>
                  <th class="text-center">Usuario</th>
                  <th class="text-center">Contraseña</th>
                  <th class="text-center">Tipo Usuario</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <form action="" method="post">
                  <?php

                    $objCtrUserAll = new UsuarioController();
                    if (gettype($objCtrUserAll -> getSearchAllUsuario()) == 'boolean') {
                      echo '
                      <tr>
                        <td colspan = "5">No hay datos que mostrar</td>
                      </tr>';  
                    } else {
                      foreach ($objCtrUserAll -> getSearchAllUsuario() as $key => $value) {
                        echo '
                        <tr>
                          <td class="text-center">'. $value["idUsuario"] .'</td>
                          <td class="text-center">'. $value["nombre"] .'</td>
                          <td class="text-center">'. $value["apellido"] .'</td>
                          <td class="text-center">'. $value["usuario"] .'</td>
                          <td class="text-center">'. $value["contrasena"] .'</td>
                          <td class="text-center">'. $value["descripcion"] .'</td>
                          <td class="text-center">
                            <button class="btn btn-social-icon btn-google" onclick="erase(this.parentElement.parentElement)"><i class="glyphicon glyphicon-trash"></i></button>
                            <button class="btn btn-social-icon bg-blue" onclick="getData(this.parentElement.parentElement)" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil-square-o"></i></button>
                            </td>
                            </tr>';
                        }
                      }
                  ?>
                </form>
              </tbody>
            </table> 
        </div>
      
        <!-- /.box-body -->
    </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Modal para guardar -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header bg-blue">
          <h4 class="modal-title">Modificar usuario</h4>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        <form method="POST" id="modifiUsuario">
          <input type="hidden" name="icodem" id="icodem">
        <!-- ROW 1 -->
          <div class="row">
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="input-group">
                <span class="input-group-addon">Nombre</span>
                <input id="inamem" name="inamem" type="text" class="form-control">
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="input-group">
                <span class="input-group-addon">Apellido</span>
                <input id="iapem" name="iapem" type="text" class="form-control">
              </div>
            </div>
          </div>
        <br>
        <!-- ROW 2 -->
        <div class="row">
          <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="input-group">
              <span class="input-group-addon">Usuario</span>
              <input id="iuserm" name="iuserm" type="text" class="form-control">
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-xs-6">
            <!-- small box -->
            <div class="input-group">
              <span class="input-group-addon">Contraseña</span>
              <input id="icontram" name="icontram" type="password" class="form-control">
            </div>
          </div>
          <!-- ./col -->
        </div>

        <br>

        <!-- ROW 3 -->
        <div class="row">
          <div class="col-lg-12 col-xs-12">
              <!-- small box -->
              <div class="input-group">
                  <span class="input-group-addon">Tipo Usuario</span>
                  <select class="form-control" id="itipousuam" name="itipousuam">
                  <option value="" selected disabled hidden>Seleccione el tipo de usuario</option>
                  <?php
                      $objCtrTipoUsuaAll = new TipoUsuarioController();

                      if (gettype($objCtrTipoUsuaAll -> getSearchAllTipoUsuario()) == 'boolean') {
                      echo '
                          <option value="1">No hay datos que mostrar</option>
                      ';  
                      } else {
                      foreach ($objCtrTipoUsuaAll -> getSearchAllTipoUsuario() as $key => $value) {
                          echo '
                          <option value='. $value["idTipoUsuario"] .'>'.$value["idTipoUsuario"]. "- " .$value["descripcion"] .'</option>
                          ';
                          }
                      }
                  ?>
                  </select>
              </div>
          </div>
        </div>

        <br>

        </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button class="btn btn-google bg-blue" type="submit" onclick="validateMod(event)">
            <i class="glyphicon glyphicon-ok-sign"></i> Guardar
          </button>
          <?php
            if (isset($_POST['inamem'])){
              $objCtrUser = new UsuarioController();
              $objCtrUser -> setUpdateUsuario($_POST['icodem'], $_POST['inamem'], $_POST['iapem'], $_POST['iuserm'], $_POST['icontram'], $_POST['itipousuam']);
            }
          ?>
          <button type="button" class="btn btn-google bg-red" data-dismiss="modal">
          <i class="glyphicon glyphicon-remove-sign"></i> Cerrar
          </button>
        </div>

      </div>
    </div>
  </div>
  <script>
    let activarIcon = document.getElementById('claseUsuario');

    activarIcon.classList.add('active');
  </script>
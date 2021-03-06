  <input type="hidden" id="icodeProveedor" name="icodeProveedor">
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Proveedores
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
          <li><a href="#"><i class="glyphicon glyphicon-user"></i> Proveedores</a></li>
        </ol>
      </section>

      <section class="content">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Ingreso de proveedores</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                      title="Collapse">
                <i class="fa fa-minus"></i></button>
            </div>
          </div>
          
        <div class="box-body">  
        <form method="POST" id="formularioProveedor">
          <!-- ROW 1 -->
          <div class="row">
            <div class="col-lg-6 col-xs-6">
              <div class="input-group">
                <span class="input-group-addon">Nombre Completo</span>
                <input id="nombrePro" name="nombrePro" type="text" class="form-control">
              </div>
            </div>
            <div class="col-lg-6 col-xs-6">
              <div class="input-group">
                <span class="input-group-addon">Numero de Telefono</span>
                <input id="numTel" name="numTel" type="number" class="form-control">
              </div>
            </div>
          </div>

          <br>

          <!-- ROW 2 -->  
          <div class="row">
            <div class="col-lg-12 col-xs-12">
              <div class="input-group">
                <span class="input-group-addon">Direccion</span>
                <input id="dirPro" name="dirPro" type="text" class="form-control">
              </div>
            </div>
          </div>

          <br>
      
          <div class="box-footer">
            <button class="btn btn-app bg-blue" type="submit" onclick="validateProveedor(event)">
              <i class="fa fa-save"></i> Guardar
            </button>
            <button class="btn btn-app bg-gray" type="submit" onclick="getGenerarReporteProveedor(event)">
              <i class="glyphicon glyphicon-list-alt"></i> Reporte
            </button>
          </div>
        </form>
        </div>
        <?php
          if (isset($_POST['nombrePro'])){
            $objCtrProveedor = new ProveedorController();
            $objCtrProveedor -> setInsertarProveedor($_POST['nombrePro'], $_POST['numTel'], $_POST['dirPro']);
          }
        ?>
        </div>

        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Proveedores</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
              title="Collapse">
              <i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body">
            <table id="users" class="table table-bordered table-striped table-hover">
              <thead>
                <!-- Este tr sirve para los t??tulos -->
                <tr>
                  <th class="text-center">Codigo</th>
                  <th class="text-center">Nombre Proveedor</th>
                  <th class="text-center">Numero Telefono</th>
                  <th class="text-center">Direccion</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <form action="" method="post">
                  <?php
                    $objCtrProveedorAll = new ProveedorController();

                    if (gettype($objCtrProveedorAll -> getSearchAllProveedor()) == 'boolean') {
                      echo '
                      <tr>
                        <td colspan = "5">No hay datos que mostrar</td>
                      </tr>';  
                    } else {
                      foreach ($objCtrProveedorAll -> getSearchAllProveedor() as $key => $value) {
                        if ($_SESSION['rol'] == 1) {
                          echo '
                          <tr>
                            <td class="text-center">'. $value["idProveedor"] .'</td>
                            <td class="text-center">'. $value["nombre"] .'</td>
                            <td class="text-center">'. $value["numeroTelefono"] .'</td>
                            <td class="text-center">'. $value["direccion"] .'</td>
                            <td class="text-center">
                              <button class="btn btn-social-icon btn-google" onclick="eraseProveedor(this.parentElement.parentElement)"><i class="glyphicon glyphicon-trash"></i></button>
                              <button class="btn btn-social-icon bg-blue" onclick="getDataProveedor(this.parentElement.parentElement)" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil-square-o"></i></button>
                            </td>
                          </tr>';
                          } else {
                            echo '
                            <tr>
                              <td class="text-center">'. $value["idProveedor"] .'</td>
                              <td class="text-center">'. $value["nombre"] .'</td>
                              <td class="text-center">'. $value["numeroTelefono"] .'</td>
                              <td class="text-center">'. $value["direccion"] .'</td>
                              <td class="text-center">
                                <button class="btn btn-social-icon bg-blue" onclick="getDataProveedor(this.parentElement.parentElement)" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil-square-o"></i></button>
                              </td>
                            </tr>';
                          }
                        }
                      }
                  ?>
                </form>
              </tbody>
            </table> 
          </div>
        </div>
      </section>
    </div>

    <!-- Modal para guardar -->
    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header bg-blue">
            <h4 class="modal-title">Modificar proveedores</h4>
          </div>

          <div class="modal-body">
            <form method="POST" id="formularioProveedorm">
              <input type="hidden" name="icodeProveedorm" id="icodeProveedorm">

              <!-- ROW 1 MOD CONTIENE NOMBRE Y FECHA DE NACIMIENTO-->
              <div class="row">
                <div class="col-lg-6 col-xs-6">
                  <div class="input-group">
                    <span class="input-group-addon">Nombre Completo</span>
                    <input id="nombreProm" name="nombreProm" type="text" class="form-control">
                  </div>
                </div>
                <div class="col-lg-6 col-xs-6">
                  <div class="input-group">
                    <span class="input-group-addon">Numero de Telefono</span>
                    <input id="numTelm" name="numTelm" type="number" class="form-control">
                  </div>
                </div>
              </div>
              <br>
              <!-- ROW 2 MOD CONTIENE SEXO Y CIUDAD-->
              <div class="row">
                <div class="col-lg-12 col-xs-12">
                  <div class="input-group">
                    <span class="input-group-addon">Direccion</span>
                    <input id="dirProm" name="dirProm" type="text" class="form-control">
                  </div>
                </div>
              </div>
            </form>
          </div>

          <div class="modal-footer">
            <button class="btn btn-google bg-blue" type="submit" onclick="validateProveedorMod(event)">
              <i class="glyphicon glyphicon-ok-sign"></i> Guardar
            </button>
            <?php
            if (isset($_POST['nombreProm'])) {
              $objCtrProveedor = new ProveedorController();
              $objCtrProveedor -> setUpdateProveedor($_POST['icodeProveedorm'], $_POST['nombreProm'], $_POST['numTelm'], $_POST['dirProm']);
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
      let activarIcon = document.getElementById('claseProveedor');

      activarIcon.classList.add('active');
    </script>
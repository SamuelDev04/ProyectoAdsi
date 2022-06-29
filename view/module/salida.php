<input type="hidden" id="icodeProduc" name="icodeProduc">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Productos
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-pencil"></i> Productos</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Ingreso de productos</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        
      <div class="box-body">  
      <form method="POST" id="formularioProducto">

          <!-- ROW 1 -->
            <div class="row">
              <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="input-group">
                  <span class="input-group-addon">Descripcion Producto</span>
                  <input id="descripPro" name="descripPro" type="text" class="form-control">
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="input-group">
                  <span class="input-group-addon">Cantidad Producto</span>
                  <input id="cantPro" name="cantPro" type="number" class="form-control">
                </div>
              </div>
            </div>

            <br>

          <!-- ROW 2 -->  
            <div class="row">
              <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="input-group">
                  <span class="input-group-addon">Costo Producto</span>
                  <input id="costPro" name="costPro" type="number" class="form-control">
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="input-group">
                  <span class="input-group-addon">Tipo Producto</span>
                  <select class="form-control" id="tipPro" name="tipPro">
                    <option value="" selected disabled hidden>Seleccione tipo de producto</option>
                    <?php
                      $objCtrTipoProductoAll = new TipoProController();

                      if (gettype($objCtrTipoProductoAll -> getSearchAllTipoProducto()) == 'boolean') {
                        echo '
                          <option value="1">No hay datos que mostrar</option>
                        ';  
                      } else {
                        foreach ($objCtrTipoProductoAll -> getSearchAllTipoProducto() as $key => $value) {
                          echo '
                            <option value='. $value["idTipoProducto"] .'>'. $value["descripcion"] .'</option>
                            ';
                          }
                      }
                    ?>
                  </select>
                  <!--<input id="tipPro" name="tipPro" type="number" class="form-control">-->
                </div>
              </div>
            </div>
          <br>
        
        <div class="box-footer">
          <button class="btn btn-app bg-blue" type="submit" onclick="validateProducto(event)">
            <i class="fa fa-save"></i> Guardar
          </button>
          <button class="btn btn-app bg-gray" type="submit" onclick="getGenerarReporteAprendiz(event)">
            <i class="fa fa-print"></i> Reporte
          </button>
        </div>
        <!-- /.box-footer-->
      </form>
      </div>
      <?php
        if (isset($_POST['descripPro'])){
          $objCtrProducto = new ProductoController();
          $objCtrProducto -> setInsertarProducto($_POST['descripPro'], $_POST['cantPro'], $_POST['costPro'], $_POST['tipPro']);
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
                  <th class="text-center">Descripcion</th>
                  <th class="text-center">Cantidad</th>
                  <th class="text-center">Costo</th>
                  <th class="text-center">Tipo de producto</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <form action="" method="post">
                  <?php
                    $objCtrProductoAll = new ProductoController();

                    if (gettype($objCtrProductoAll -> getSearchAllProducto()) == 'boolean') {
                      echo '
                      <tr>
                        <td colspan = "5">No hay datos que mostrar</td>
                      </tr>';  
                    } else {
                      foreach ($objCtrProductoAll -> getSearchAllProducto() as $key => $value) {
                        echo '
                        <tr>
                          <td class="text-center">'. $value["idProducto"] .'</td>
                          <td class="text-center">'. $value["descripProducto"] .'</td>
                          <td class="text-center">'. $value["cantProducto"] .'</td>
                          <td class="text-center">'. $value["costoProducto"] .'</td>
                          <td class="text-center">'. $value["idTipoProducto"] .'</td>
                          <td class="text-center">
                            <button class="btn btn-social-icon btn-google" onclick="eraseProducto(this.parentElement.parentElement)"><i class="fa fa-trash"></i></button>
                            <button class="btn btn-social-icon bg-blue" onclick="getDataProducto(this.parentElement.parentElement)" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil-square-o"></i></button>
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
          <h4 class="modal-title">Modificar producto</h4>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form method="POST" id="formularioProductom">
            <input type="hidden" name="icodeProducm" id="icodeProducm">

            <!-- ROW 1 MOD CONTIENE NOMBRE Y FECHA DE NACIMIENTO-->
            <div class="row">
              <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="input-group">
                  <span class="input-group-addon">Descripcion Producto</span>
                  <input id="descripProm" name="descripProm" type="text" class="form-control">
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="input-group">
                  <span class="input-group-addon">Cantidad Producto</span>
                  <input id="cantProm" name="cantProm" type="number" class="form-control">
                </div>
              </div>
            </div>
            <br>
            <!-- ROW 2 MOD CONTIENE SEXO Y CIUDAD-->
            <div class="row">
              <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="input-group">
                  <span class="input-group-addon">Costo Producto</span>
                  <input id="costProm" name="costProm" type="number" class="form-control">
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="input-group">
                  <span class="input-group-addon">Tipo Producto</span>
                  <input id="tipProm" name="tipProm" type="number" class="form-control">
                </div>
              </div>
              <!-- ./col -->
            </div>
          </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button class="btn btn-google bg-blue" type="submit" onclick="validateProductoMod(event)">
            <i class="fa fa-save"></i> Guardar
          </button>
          <?php
          if (isset($_POST['descripProm'])) {
            $objCtrProducto = new ProductoController();
            $objCtrProducto -> setUpdateProducto($_POST['icodeProducm'], $_POST['descripProm'], $_POST['cantProm'], $_POST['costProm'], $_POST['tipProm']);
          }
          ?>
          <button type="button" class="btn btn-google bg-red" data-dismiss="modal">
            <i class="fa fa-close"></i> Cerrar
          </button>
        </div>

      </div>
    </div>
  </div>
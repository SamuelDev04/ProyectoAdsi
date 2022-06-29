<input type="hidden" id="icodeProduc" name="icodeProduc">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Salidas
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-pencil"></i> Salidas</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Salidas de productos</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        
      <div class="box-body">  
      <form method="POST" id="formularioSalida">

        <!-- ROW 1 -->
        <div class="row">
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="input-group">
                    <span class="input-group-addon">Fecha salida</span>
                    <input id="fechaSal" name="fechaSal" type="date" class="form-control">
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="input-group">
                    <span class="input-group-addon">Cantidad salida</span>
                    <input id="cantSal" name="cantSal" type="number" class="form-control">
                </div>
            </div>
        </div>

        <br>

        <!-- ROW 2 -->  
        <div class="row">
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="input-group">
                    <span class="input-group-addon">Valor total</span>
                    <input id="valTot" name="valTot" type="number" class="form-control">
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="input-group">
                    <span class="input-group-addon">Cliente</span>
                    <select class="form-control" id="clienSal" name="clienSal">
                        <option value="" selected disabled hidden>Seleccione el cliente</option>
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
                </div>
            </div>
        </div>

        <br>

        <!-- ROW 3 -->
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <!-- small box -->
                <div class="input-group">
                    <span class="input-group-addon">Producto</span>
                    <select class="form-control" id="prodSal" name="prodSal">
                    <option value="" selected disabled hidden>Seleccione el producto</option>
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
          <button class="btn btn-app bg-blue" type="submit" onclick="validateSalida(event)">
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
        if (isset($_POST['fechaSal'])){
          $objCtrSalida = new SalidaController();
          $objCtrSalida -> setInsertarSalida($_POST['fechaSal'], $_POST['cantSal'], $_POST['valTot'], $_POST['clienSal'], $_POST['prodSal']);
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
                  <th class="text-center">Fecha Salida</th>
                  <th class="text-center">Cantidad</th>
                  <th class="text-center">Valor Total</th>
                  <th class="text-center">Cliente</th>
                  <th class="text-center">Producto</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <form action="" method="post">
                  <?php
                    $objCtrSalidaAll = new SalidaController();

                    if (gettype($objCtrSalidaAll -> getSearchAllSalida()) == 'boolean') {
                      echo '
                      <tr>
                        <td colspan = "5">No hay datos que mostrar</td>
                      </tr>';  
                    } else {
                      foreach ($objCtrSalidaAll -> getSearchAllSalida() as $key => $value) {
                        echo '
                        <tr>
                          <td class="text-center">'. $value["idDetSalida"] .'</td>
                          <td class="text-center">'. $value["fechaSalida"] .'</td>
                          <td class="text-center">'. $value["cantidadSalida"] .'</td>
                          <td class="text-center">'. $value["valorTotal"] .'</td>
                          <td class="text-center">'. $value["idCliente"] .'</td>
                          <td class="text-center">'. $value["idProducto"] .'</td>
                          <td class="text-center">
                            <button class="btn btn-social-icon btn-google" onclick="eraseSalida(this.parentElement.parentElement)"><i class="fa fa-trash"></i></button>
                            <button class="btn btn-social-icon bg-blue" onclick="getDataSalida(this.parentElement.parentElement)" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil-square-o"></i></button>
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
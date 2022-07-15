<input type="hidden" id="icodeSalida" name="icodeSalida">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Salidas
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
        <li><a href="#"><i class="glyphicon glyphicon-open"></i> Salidas</a></li>
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
                            $objCtrClienteAll = new ClienteController();

                            if (gettype($objCtrClienteAll -> getSearchAllCliente()) == 'boolean') {
                            echo '
                                <option value="1">No hay datos que mostrar</option>
                            ';  
                            } else {
                            foreach ($objCtrClienteAll -> getSearchAllCliente() as $key => $value) {
                                echo '
                                <option value='. $value["idCliente"] .'>'.$value["idCliente"]. "- " .$value["nombre"] .'</option>
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
                        $objCtrProductoAll = new ProductoController();

                        if (gettype($objCtrProductoAll -> getSearchAllProducto()) == 'boolean') {
                        echo '
                            <option value="1">No hay datos que mostrar</option>
                        ';  
                        } else {
                        foreach ($objCtrProductoAll -> getSearchAllProducto() as $key => $value) {
                            echo '
                            <option value='. $value["idProducto"] .'>'.$value["idProducto"]. "- " .$value["descripProducto"] .'</option>
                            ';
                            }
                        }
                    ?>
                    </select>
                </div>
            </div>
        </div>
        
        <br>

        <div class="box-footer">
          <button class="btn btn-app bg-blue" type="submit" onclick="validateSalida(event)">
            <i class="fa fa-save"></i> Guardar
          </button>
          <button class="btn btn-app bg-gray" type="submit" onclick="getGenerarReporteSalida(event)">
            <i class="glyphicon glyphicon-list-alt"></i> Reporte
          </button>
        </div>
        <!-- /.box-footer-->
      </form>
      </div>
      <?php
        if (isset($_POST['fechaSal'])){
          $objCtrSalida = new SalidaController();
          $objCtrSalida -> setInsertarSalida($_POST['fechaSal'], $_POST['cantSal'], $_POST['valTot'], $_POST['clienSal'], $_POST['prodSal']);
          $objCtrSalida -> setUpdateMercanciaS($_POST['prodSal'], $_POST['cantSal']);
        }
      ?>
    </div>
    <!-- /.box -->

    <!-- Otro box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Salidas</h3>
        
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
                        if ($_SESSION['rol'] == 1) {
                          echo '
                          <tr id="i" class="filafondo">
                            <td class="text-center">'. $value["idDetSalida"] .'</td>
                            <td class="text-center">'. $value["fechaSalida"] .'</td>
                            <td class="text-center">'. $value["cantidadSalida"] .'</td>
                            <td class="text-center">'. $value["valorTotal"] .'</td>
                            <td class="text-center">'. $value["nombre"] .'</td>
                            <td class="text-center">'. $value["descripProducto"] .'</td>
                            <td class="text-center">
                            <button class="btn btn-social-icon btn-google" onclick="eraseSalida(this.parentElement.parentElement)"><i class="glyphicon glyphicon-trash"></i></button>
                            <button class="btn btn-social-icon bg-blue" onclick="getDataSalida(this.parentElement.parentElement)" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil-square-o"></i></button>
                            </td>
                          </tr>';
                        } else {
                          echo '
                          <tr id="i" class="filafondo">
                            <td class="text-center">'. $value["idDetSalida"] .'</td>
                            <td class="text-center">'. $value["fechaSalida"] .'</td>
                            <td class="text-center">'. $value["cantidadSalida"] .'</td>
                            <td class="text-center">'. $value["valorTotal"] .'</td>
                            <td class="text-center">'. $value["nombre"] .'</td>
                            <td class="text-center">'. $value["descripProducto"] .'</td>
                            <td class="text-center">
                            <button class="btn btn-social-icon btn-google" onclick="eraseSalida(this.parentElement.parentElement)"><i class="glyphicon glyphicon-trash"></i></button>
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
          <form method="POST" id="formularioSalidam">
            <input type="hidden" name="icodeSalidam" id="icodeSalidam">

            <!-- ROW 1 MOD CONTIENE FECHA DE SALIDA Y CANTIDAD DE SALIDA-->
            <div class="row">
              <div class="col-lg-6 col-xs-6">
                  <!-- small box -->
                  <div class="input-group">
                      <span class="input-group-addon">Fecha salida</span>
                      <input id="fechaSalm" name="fechaSalm" type="date" class="form-control">
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-6 col-xs-6">
                  <!-- small box -->
                  <div class="input-group">
                      <span class="input-group-addon">Cantidad salida</span>
                      <input id="cantSalm" name="cantSalm" type="number" class="form-control">
                  </div>
              </div>
            </div>
            <br>
            <!-- ROW 2 MOD CONTIENE VALOR TOTAL Y CLIENTE-->
            <div class="row">
              <div class="col-lg-6 col-xs-6">
                  <!-- small box -->
                  <div class="input-group">
                      <span class="input-group-addon">Valor total</span>
                      <input id="valTotm" name="valTotm" type="number" class="form-control">
                  </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="input-group">
                    <span class="input-group-addon">Cliente</span>
                    <select class="form-control" id="clienSalm" name="clienSalm">
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
              <!-- ./col -->
            </div>
            <br>
            <!-- ROW 3 MOD CONTIENE PRODUCTO-->
            <div class="row">
              <div class="col-lg-12 col-xs-12">
                  <!-- small box -->
                  <div class="input-group">
                      <span class="input-group-addon">Producto</span>
                      <select class="form-control" id="prodSalm" name="prodSalm">
                      <option value="" selected disabled hidden>Seleccione el producto</option>
                      <?php
                          $objCtrProductoAll = new ProductoController();

                          if (gettype($objCtrProductoAll -> getSearchAllProducto()) == 'boolean') {
                          echo '
                              <option value="1">No hay datos que mostrar</option>
                          ';  
                          } else {
                          foreach ($objCtrProductoAll -> getSearchAllProducto() as $key => $value) {
                              echo '
                              <option value='. $value["idProducto"] .'>'.$value["idProducto"]. "- " .$value["descripProducto"] .'</option>
                              ';
                              }
                          }
                      ?>
                      </select>
                  </div>
              </div>
            </div>
          </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button class="btn btn-google bg-blue" type="submit" onclick="validateSalidaMod(event)">
            <i class="glyphicon glyphicon-ok-sign"></i> Guardar
          </button>
          <?php
            if (isset($_POST['fechaSalm'])) {
              $objCtrSalida = new SalidaController();
              $objCtrSalida -> setUpdateSalida($_POST['icodeSalidam'], $_POST['fechaSalm'], $_POST['cantSalm'], $_POST['valTotm'], $_POST['clienSalm'],$_POST['prodSalm']);
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
    let activarIcon = document.getElementById('claseSalida');
    activarIcon.classList.add('active');
  </script>
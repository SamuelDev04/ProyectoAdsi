<input type="hidden" id="nomEnt" name="nomEnt">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Entradas
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="glyphicon glyphicon-home"></i> Home</a></li>
        <li><a href="#"><i class="glyphicon glyphicon-user"></i>Entradas</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Entrada de Productos</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        
      <div class="box-body">  
      <form method="POST" id="formuEntrada">

          <!-- ROW 1 -->
            <div class="row">
              <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="input-group">
                  <span class="input-group-addon">Nombre Entrada</span>
                  <input id="nomEnt" name="nomEnt" type="text" class="form-control">
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="input-group">
                  <span class="input-group-addon">IdDetalle Entrada</span>
                  <input id="detEnt" name="detEnt" type="number" class="form-control">
                </div>
              </div>
            </div>
          
          <br>
          <!-- ROW 2 -->
            <div class="row">
              <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="input-group">
                  <span class="input-group-addon">Fecha Entrada</span>
                  <input id="fechEnt" name="fechEnt" type="number" class="form-control">
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="input-group">
                  <span class="input-group-addon">Cantidad Entrada</span>
                  <input id="cantEnt" name="cantEnt" type="number" class="form-control">
                </div>
              </div>
              <!-- ./col -->
            </div>
          <br>
          
        <!-- /.box-body -->

        <div class="box-footer">
          <button class="btn btn-app bg-blue" type="submit" onclick="validateEntrada(event)">
            <i class="fa fa-save"></i> Guardar
          </button>
          <button class="btn btn-app bg-gray" type="submit" onclick="getGenerarReporteEntrada(event)">
            <i class="glyphicon glyphicon-list-alt"></i> Reporte
          </button>
        </div>
        <!-- /.box-footer-->
      </form>
      </div>
      <?php
        if (isset($_POST['nomEnt'])){
          $objCtrEntrada = new EntradaController();
          $objCtrEntrada -> setInsertEntrada($_POST['nomEnt'], $_POST['detEnt'], $_POST['fechEnt'], $_POST['cantEnt']);
        }
      ?>
      
    </div>
      <!-- /.box -->

    <!-- Otro box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Entradas</h3>
        
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
                  <th class="text-center">Fecha</th>
                  <th class="text-center">Cantidad</th>
                  <th class="text-center">Precio</th>
                  <th class="text-center">IdProveedor</th>
                  <th class="text-center">IdProducto</th>
                  <th class="text-center">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <form action="" method="post">
                  <?php

                    $objCtrEntradaAll = new EntradaController();
                    if (gettype($objCtrEntradaAll -> getSearchAllEntrada()) == 'boolean') {
                      echo '
                      <tr>
                        <td colspan = "5">No hay datos que mostrar</td>
                      </tr>';  
                    } else {
                      foreach ($objCtrEntradaAll -> getSearchAllEntrada() as $key => $value) {
                        echo '
                        <tr>
                          <td class="text-center">'. $value["idDetEntrada"] .'</td>
                          <td class="text-center">'. $value["fechaEntrada"] .'</td>
                          <td class="text-center">'. $value["cantProEntrada"] .'</td>
                          <td class="text-center">'. $value["precioEntrada"] .'</td>
                          <td class="text-center">'. $value["idProveedor"] .'</td>
                          <td class="text-center">'. $value["idProducto"] .'</td>
                          <td class="text-center">
                            <button class="btn btn-social-icon btn-google" onclick="eraseEntrada(this.parentElement.parentElement)"><i class="glyphicon glyphicon-trash"></i></button>
                            <button class="btn btn-social-icon bg-blue" onclick="getDataEntrada(this.parentElement.parentElement)" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil-square-o"></i></button>
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
          <h4 class="modal-title">Modificar entrada</h4>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
        <form method="POST" id="modifiEntrada">
          <input type="hidden" name="idEntradam" id="idEntradam">
        <!-- ROW 1 -->
          <div class="row">
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="input-group">
                <span class="input-group-addon">Fecha Entrada</span>
                <input id="fechaEntradam" name="fechaEntradam" type="date" class="form-control">
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="input-group">
                <span class="input-group-addon">CantidadProEnt</span>
                <input id="cantProEntradam" name="cantProEntradam" type="number" class="form-control">
              </div>
            </div>
          </div>
          <br>
        <!-- ROW 2 -->
          <div class="row">
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="input-group">
                <span class="input-group-addon">Precio Entrada</span>
                <input id="precioEntm" name="precioEntm" type="number" class="form-control">
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-xs-6">
              <!-- small box -->
              <div class="input-group">
                <span class="input-group-addon">Id Proveedor</span>
                <input id="idProveedorm" name="idProveedorm" type="number" class="form-control">
              </div>
            </div>
          </div>
          <br>
        
        <!-- ROW 3 -->
            <div class="row">
              <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="input-group">
                  <span class="input-group-addon">Id Producto</span>
                  <input id="idProductom" name="idProductom" type="number" class="form-control">
                </div>
              </div>
            </div>
          <br>
        </form>
        </div>


        <!-- Modal footer -->
        <div class="modal-footer">
          <button class="btn btn-google bg-blue" type="submit" onclick="validateModEntrada(event)">
            <i class="glyphicon glyphicon-ok-sign"></i> Guardar
          </button>
          <?php
            if (isset($_POST['idEntradam'])){
              $objCtrEntrada= new EntradaController();
              $objCtrEntrada -> setUpdateEntrada($_POST['idEntradam'], $_POST['fechaEntradam'], $_POST['cantProEntradam'], $_POST['precioEntradam'], $_POST['idProveedorm'], $_POST['idProductom']);
            }
          ?>
          <button type="button" class="btn btn-google bg-red" data-dismiss="modal">
          <i class="glyphicon glyphicon-remove-sign"></i> Cerrar
          </button>
        </div>

      </div>
    </div>
  </div>
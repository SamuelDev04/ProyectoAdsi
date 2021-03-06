<input type="hidden" id="icode" name="icode">
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Tipo productos
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
        <li><a href="#"><i class="glyphicon glyphicon-th-list"></i> Tipo productos</a></li>
      </ol>
    </section>

    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Ingreso de tipo de productos</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        
      <div class="box-body">  
      <form method="POST" id="formuTipoPro">

          <!-- ROW 1 -->
            <div class="row">
              <div class="col-lg-12 col-xs-12">
                <div class="input-group">
                  <span class="input-group-addon">Descripción</span>
                  <input id="idescrip" name="idescrip" type="text" class="form-control">
                </div>
              </div>
            </div>
          <br>

        <div class="box-footer">
          <button class="btn btn-app bg-blue" type="submit" onclick="validateTipoPro(event)">
            <i class="fa fa-save"></i> Guardar
          </button>
          <button class="btn btn-app bg-gray" type="submit" onclick="getGenerarReporteTipoPro(event)">
            <i class="glyphicon glyphicon-list-alt"></i> Reporte
          </button>
        </div>
      </form>
      </div>
      <?php
        if (isset($_POST['idescrip'])){
          $objCtrTipoPro = new TipoProController();
          $objCtrTipoPro -> setInsertarTipoProducto($_POST['idescrip']);
        }
      ?>

    </div>

    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Tipos de producto</h3>
        
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
                  <th class="text-center">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <form action="" method="post">
                  <?php
                    $objCtrTipoProAll = new TipoProController();
                    if (gettype($objCtrTipoProAll -> getSearchAllTipoProducto()) == 'boolean') {
                      echo '
                      <tr>
                        <td colspan = "5">No hay datos que mostrar</td>
                      </tr>';  
                    } else {
                      foreach ($objCtrTipoProAll -> getSearchAllTipoProducto() as $key => $value) {
                        if ($_SESSION['rol'] == 1) {
                          echo '
                          <tr>
                            <td class="text-center">'. $value["idTipoProducto"] .'</td>
                            <td class="text-center">'. $value["descripcion"] .'</td>
                            <td class="text-center">
                              <button class="btn btn-social-icon btn-google" onclick="eraseTipoProducto(this.parentElement.parentElement)"><i class="glyphicon glyphicon-trash"></i></button>
                              <button class="btn btn-social-icon bg-blue" onclick="getDataTipoProducto(this.parentElement.parentElement)" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil-square-o"></i></button>
                            </td>
                          </tr>';
                          } else {
                            echo '
                            <tr>
                              <td class="text-center">'. $value["idTipoProducto"] .'</td>
                              <td class="text-center">'. $value["descripcion"] .'</td>
                              <td class="text-center">
                                <button class="btn btn-social-icon bg-blue" onclick="getDataTipoProducto(this.parentElement.parentElement)" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil-square-o"></i></button>
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
          <h4 class="modal-title">Modificar tipo producto</h4>
        </div>

        <div class="modal-body">
        <form method="POST" id="modifiTipoPro">
          <input type="hidden" name="icodeTipoProm" id="icodeTipoProm">
        <!-- ROW 1 -->
          <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="input-group">
                  <span class="input-group-addon">Descripción</span>
                  <input id="idescripm" name="idescripm" type="text" class="form-control">
                </div>
            </div>
          </div>
        <br>
        </form>
        </div>

        <div class="modal-footer">
          <button class="btn btn-google bg-blue" type="submit" onclick="validateModTipoPro(event)">
            <i class="glyphicon glyphicon-ok-sign"></i> Guardar
          </button>
            <?php
                if (isset($_POST['idescripm'])){
                $objCtrTipoPro = new TipoProController();
                $objCtrTipoPro -> setUpdateTipoProducto($_POST['icodeTipoProm'] ,$_POST['idescripm']);
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
    let activarIcon = document.getElementById('claseTipoProducto');
    activarIcon.classList.add('active');
  </script>
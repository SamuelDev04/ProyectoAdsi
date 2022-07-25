  <input type="hidden" id="nomEnt" name="nomEnt">
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          Entradas
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
          <li><a href="#"><i class="glyphicon glyphicon-save"></i>Entradas</a></li>
        </ol>
      </section>

      <section class="content">
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
                  <div class="input-group">
                    <span class="input-group-addon">Fecha Entrada</span>
                    <input id="fechaEnt" name="fechaEnt" type="date" class="form-control">
                  </div>
                </div>
                <div class="col-lg-6 col-xs-6">
                  <div class="input-group">
                    <span class="input-group-addon">Cantidad Entrada</span>
                    <input id="cantidadEnt" name="cantidadEnt" type="number" class="form-control">
                  </div>
                </div>
              </div>
            
            <br>

            <!-- ROW 2 -->
              <div class="row">
                <div class="col-lg-6 col-xs-6">
                  <div class="input-group">
                    <span class="input-group-addon">Precio Entrada</span>
                    <input id="precioEnt" name="precioEnt" type="number" class="form-control">
                  </div>
                </div>
                <div class="col-lg-6 col-xs-6">
                  <div class="input-group">
                      <span class="input-group-addon">Proveedor</span>
                      <select class="form-control" id="proveedorEnt" name="proveedorEnt">
                          <option value="" selected disabled hidden>Seleccione el Proveedor</option>
                          <?php
                              $objCtrProveedorAll = new ProveedorController();
  
                              if (gettype($objCtrProveedorAll -> getSearchAllProveedor()) == 'boolean') {
                              echo '
                                  <option value="1">No hay datos que mostrar</option>
                              ';  
                              } else {
                              foreach ($objCtrProveedorAll -> getSearchAllProveedor() as $key => $value) {
                                  echo '
                                  <option value='. $value["idProveedor"] .'>'.$value["idProveedor"]. "- " .$value["nombre"] .'</option>
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
                  <div class="input-group">
                      <span class="input-group-addon">Producto</span>
                      <select class="form-control" id="prodEnt" name="prodEnt">
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
            <button class="btn btn-app bg-blue" type="submit" onclick="validateEntrada(event)">
              <i class="fa fa-save"></i> Guardar
            </button>
            <button class="btn btn-app bg-gray" type="submit" onclick="getGenerarReporteEntrada(event)">
              <i class="glyphicon glyphicon-list-alt"></i> Reporte
            </button>
          </div>
        </form>
        </div>
        <?php
          if (isset($_POST['fechaEnt'])){
            $objCtrEntrada = new EntradaController();
            $objCtrEntrada -> setInsertEntrada($_POST['fechaEnt'], $_POST['cantidadEnt'], $_POST['precioEnt'], $_POST['proveedorEnt'], $_POST['prodEnt']);
            $objCtrEntrada -> setUpdateMercancia($_POST['prodEnt'], $_POST['cantidadEnt']);
          }
        ?>
        
        </div>

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
                  <th class="text-center">Proveedor</th>
                  <th class="text-center">Producto</th>
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
                        if ($_SESSION['rol'] == 1) {
                          echo '
                          <tr>
                              <td class="text-center">'. $value["idDetEntrada"] .'</td>
                              <td class="text-center">'. $value["fechaEntrada"] .'</td>
                              <td class="text-center">'. $value["cantProEntrada"] .'</td>
                              <td class="text-center">'. $value["precioEntrada"] .'</td>
                              <td class="text-center">'. $value["nombre"] .'</td>
                              <td class="text-center">'. $value["descripProducto"] .'</td>
                              <td class="text-center">
                              <button class="btn btn-social-icon btn-google" onclick="eraseEntrada(this.parentElement.parentElement)"><i class="glyphicon glyphicon-trash"></i></button>
                              <button class="btn btn-social-icon bg-blue" onclick="getDataEntrada(this.parentElement.parentElement)" data-toggle="modal" data-target="#myModal"><i class="fa fa-pencil-square-o"></i></button>
                              </td>
                            </tr>'; 
                        } else {
                          echo '
                          <tr>
                            <td class="text-center">'. $value["idDetEntrada"] .'</td>
                            <td class="text-center">'. $value["fechaEntrada"] .'</td>
                            <td class="text-center">'. $value["cantProEntrada"] .'</td>
                            <td class="text-center">'. $value["precioEntrada"] .'</td>
                            <td class="text-center">'. $value["nombre"] .'</td>
                            <td class="text-center">'. $value["descripProducto"] .'</td>
                            <td class="text-center">No hay acciones</td>
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
            <h4 class="modal-title">Modificar entrada</h4>
          </div>

          <div class="modal-body">
          <form method="POST" id="modifiEntrada">
            <input type="hidden" name="idEntradam" id="idEntradam">
          <!-- ROW 1 -->
            <div class="row">
              <div class="col-lg-6 col-xs-6">
                <div class="input-group">
                  <span class="input-group-addon">Fecha Entrada</span>
                  <input id="fechaEntradam" name="fechaEntradam" type="date" class="form-control">
                </div>
              </div>
              <div class="col-lg-6 col-xs-6">
                <div class="input-group">
                  <span class="input-group-addon">Cantidad Entrada</span>
                  <input id="cantidadEntm" name="cantidadEntm" type="number" class="form-control">
                </div>
              </div>
            </div>
            <br>
            <!-- ROW 2 -->
            <div class="row">
              <div class="col-lg-6 col-xs-6">
                <div class="input-group">
                  <span class="input-group-addon">Precio Entrada</span>
                  <input id="precioEntm" name="precioEntm" type="text" class="form-control">
                </div>
              </div>
              <div class="col-lg-6 col-xs-6">
                <div class="input-group">
                    <span class="input-group-addon">Proveedor</span>
                    <select class="form-control" id="proveedorEntm" name="proveedorEntm">
                        <option value="" selected disabled hidden>Seleccione el Proveedor</option>
                        <?php
                            $objCtrProveedorAll = new ProveedorController();

                            if (gettype($objCtrProveedorAll -> getSearchAllProveedor()) == 'boolean') {
                            echo '
                                <option value="1">No hay datos que mostrar</option>
                            ';  
                            } else {
                            foreach ($objCtrProveedorAll -> getSearchAllProveedor() as $key => $value) {
                                echo '
                                <option value='. $value["idProveedor"] .'>'.$value["idProveedor"]. "- " .$value["nombre"] .'</option>
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
                <div class="input-group">
                    <span class="input-group-addon">Producto</span>
                    <select class="form-control" id="prodEntm" name="prodEntm">
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
          </form>
          </div>

          <div class="modal-footer">
            <button class="btn btn-google bg-blue" type="submit" onclick="validateModEntrada(event)">
              <i class="glyphicon glyphicon-ok-sign"></i> Guardar
            </button>
            <?php
              if (isset($_POST['idEntradam'])){
                $objCtrEntrada= new EntradaController();
                $objCtrEntrada -> setUpdateEntrada($_POST['idEntradam'], $_POST['fechaEntradam'], $_POST['cantidadEntm'], $_POST['precioEntm'], $_POST['proveedorEntm'], $_POST['prodEntm']);
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
      let activarIcon = document.getElementById('claseEntrada');
      activarIcon.classList.add('active');
    </script>
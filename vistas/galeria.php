<?php
require 'header.php';
?>
<!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
            <div class="row">
              <div class="col-md-12">
                  <div class="box">
                    <div class="box-header with-border">
                          <h1 class="box-title">Carrito</h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                    <!-- PRUEBAS GALERIA -->
                    <div class="table-arts">
                    		<?php
                      		    require '../config/conexion.php';
                      		    $consulta = "SELECT * FROM producto";
                      		    //$consulta ="SELECT * FROM detalle_producto INNER JOIN producto ON detalle_producto.id_producto=producto.id_producto";
                          		$result = mysqli_query($conexion,$consulta);
                          		//para imprimir los datos
                          		while ($f = mysqli_fetch_array($result)) {
                          		    $nombre = $f['nombre_producto'];
                          		    $imagen = $f['imagen_producto'];
                          		    //$precio = $f['Precio_Unitario'];
                          		    $id = $f['id_producto'];
                      		?>
                      <div class="art">
                       <div class="cap-over">
                         <a href="carrito.php" class="btn btn-success fa fa-shopping-cart"></a>
                       </div> 
                       <div class="cap-image">
                         <img src="../public/img/<?php echo $imagen; ?>" alt="">
                       </div>
                       <div class="info">
                         <p><?php echo $nombre; ?></p>
                          <!--<p>celular</p>-->
                         <div class="foot-info">
                           <!--<p>MX$5465</p>-->
                           <a href="detalle2.php?id=<?php echo $id; ?>" class="btn btn-warning">Detalles</a>
                         </div>
                       </div>
                      </div>   
                      <!--cierra el while de la galeria-->
                          <?php } 
                          ?>  
                    </div>
                    <!-- FIN PRUEBAS GALERIA -->
                    </div>
                     
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
  <?php
  require 'footer.php';
  ?>

    

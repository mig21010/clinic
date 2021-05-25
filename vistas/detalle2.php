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
                              $consulta = "SELECT * FROM producto WHERE id_producto=".$_GET['id']."";
                              $result = mysqli_query($conexion,$consulta);
                              //para imprimir los datos
                              while ($f = mysqli_fetch_array($result)) {
                                  $nombre = $f['nombre_producto'];
                                  $imagen = $f['imagen_producto'];
                                  $descripcion = $f['descripcion'];
                                  //$precio = $f['Precio_Unitario'];
                                  $id = $f['id_producto'];
                          ?>
                      <div class="art-detalle"> 
                       <div class="cap-image">
                         <img src="../public/img/<?php echo $imagen; ?>" alt="">
                       </div>
                       <div class="info">
                         <p><?php echo $nombre; ?></p>
                         <p><?php echo $descripcion; ?></p>

                             <p>Seleccione una presentación del producto:</p>
                                <p>Presentación
                                  <select class="infor" id="presentaciones">
                                    <option value="0" disabled selected="selected">Selección</option>
                                    <?php
                                                
                                      $consulta2 = "SELECT * FROM `detalle_producto` INNER JOIN producto ON detalle_producto.id_producto=producto.id_producto WHERE producto.id_producto=".$_GET['id']."";
                                      $result = mysqli_query($conexion,$consulta2);
                                                  
                                      while ($valores = mysqli_fetch_array($result)) {
                                                    
                                        echo '<option value="'.$valores['id_detalle'].'">'.$valores['presentacion'].'</option>';
                                      }
                                    ?>
                                  </select>

                                  

                         <div class="foot-info" id="precios-container">
                           <p>Precio Clinica MX$</p>
                           <p>Precio Publico MX$</p>
                           <p>Precio Cosmetologa MX$</p>
                           <p>Precio Promoción MX$</p>
                           <a href="carrito.php?id=<?php echo $id; ?>" class="btn">Añadir</a>
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

<script language="javascript">
  $('#presentaciones').change(function() {
    var idDetalle = this.value;

    $.get('../js/consultar_precios.php',{
      Id_Detalle:idDetalle
    }, function(respuesta){
      respuesta = JSON.parse(respuesta);
      var parrafos = $('#precios-container p').toArray();
      parrafos[0].innerHTML = 'Precio Clinica MXN $ ' + respuesta["precio"];
      parrafos[1].innerHTML = 'Precio Publico MXN $ ' + respuesta["precio2"];
      parrafos[2].innerHTML = 'Precio Cosmetologa MXN $ ' + respuesta["precio3"];
      parrafos[3].innerHTML = 'Precio Promoción MXN $ ' + respuesta["precio4"];
    });
  });
</script>
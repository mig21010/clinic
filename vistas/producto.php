<?php
ob_start();
session_start();
if (!isset($_SESSION["idusuario"]))
{
  header("Location: login.html");
}
else
{
require 'header.php';
if($_SESSION['almacen']==1)
{
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
                          <h1 class="box-title">Productos <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                    <table id="tblistado" class="table table-striped table-bordered table-condensed table-hover">
                      <thead>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Imagen del Producto</th>
                        <th>Opciones</th>
                      </thead>
                      <tbody>
                        
                      </tbody>
                      <tfoot>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Imagen del Producto</th>
                        <th>Opciones</th>
                      </tfoot>
                    </table>
                        
                    </div>
                     <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                         <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Nombre:</label>
                          <input type="hidden" name="idproducto" id="idproducto">
                          <input type="text" name="nombre" id="nombre" maxlength="100"
                          placeholder="Nombre" class="form-control">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Descripción:</label>
                          <input type="text" name="descripcion" id="descripcion" maxlength="255"
                          placeholder="Descripción" class="form-control">
                        </div>
                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Imagen:</label>
                        <input type="file" name="imagen" id="imagen" class="form-control">
                        <input type="hidden" name="imagenactual" id="imagenactual">
                        <img src="" width="150px" height="120px" id="imagenmuestra">
                      </div>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <button class="btn btn-primary" type="submit" id="btnGuardar"><i class="fa fa-save"></i>Guardar</button>
                         <button class="btn btn-danger" onclick="cancelarform()" type="button"><i class="fa fa-arrow.circle-left"></i>Cancelar</button>
                        </div>
                        </form>
                    </div>
                    <!--Fin centro -->
                  </div><!-- /.box -->
              </div><!-- /.col -->
          </div><!-- /.row -->
      </section><!-- /.content -->

    </div><!-- /.content-wrapper -->
  <!--Fin-Contenido-->
  <?php
}
else{
  require 'noacceso.php';
}
  require 'footer.php';
  ?>
<script type="text/javascript" src="scripts/producto.js"></script>
<?php 
}
ob_end_flush();
 ?>
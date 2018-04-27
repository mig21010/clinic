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
                          <h1 class="box-title">Detalle del producto <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                    <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                      <thead>
                        <th>Producto</th>
                        <th>Seccion</th>
                        <th>Categoria</th>
                        <th>Presentación</th>
                        <th>Precio Clínica</th>
                        <th>Precio Publico</th>
                        <th>Precio Cosmetologa</th>
                        <th>Precio Promocion</th>
                        <th>Stock</th>
                        <th>Opciones</th>
                      </thead>
                      <tbody>
                        
                      </tbody>
                      <tfoot>
                        <th>Producto</th>
                        <th>Seccion</th>
                        <th>Categoria</th>
                        <th>Presentación</th>
                        <th>Precio Clínica</th>
                        <th>Precio Publico</th>
                        <th>Precio Cosmetologa</th>
                        <th>Precio Promocion</th>
                        <th>Stock</th>
                        <th>Opciones</th>
                      </tfoot>
                    </table>
                        
                    </div>
                     <div class="panel-body" style="height: 400px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                         <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Presentacion:</label>
                          <input type="hidden" name="iddetalle" id="iddetalle">
                          <input type="text" name="presentacion" id="presentacion" maxlength="100"
                          placeholder="Presentación" class="form-control">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Precio Clínica:</label>
                          <input type="number" name="precioclinica" id="precioclinica" maxlength="11"
                          class="form-control">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Precio Publico:</label>
                          <input type="number" name="preciopublico" id="preciopublico" maxlength="11"
                          class="form-control">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Precio Costetologa:</label>
                          <input type="number" name="preciocostetologa" id="preciocostetologa" maxlength="11"
                          class="form-control">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Precio Promoción:</label>
                          <input type="number" name="preciopromocion" id="preciopromocion" maxlength="11"
                          class="form-control">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Stock:</label>
                          <input type="number" name="stock" id="stock" maxlength="11"
                          class="form-control">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Producto(*):</label>
                        <select id="idproducto" name="idproducto" class="form-control" data-live-search="true" required></select>
                      </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Sección(*):</label>
                        <select id="idseccion" name="idseccion" class="form-control" data-live-search="true" required></select>
                      </div>
                      <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Categoria(*):</label>
                        <select id="idcategoria" name="idcategoria" class="form-control" data-live-search="true" required></select>
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
<script type="text/javascript" src="scripts/detalle.js"></script>
<?php 
}
ob_end_flush();
 ?>
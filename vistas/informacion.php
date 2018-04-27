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

if($_SESSION['registro']==1)
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
                          <h1 class="box-title">Información Personal <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                    <table id="tblistado" class="table table-striped table-bordered table-condensed table-hover">
                      <thead>
                        <th>Primer Nombre</th>
                        <th>Segundo Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Telefono</th>
                        <th>Opciones</th>
                      </thead>
                      <tbody>
                        
                      </tbody>
                      <tfoot>
                        <th>Primer Nombre</th>
                        <th>Segundo Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Telefono</th>
                        <th>Opciones</th>
                      </tfoot>
                    </table>
                        
                    </div>
                     <div class="panel-body" style="height: 500px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                         <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Primer Nombre:</label>
                          <input type="hidden" name="idusuarioinfo" id="idusuarioinfo">
                          <input type="text" name="primernombre" id="primernombre" maxlength="100"
                          placeholder="Nombre" class="form-control">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Segundo Nombre:</label>
                          <input type="text" name="segundonombre" id="segundonombre" maxlength="100"
                          placeholder="Segundo Nombre" class="form-control">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Apellido Paterno:</label>
                          <input type="text" name="apellidopaterno" id="apellidopaterno" maxlength="100"
                          placeholder="Apellido Paterno" class="form-control">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Apellido Materno:</label>
                          <input type="text" name="apellidomaterno" id="apellidomaterno" maxlength="100"
                          placeholder="Apellido Materno" class="form-control">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Fecha de Nacimiento:</label>
                          <input type="date" name="fecha" id="fecha" class="form-control">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                          <label>Telefono:</label>
                          <input type="text" name="telefono" id="telefono" maxlength="100"
                          placeholder="Telefono" class="form-control">
                        </div>
                        <!-- <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <label>Usuario(*):</label>
                          <select id="idusuario" name="idusuario" class="form-control" data-live-search="true" required></select>
                         </div> -->

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
<script type="text/javascript" src="scripts/informacion.js"></script>
<?php 
}
ob_end_flush();
 ?> 
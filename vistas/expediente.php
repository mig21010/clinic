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

if($_SESSION['expedientes']==1)
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
                          <h1 class="box-title">Expediente <button class="btn btn-success" id="btnagregar" onclick="mostrarform(true)"><i class="fa fa-plus-circle"></i> Agregar</button></h1>
                        <div class="box-tools pull-right">
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <!-- centro -->
                    <div class="panel-body table-responsive" id="listadoregistros">
                    <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                      <thead>
                        <th>Usuario</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Opciones</th>
                        <th>Estado</th>
                      </thead>
                      <tbody>
                        
                      </tbody>
                      <tfoot>
                        <th>Usuario</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Opciones</th>
                        <th>Estado</th>
                      </tfoot>
                    </table>
                        
                    </div>
                     <div class="panel-body" style="height: 2550px;" id="formularioregistros">
                        <form name="formulario" id="formulario" method="POST">
                         <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <label>Usuario:</label>
                          <input type="hidden" name="idexpediente" id="idexpediente">
                          <select id="idusuario" name="idusuario" class="form-control" data-live-search="true" required></select>
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-8 col-xs-12">
                          <label>¿Padece alguna enfermedad?:</label>
                          <label>Sí</label>
                          <input type="radio" name="pregunta1" id="pregunta1" value="si">
                          <label>No</label>
                          <input type="radio" name="pregunta1" id="pregunta1" value="no">
                        </div>
                        <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <label>¿Cuál?:</label>
                          <input type="text" name="pregunta2" id="pregunta2" class="form-control" placeholder="Indica tu enfermedad">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <label>¿Toma algún medicamento?:</label>
                          <label>Sí</label>
                          <input type="radio" name="pregunta3" id="pregunta3" value="si">
                          <label>No</label>
                          <input type="radio" name="pregunta3" id="pregunta3" value="no">
                        </div>
                         <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <label>¿Cuáles?:</label>
                          <input type="text" name="pregunta4" id="pregunta4" class="form-control" placeholder="Indica los medicamentos">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <label>¿Padece algún tipo de alergia?:</label>
                          <label>Sí</label>
                          <input type="radio" name="pregunta5" id="pregunta5" value="si">
                          <label>No</label>
                          <input type="radio" name="pregunta5" id="pregunta5" value="no">
                        </div>
                        <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <label>¿Cuál?:</label>
                          <input type="text" name="pregunta6" id="pregunta6" class="form-control" placeholder="Indica el tipo de alergia">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <label>¿Estás embarazada o en período de actancia?:</label>
                          <label>Sí</label>
                          <input type="radio" name="pregunta7" id="pregunta7" value="si">
                          <label>No</label>
                          <input type="radio" name="pregunta7" id="pregunta7" value="no">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <label>¿Usa lentes de contacto?:</label>
                          <label>Sí</label>
                          <input type="radio" name="pregunta8" id="pregunta8" value="si">
                          <label>No</label>
                          <input type="radio" name="pregunta8" id="pregunta8" value="no">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <label>¿Padeces o alguna vez pedeciste herpeslabial o bucal?:</label>
                          <label>Sí</label>
                          <input type="radio" name="pregunta9" id="pregunta9" value="si">
                          <label>No</label>
                          <input type="radio" name="pregunta9" id="pregunta9" value="no">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <label>La cicatrización es:</label>
                          <label>Buena</label>
                          <input type="radio" name="pregunta10" id="pregunta10" value="buena">
                          <label>Mala</label>
                          <input type="radio" name="pregunta10" id="pregunta10" value="mala">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <label>¿Te encuentras bajo tratamineto para desmanchar la piel?</label>
                          <label>Sí</label>
                          <input type="radio" name="pregunta11" id="pregunta11" value="si">
                          <label>No</label>
                          <input type="radio" name="pregunta11" id="pregunta11" value="no">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <label>Grosor de piel:</label>
                          <label>Delgada</label>
                          <input type="radio" name="a18" id="a18" value="delgada">
                          <label>Mediana</label>
                          <input type="radio" name="a18" id="a18" value="mediana">
                          <label>Gruesa</label>
                          <input type="radio" name="a18" id="a18" value="gruesa">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <label>Color de piel:</label>
                          <label>Blanca</label>
                          <input type="radio" name="a19" id="a19" value="blanca">
                          <label>Mediana</label>
                          <input type="radio" name="a19" id="a19" value="mediana">
                          <label>Morena</label>
                          <input type="radio" name="a19" id="a19" value="morena">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <label>Temperatura:</label>
                          <label>Fría</label>
                          <input type="radio" name="a20" id="a20" value="fria">
                          <label>Calida</label>
                          <input type="radio" name="a20" id="a20" value="calida">
                        </div>
                        <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <label>Subtono:</label>
                          <input type="text" name="a21" id="a21" class="form-control">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <label>Tiene tendencia a hiperpigmentar:</label>
                          <label>Sí</label>
                          <input type="radio" name="a22" id="a22" value="si">
                          <label>No</label>
                          <input type="radio" name="a22" id="a22" value="no">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <label>Umbral doloroso:</label>
                          <label>Bajo</label>
                          <input type="radio" name="a23" id="a23" value="bajo">
                          <label>Normal</label>
                          <input type="radio" name="a23" id="a23" value="normal">
                          <label>Alto</label>
                          <input type="radio" name="a23" id="a23" value="alto">
                        </div>
                        <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <label>Frente:</label>
                          <input type="text" name="a24" id="a24" class="form-control">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <label>Ojos:</label>
                          <label>Chicos</label>
                          <input type="radio" name="a25" id="a25" value="chicos">
                          <label>Medianos</label>
                          <input type="radio" name="a25" id="a25" value="medianos">
                          <label>Grandes</label>
                          <input type="radio" name="a25" id="a25" value="joven">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <label>Ojos:</label>
                          <label>Profundos</label>
                          <input type="radio" name="a26" id="a26" value="profundos">
                          <label>Normales</label>
                          <input type="radio" name="a26" id="a26" value="normales">
                          <label>Saltones</label>
                          <input type="radio" name="a26" id="a26" value="saltones">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <label>Umbral doloroso:</label>
                          <label>Ascendentes</label>
                          <input type="radio" name="a27" id="a27" value="ascendentes">
                          <label>Rectos</label>
                          <input type="radio" name="a27" id="a27" value="rectos">
                          <label>Descendentes</label>
                          <input type="radio" name="a27" id="a27" value="descendentes">
                        </div>
                        <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <label>Labios:</label>
                          <input type="text" name="a28" id="a28" class="form-control">
                        </div>
                        <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <label>Cejas:</label>
                          <input type="text" name="a29" id="a29" class="form-control">
                        </div>
                        <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <label>Parpados:</label>
                          <input type="text" name="a30" id="a30" class="form-control">
                        </div>
                        <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <label>Labios:</label>
                          <input type="text" name="a31" id="a31" class="form-control">
                        </div>
                        <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <label>Fecha:</label>
                          <input type="date" name="a32" id="a32" class="form-control">
                        </div>
                        <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
                          <label>Zona:</label>
                          <label>Cejas</label>
                          <input type="radio" name="a33" id="a33" value="cejas">
                          <label>Sombra/Luz</label>
                          <input type="radio" name="a33" id="a33" value="sombra">
                          <label>Parpados Superior</label>
                          <input type="radio" name="a33" id="a33" value="parapados">
                          <label>Parpados Inferior</label>
                          <input type="radio" name="a33" id="a33" value="parapados inferior">
                          <label>Labios</label>
                          <input type="radio" name="a33" id="a33" value="labios">
                        </div>
                        <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <label>Mezcla:</label>
                          <input type="text" name="a34" id="a34" class="form-control">
                        </div>
                        <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <label>Costo:</label>
                          <input type="text" name="a35" id="a35" class="form-control">
                        </div>
                        <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <label>Procedimineto:</label>
                          <input type="text" name="a36" id="a36" class="form-control">
                        </div>
                        <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <label>Zona:</label>
                          <input type="text" name="a37" id="a37" class="form-control">
                        </div>
                        <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <label>¿Cuántos trabajos tiene?</label>
                          <input type="text" name="a38" id="a38" class="form-control">
                        </div>
                        <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <label>Fecha del ultimo Trabajo:</label>
                          <input type="date" name="a39" id="a39" class="form-control">
                        </div>
                        <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <label>Diagnostico:</label>
                          <input type="text" name="a40" id="a40" class="form-control">
                        </div>
                        <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <label>Plan correctivo:</label>
                          <input type="text" name="a41" id="a41" class="form-control">
                        </div>
                        <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <label>Fecha:</label>
                          <input type="date" name="a42" id="a42" class="form-control">
                        </div>
                        <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <label>Procedimineto y zona:</label>
                          <input type="text" name="a43" id="a43" class="form-control">
                        </div>
                        <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <label>Mezcla:</label>
                          <input type="text" name="a44" id="a44" class="form-control">
                        </div>
                        <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <label>Observaciones:</label>
                          <input type="text" name="a45" id="a45" class="form-control">
                        </div>
                        <div class="form-group col-lg-8 col-md-8 col-sm-8 col-xs-12">
                          <label>Costo:</label>
                          <input type="text" name="a46" id="a46" class="form-control">
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
<script type="text/javascript" src="scripts/expediente.js"></script>
<?php 
}
ob_end_flush();
 ?> 
<?php

session_start();
require 'header.php';
    require '../config/conexion.php';
    //verificamos que exista la variable de sesion
    if (isset($_SESSION['carrito'])) {

        if (isset($_GET['id'])) { //por si queremos acceder directamente al carro no marque error

            //si exite, se guarda
            $arreglo=$_SESSION['carrito']; 
            $busca=false;
            $numero=0;
            //como guardamos en el arreglo, ahora lo recorremos
            for ($i=0; $i <count($arreglo) ; $i++) { 
                //verificamos que exista en el arreglo
                if ($arreglo[$i]['Id']==$_GET['id']) {
                    $busca=true;
                    //para saber la posicion en el arreglo donde esta el id
                    $numero=$i;
                }
            }
            if ($busca==true) {

                //incremenamos en 1 la Cantidad
                $arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
                //guardamos
                $_SESSION['carrito']=$arreglo;
            }else{//añadir al arreglo            $nombre="";
                $nombre="";
                $precio=0;
                $imagen="";
                //$consulta = ("SELECT * FROM detalle_producto WHERE id_producto= '".$_GET['id']."'");
                $consulta = ("SELECT * FROM `detalle_producto` INNER JOIN producto ON detalle_producto.id_producto=producto.id_producto WHERE producto.id_producto=".$_GET['id']."");
                $result = mysqli_query($conexion,$consulta) ;
                if (!$result) {
                    die("Error running $consulta: " . mysqli_error($conexion));
                }
                //para imprimir los datos
                while ($f = mysqli_fetch_array($result)) {
                    $nombre = $f['nombre_producto'];
                    $imagen = $f['imagen_producto'];
                    //$precio = $f['Precio_Unitario'];
                    $preciocli = $f['precio_clinica'];
                    $preciopub = $f['precio_publico'];
                    $preciocos = $f['precio_cosmetologa'];
                    $preciopro = $f['precio_promocion'];
                }
                //creamos un arreglo nuevo
                $arregloNuevo=array('Id' =>$_GET['id'],
                    'Nombre' =>$nombre,
                    'Precio Clinica' =>$preciocli,
                    'Precio Publico' =>$preciopub,
                    'Precio Cosmetologa' =>$preciocos,
                    'Precio Promo' =>$preciopro,
                    'Imagen' =>$imagen,
                    'Cantidad' =>1 );
                //agregamos el arreglo nuevo al arreglo anterior
                array_push($arreglo, $arregloNuevo);
                //guardamos
                $_SESSION['carrito']=$arreglo;
            }
        }

    }else{
        if (isset($_GET['id'])) {
            $nombre="";
            $precio=0;
            $imagen="";
            $consulta = ("SELECT * FROM `detalle_producto` INNER JOIN producto ON detalle_producto.id_producto=producto.id_producto WHERE producto.id_producto=".$_GET['id']."");
            $result = mysqli_query($conexion,$consulta) ;
            if (!$result) {
                die("Error running $consulta: " . mysqli_error($conexion));
            }
            //para imprimir los datos
            while ($f = mysqli_fetch_array($result)) {
                    $nombre = $f['nombre_producto'];
                    $imagen = $f['imagen_producto'];
                    //$precio = $f['Precio_Unitario'];
                    $preciocli = $f['precio_clinica'];
                    $preciopub = $f['precio_publico'];
                    $preciocos = $f['precio_cosmetologa'];
                    $preciopro = $f['precio_promocion'];
            }

            $arreglo[]=array('Id' =>$_GET['id'],
                    'Nombre' =>$nombre,
                    'Precio Clinica' =>$preciocli,
                    'Precio Publico' =>$preciopub,
                    'Precio Cosmetologa' =>$preciocos,
                    'Precio Promo' =>$preciopro,
                    'Imagen' =>$imagen,
                    'Cantidad' =>1 );
            $_SESSION['carrito']=$arreglo; 
        }
    }
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
                    <section class="sec-arts">
                    <?php
    
					    $total=0;
					    $total2=0;
					    $total3=0;
					    $total4=0;
					    //print_r($_SESSION['carrito']);
					        //print_r($_SESSION["carrito"]);
					    if (isset($_SESSION['carrito'])) {
					        $datos=$_SESSION['carrito'];
					        //echo "Count datos: " . count($datos);
					        $total=0;
					        for ($i=0; $i <count($datos) ; $i++) { 
					    ?>
					            <div class="carproducto">
					                <!-- <center>-->
					                <img src="../public/img/<?php echo $datos[$i]['Imagen']; ?>" alt=""><br/>
					                <!--<span><?php// echo $datos[$i]['Nombre']; ?></span><br/>
					                <span>Precio: $<?php// echo $datos[$i]['Precio']; ?></span><br/> -->
					                <p><?php echo $datos[$i]['Nombre']; ?></p>
					                <p>Precio Clinica: $<?php echo $datos[$i]['Precio Clinica']; ?></p>
					                <p>Precio Publico: $<?php echo $datos[$i]['Precio Publico']; ?></p>
					                <p>Precio Cosmetologa: $<?php echo $datos[$i]['Precio Cosmetologa']; ?></p>
					                <p>Precio Promocion: $<?php echo $datos[$i]['Precio Promo']; ?></p>
					                <span>Cantidad: 
					                    <input type="text" value="<?php echo $datos[$i]['Cantidad']; ?>"
					                    data-precio="<?php echo $datos[$i]['Precio Clinica']; ?>"
					                    data-precio2="<?php echo $datos[$i]['Precio Publico']; ?>"
					                    data-precio3="<?php echo $datos[$i]['Precio Cosmetologa']; ?>"
					                    data-precio4="<?php echo $datos[$i]['Precio Promo']; ?>"
					                    data-id="<?php echo $datos[$i]['Id']; ?>"
					                    class="cantidad"></input> 
					                </span>
					                <!--<span class="subtotal">Importe: $<?php //echo $datos[$i]['Cantidad']*$datos[$i]['Precio']; ?></span><br/>
					                <span class="iva">IVA: $<?php //echo ($datos[$i]['Cantidad']*$datos[$i]['Precio'])*0.16; ?></span><br/><br/><br/> -->
					                <p class="subtotal">Importe: $<?php echo $datos[$i]['Cantidad']*$datos[$i]['Precio Clinica']; ?></p>
					                <p class="subtotal">Importe2: $<?php echo $datos[$i]['Cantidad']*$datos[$i]['Precio Publico']; ?></p>
					                <p class="subtotal">Importe3: $<?php echo $datos[$i]['Cantidad']*$datos[$i]['Precio Cosmetologa']; ?></p>
					                <p class="subtotal">Importe4: $<?php echo $datos[$i]['Cantidad']*$datos[$i]['Precio Promo']; ?></p>

					                <a href="#" class="eliminar" data-id="<?php echo $datos[$i]['Id']; ?>">Cancelar</a>

					                <!--</center>-->
					            </div>
					            <?php        
								        //$total=(($datos[$i]['Cantidad']*$datos[$i]['Precio'])+(($datos[$i]['Cantidad']*$datos[$i]['Precio'])*0.16))+$total;
					            		$total=($datos[$i]['Cantidad']*$datos[$i]['Precio Clinica'])+$total;
					            		$total2=($datos[$i]['Cantidad']*$datos[$i]['Precio Publico'])+$total2;
					            		$total3=($datos[$i]['Cantidad']*$datos[$i]['Precio Cosmetologa'])+$total3;
					            		$total4=($datos[$i]['Cantidad']*$datos[$i]['Precio Promo'])+$total4;
								        } //cierre del for
								    }else{
								        echo '<h2>No se ha añadido ningun producto</h2>';
								    }
								    echo '<h3 class="total" id="total">Total Clinica: MXN$'.$total.'</h3>';
								    echo '<h3 class="total2" id="total2">Total Publico: MXN$'.$total2.'</h3>';
								    echo '<h3 class="total3" id="total3">Total Cosmetologa: MXN$'.$total3.'</h3>';
								    echo '<h3 class="total4" id="total4">Total Promocion: MXN$'.$total4.'</h3>';
								    //esto es para que el carro no aparezca cuando esta vacio
								    if ($total!=0) {
								       echo '<a href="venta.php" class="aceptar">Comprar</a>';
								    }
								          
								?>
								<a href="galeria.php" class="follow">Agregar otro producto</a>
							</section>
					                    
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
  <script type="text/javascript" src="../js/carro.js" ></script>
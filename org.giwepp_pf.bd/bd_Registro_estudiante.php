<?php
require_once '../org.giwepp_pf.bd/bdPersona.php';
$estudiantes = new bdPersona();
$todoEstudiantes = $estudiantes->seleccionarTodoEstudiante();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Estudiantes</title>

        <!-- BEGIN META -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="your,keywords">
        <meta name="description" content="Short explanation about this website">
        <!-- END META -->
        <!-- BEGIN STYLESHEETS -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
        <link type="text/css" rel="stylesheet" href="../libs/assets/css/theme-default/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="../libs/assets/css/theme-default/materialadmin.css?1425466319" />
        <link type="text/css" rel="stylesheet" href="../libs/assets/css/theme-default/font-awesome.min.css?1422529194" />
        <link type="text/css" rel="stylesheet" href="../libs/assets/css/theme-default/material-design-iconic-font.min.css?1421434286" />
        <link type="text/css" rel="stylesheet" href="../libs/assets/css/theme-default/libs/DataTables/jquery.dataTables.css?1423553989" />
        <link type="text/css" rel="stylesheet" href="../libs/assets/css/theme-default/libs/DataTables/extensions/dataTables.colVis.css?1423553990" />
        <link type="text/css" rel="stylesheet" href="../libs/assets/css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css?1423553990" />
        <link type="text/css" rel="stylesheet" href="../libs/assets/css/theme-default/libs/bootstrap-datepicker/datepicker3.css" />


        <script src="../libs/assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
        <script src="../libs/assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
        <script src="../libs/assets/js/libs/bootstrap/bootstrap.min.js"></script>
        <script src="../libs/assets/js/libs/spin.js/spin.min.js"></script>
        <script src="../libs/assets/js/libs/autosize/jquery.autosize.min.js"></script>
        <script src="../libs/assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
        <script src="../libs/assets/js/libs/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="../libs/assets/js/libs/jquery-validation/dist/additional-methods.min.js"></script>
        <script src="../libs/assets/js/libs/moment/moment.min.js" type="text/javascript"></script>
        <script src="../libs/assets/js/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
        <script src="../libs/assets/js/libs/DataTables/jquery.dataTables.min.js"></script>
        <script src="../libs/assets/js/libs/DataTables/extensions/ColVis/js/dataTables.colVis.min.js"></script>
        <script src="../libs/assets/js/libs/DataTables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>

        <script src="../libs/w3data.js" type="text/javascript"></script>

    </head>
    <body class="menubar-hoverable header-fixed ">


        <div w3-include-html="../org.giwepp_pf.vista/menuCabecera.html"></div>

        <div id="base">

            <div class="offcanvas">
            </div><!--end .offcanvas-->

            <div id="content">
                <section>

                    <div class="section-body contain-lg">


<?php

   session_start();
   if(!isset($_SESSION['nombre']))
   echo "<meta http-equiv='refresh' content='0;url=../login_2.php'>";
   include('conexion_bd.php');


  if(isset($_POST['Registra_estudiante']))
  {
    extract($_POST);
    if($txtNombrePersona!="" && $txtApellidoPaterno!="" && $txtApellidoMaterno!=""  && $txtFechaNac!="" && $txtCorreo!="" && $txtUsuario!="" && $txtContraseña!="" )

    {
      $conectar=Conexion();
      if(!$conectar)
        die();
      
      $Sql="select * from personas where u_nombre='".$txtNombrePersona."' and u_ape_pat='".$txtApellidoPaterno."' and u_ape_mat='".$txtApellidoMaterno."' " ;
      $resultado=mysql_query($Sql,$conectar);
      $reg=mysql_num_rows($resultado);
      if($reg!=0)
      {
        $persona=mysql_fetch_assoc($resultado);

        $id_persona_registrada_antes = $persona['id_persona'];

        echo "Una persona con el mismo nombre y apeidos ya se encuentra registrado: '".$txtNombrePersona."' '".$txtApellidoPaterno."' '".$txtApellidoMaterno."' " ;
      }
      else
      {
       

            $consulta = "INSERT INTO personas (u_nombre, u_ape_pat, u_ape_mat, u_fecha_nac, u_activo) VALUES
            ('".$txtNombrePersona."', '".$txtApellidoPaterno."', '".$txtApellidoMaterno."', '".$txtFechaNac."', 1) ";
            mysql_query($consulta);

            $Sql="select id_persona from personas where u_nombre ='".$txtNombrePersona."' and u_ape_pat='".$txtApellidoPaterno."' and u_ape_mat='".$txtApellidoMaterno."' " ;
            $resultado=mysql_query($Sql,$conectar);
            $persona_registrada=mysql_fetch_assoc($resultado);

             $id_persona_registrada_ahora = 0;

             $id_persona_registrada_ahora = $persona_registrada['id_persona'];

              $consulta = "INSERT INTO cuentas (id_dueño, c_correo, c_usuario, c_password, c_tipo_cuenta) VALUES
            ('".$id_persona_registrada_ahora."', '".$txtCorreo."', '".$txtUsuario."', '".$txtContraseña."', 2) ";
            mysql_query($consulta);

            //Se busca el registro de el estudiante

            $consulta_revisar = "SELECT personas.u_nombre, personas.u_ape_pat, personas.u_ape_mat, cuentas.c_usuario 
            FROM personas INNER JOIN cuentas ON personas.id_persona = cuentas.id_dueño WHERE cuentas.id_dueño = '".$id_persona_registrada_ahora."' " ;
            $resultado=mysql_query($consulta_revisar,$conectar);
            $registro=mysql_num_rows($resultado);

            
            if($registro!=0)
            {
            echo '<br>  <br>  <center> Exito al registrar al estudiante ';
            echo '<br> <br> Nombre completo: '.$txtNombrePersona.' '.$txtApellidoPaterno.' '.$txtApellidoMaterno.' ';
            echo '<br> <br> Cuenta o usuario: '.$txtUsuario.'. ';
            echo '<br> <br> Correo: '.$txtCorreo.'. ';
            echo '<br> <br> Contraseña: '.$txtContraseña.'. ';
            echo '<br> <br> <a href="../org.giwepp_pf.vista/vistaEstudiante.php"><span>Registrar a otro estudiante</span></a> </center>';
          //echo "<meta http-equiv='refresh' content='1;url=realizar_compra.php?num_compra=".$id_compra."&num_proveedor=".$id_proveedor."&precio_compra_prod=".$productos['p_precio_compra']."&precio_por_cantidad=".$cantidad."'>";

            }
           else
            {
             echo '<br>  <br>  <center> Error al registrar al estudiante, llame a soporte ' .$id_persona_registrada_ahora. ' ' .$persona['id_persona'] .'</center>';
            }
          
        }

         }
          mysql_close($conectar);
         }
         else
       {
        
         echo 'Faltan datos por ingresar';
         echo ' '.$txtNombrePersona. ' '.$txtApellidoPaterno.' '.$txtApellidoMaterno.' '.$txtFechaNac.' '.$txtCorreo.' '.$txtUsuario.' '.$txtContraseña.' ';
          
       }
  
  ?>



  
  </div><!--end .section-body -->
                </section>
            </div><!--end #content-->
            <!-- END CONTENT -->


            <div w3-include-html="../org.giwepp_pf.vista/menuBase.html"></div> 

            <script>
                w3IncludeHTML();
            </script>

        </div><!--end #base-->

        <script src="../libs/assets/js/core/source/App.js"></script>
        <script src="../libs/assets/js/core/source/AppNavigation.js"></script>
        <script src="../libs/assets/js/core/source/AppOffcanvas.js"></script>
        <script src="../libs/assets/js/core/source/AppCard.js"></script>
        <script src="../libs/assets/js/core/source/AppForm.js"></script>
        <script src="../libs/assets/js/core/source/AppNavSearch.js"></script>
        <script src="../libs/assets/js/core/source/AppVendor.js"></script>
        <script src="../libs/assets/js/core/demo/Demo.js"></script>
        <script src="../libs/assets/js/core/demo/DemoTableDynamic.js"></script>

    </body>
</html>

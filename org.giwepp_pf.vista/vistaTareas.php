<!DOCTYPE html>

<?php

include('../org.giwepp_pf.bd/bd_checar_persona.php');
if($_SESSION['user_type'] != 3){echo "<meta http-equiv='refresh' content='0;url=index.html'>";}
?>


<html lang="en">
    <head>
        <title>Tareas</title>

        <!-- BEGIN META -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="your,keywords">
        <meta name="description" content="Short explanation about this website">
        <!-- END META -->
        <!-- BEGIN STYLESHEETS -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
        <link type="text/css" rel="stylesheet" href="../libs/assets/css/theme-default/bootstrap.css?1422792965" />
        <link type="text/css" rel="stylesheet" href="../libs/assets/css/theme-default/materialadmin.css?1425466319" />
        <link type="text/css" rel="stylesheet" href="../libs/assets/css/theme-default/font-awesome.min.css?1422529194" />
        <link type="text/css" rel="stylesheet" href="../libs/assets/css/theme-default/material-design-iconic-font.min.css?1421434286" />
        <link type="text/css" rel="stylesheet" href="../libs/assets/css/theme-default/libs/DataTables/jquery.dataTables.css?1423553989" />
        <link type="text/css" rel="stylesheet" href="../libs/assets/css/theme-default/libs/DataTables/extensions/dataTables.colVis.css?1423553990" />
        <link type="text/css" rel="stylesheet" href="../libs/assets/css/theme-default/libs/DataTables/extensions/dataTables.tableTools.css?1423553990" />
        <link type="text/css" rel="stylesheet" href="../libs/assets/css/theme-default/libs/bootstrap-datepicker/datepicker3.css" />
        
        <link href="" rel="stylesheet" type="text/css"/>
        
        <script src="../libs/w3data.js" type="text/javascript"></script>




    </head>
    <body class="menubar-hoverable header-fixed ">


        <div w3-include-html="menuCabecera.html"></div>


        <!-- BEGIN BASE-->
        <div id="base">

            <!-- BEGIN OFFCANVAS LEFT -->
            <div class="offcanvas">
            </div><!--end .offcanvas-->
            <!-- END OFFCANVAS LEFT -->

            <!-- BEGIN CONTENT-->
            <div id="content">
                <section>

                    <div class="section-body contain-lg">

                        <!-- BEGIN BASIC VALIDATION -->
                        <div class="row">

                            <div class="col-lg-offset-1 col-md-8">
                                <h1 class="text-primary">Tarea </h1>
                            </div><!--end .col -->

                            <div class="col-lg-offset-1 col-md-10">
                                <form class="form form-validate floating-label" novalidate="novalidate" action="../org.giwepp_pf.controlador/agregarTarea.php" method="POST">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="txtTarea" name="txtTarea" required data-rule-minlength="2">
                                                <label for="txtTarea">Titulo de la tarea</label>
                                            </div>

                                            <input type="hidden" name="txtidProfesor" value=<?php echo $_SESSION['user_person'] ; ?>>

                                            <div class="form-group">
                                                <input type="text" class="form-control" id="txtDescripcionTarea" name="txtDescripcionTarea" required data-rule-minlength="2">
                                                <label for="txtDescripcionTarea">Descripción de la tarea</label>
                                            </div>
                                        

                                              <div class="form-group">  <label for="txtidGrupo"> Elija el grupo </label>
                                                <select name="txtidGrupo">

                                                <?php    
                                                  $conexion=conexion();  if(!$conexion)   die();
                                                  $consulta="select id_grupo, gr_nombre from grupos ";
                                                  $resultado=mysql_query($consulta,$conexion);
                                                  while($grupos=mysql_fetch_assoc($resultado))
                                                  {
                                                  ?>

                                                  <option value=<?php echo $grupos['id_grupo'] ?> ><?php echo $grupos['gr_nombre'] ?></option>

                                                  <?php 
                                                  }
                                                  mysql_close($conexion);
                                                  ?>
 
                                                  
                                                  </select>
                                              </div>


                                              <div class="form-group">  <label for="txtidMateria"> Elija la materia </label>
                                                <select name="txtidMateria">

                                                <?php    
                                                  $conexion=conexion();  if(!$conexion)   die();
                                                  $consulta="select id_materia, ma_nombre from materias ";
                                                  $resultado=mysql_query($consulta,$conexion);
                                                  while($materias=mysql_fetch_assoc($resultado))
                                                  {
                                                  ?>

                                                  <option value=<?php echo $materias['id_materia'] ?> ><?php echo $materias['ma_nombre'] ?></option>

                                                  <?php 
                                                  }
                                                  mysql_close($conexion);
                                                  ?>
 
                                                  
                                                  </select>
                                              </div>


                                            <div class="form-group">
                                                <div class="input-group date" id="demo-date">
                                                    <div class="input-group-content">
                                                        <input type="text" class="form-control" id="txtFechaEntrega" name="txtFechaEntrega">
                                                        <label>Fecha para entregar AAAA/MM/DD</label>
                                                    </div>
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div><!--end .form-group -->
                                           
                                            
                                            
                                            
                                        </div><!--end .card-body -->
                                        <div class="card-actionbar">
                                            <div class="card-actionbar-row">
                                                <button type="submit" class="btn btn-flat btn-primary ink-reaction">Agregar tarea</button>
                                            </div>
                                        </div><!--end .card-actionbar -->
                                    </div><!--end .card -->

                                </form>
                            </div><!--end .col -->
                        </div><!--end .row -->
                        <!-- END BASIC VALIDATION -->



                    </div><!--end .section-body -->
                </section>
            </div><!--end #content-->
            <!-- END CONTENT -->
            




            <div w3-include-html="menuBase.html"></div> 

            <script>
                w3IncludeHTML();
            </script>

        </div><!--end #base-->
        <!-- END BASE -->

        <!-- BEGIN JAVASCRIPT -->
        <script src="../libs/assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
        <script src="../libs/assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
        <script src="../libs/assets/js/libs/bootstrap/bootstrap.min.js"></script>
        <script src="../libs/assets/js/libs/spin.js/spin.min.js"></script>
        <script src="../libs/assets/js/libs/autosize/jquery.autosize.min.js"></script>
        <script src="../libs/assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
        <script src="../libs/assets/js/libs/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="../libs/assets/js/libs/jquery-validation/dist/additional-methods.min.js"></script>
        <script src="../libs/assets/js/core/source/App.js"></script>
        <script src="../libs/assets/js/core/source/AppNavigation.js"></script>
        <script src="../libs/assets/js/core/source/AppOffcanvas.js"></script>
        <script src="../libs/assets/js/core/source/AppCard.js"></script>
        <script src="../libs/assets/js/core/source/AppForm.js"></script>
        <script src="../libs/assets/js/core/source/AppNavSearch.js"></script>
        <script src="../libs/assets/js/core/source/AppVendor.js"></script>
        <script src="../libs/assets/js/core/demo/Demo.js"></script>
        <script src="../libs/assets/js/libs/bootstrap-datepicker/bootstrap-datepicker.js"></script>
        <!-- END JAVASCRIPT -->

    </body>
</html>

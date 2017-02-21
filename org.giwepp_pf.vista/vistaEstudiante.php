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
                                <h1 class="text-primary">Registro Estudiante</h1>
                            </div><!--end .col -->

                            <div class="col-lg-offset-1 col-md-10">
                                <form class="form form-validate floating-label" novalidate="novalidate" action="../org.giwepp_pf.bd/bd_Registro_estudiante.php" method="POST">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="txtNombrePersona" name="txtNombrePersona" required data-rule-minlength="2">
                                                <label for="txtNombrePersona">Nombre</label>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="txtApellidoPaterno" name="txtApellidoPaterno" required data-rule-minlength="2">
                                                <label for="txtApellidoPaterno">Apellido Paterno</label>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="txtApellidoMaterno" name="txtApellidoMaterno" required data-rule-minlength="2">
                                                <label for="txtApellidoMaterno">Apellido Materno</label>
                                            </div>

                                            <div class="form-group">
                                                <div class='input-group date' id='datetimepicker1'>
                                                    <div class="input-group-content">
                                                        <input type="text" class="form-control" id="txtFechaNac" name="txtFechaNac" required>
                                                        <label>Fecha de nacimiento</label>
                                                    </div>
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>

                                              <div class="form-group">
                                                <input type="mail" class="form-control" id="txtCorreo" name="txtCorreo" required data-rule-minlength="2">
                                                <label for="txtCorreo">Correo del estudiante</label>
                                            </div>

                                              <div class="form-group">
                                                <input type="text" class="form-control" id="txtUsuario" name="txtUsuario" required data-rule-minlength="2">
                                                <label for="txtUsuario">Usuario de cuenta</label>
                                            </div>

                                              <div class="form-group">
                                                <input type="password" class="form-control" id="txtContraseña" name="txtContraseña" required data-rule-minlength="2">
                                                <label for="txtContraseña">Contraseña de la cuenta</label>
                                            </div>

                                            <script type="text/javascript">
                                                $(function () {
                                                    $('#datetimepicker1').datepicker();
                                                });
                                            </script>
                                            
                                            <!--
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="txtUsuario" name="txtUsuario" required data-rule-minlength="2">
                                                <label for="txtUsuario">Usuario</label>
                                            </div>

                                            <div class="form-group">
                                                <input type="email" class="form-control" id="txtCorreo" name="txtCorreo" required>
                                                <label for="txtCorreo">Email</label>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" id="txtContrasenia" name="txtContrasenia" required data-rule-minlength="5">
                                                <label for="txtContrasenia">Password</label>
                                            </div>-->
                                            <!--end .form-group -->





                                        </div><!--end .card-body -->
                                        <div class="card-actionbar">
                                            <div class="card-actionbar-row">
                                                <button type="submit" class="btn btn-flat btn-primary ink-reaction" name="Registra_estudiante" value="Registra_estudiante">Agregar</button>
                                            </div>
                                        </div><!--end .card-actionbar -->
                                    </div><!--end .card -->

                                </form>
                            </div><!--end .col -->
                        </div><!--end .row -->
                        <!-- END BASIC VALIDATION -->






                        <div class="row">
                            <div class="col-md-12">
                                <h4>Datos generales de los estudiantes registrados en sistema</h4>
                            </div>
                            <div class="col-lg-12">

                                <div class="card">
                                    <div class="table-responsive">
                                        <table id="datatable1" class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="sort-numeric">ID Persona</th>
                                                    <th class="sort-alpha">Nombre</th>
                                                    <th colspan="2">Apellidos</th>
                                                    <th>Fecha Nacimiento</th>

                                                    <th>Fecha de Registro</th>
                                                    <th>Correo</th>
                                                    <th>Usuario</th>
                                                    <th>Contraseña</th>
                                                    <th>Estatus</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($todoEstudiantes as $row): ?>
                                                    <tr>
                                                        <td><?php echo $row['id_persona']; ?></td>
                                                        <td><?php echo $row['u_nombre']; ?></td>
                                                        <td><?php echo $row['u_ape_pat']; ?></td>
                                                        <td><?php echo $row['u_ape_mat']; ?></td>
                                                        <td><?php echo $row['u_fecha_nac']; ?></td>
                                                        <td><?php echo $row['u_fecha_reg']; ?></td>
                                                        <td><?php echo $row['c_correo']; ?></td>
                                                        <td><?php echo $row['c_usuario']; ?></td>
                                                        <td><?php echo $row['c_password']; ?></td>
                                                        <td><?php echo $row['u_activo']; ?></td>
                                                    </tr>
                                                <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div><!--end .table-responsive -->
                                </div>
                            </div><!--end .col -->
                        </div><!--end .row -->
                        <!-- END DATATABLE 1 -->


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







        <script src="../libs/assets/js/core/source/App.js"></script>
        <script src="../libs/assets/js/core/source/AppNavigation.js"></script>
        <script src="../libs/assets/js/core/source/AppOffcanvas.js"></script>
        <script src="../libs/assets/js/core/source/AppCard.js"></script>
        <script src="../libs/assets/js/core/source/AppForm.js"></script>
        <script src="../libs/assets/js/core/source/AppNavSearch.js"></script>
        <script src="../libs/assets/js/core/source/AppVendor.js"></script>
        <script src="../libs/assets/js/core/demo/Demo.js"></script>
        <script src="../libs/assets/js/core/demo/DemoTableDynamic.js"></script>


        <!-- END JAVASCRIPT -->

    </body>
</html>

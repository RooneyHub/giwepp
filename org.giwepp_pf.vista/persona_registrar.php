<?php
session_start();
if (empty($_SESSION['user_name'])) {
    header("Location:../login.php");
}
//require_once '../org.giwepp_pf.bd/bdInventarioRegistro.php';
require_once '../org.giwepp_pf.bd/bdPersonaRegistro.php';
$iR = new bdPersonaRegistro();
$all = $iR->select();
?>
<br/><br/>
<script>
    function popUp(URL) {
        window.open(URL, 'popup', 'left=390, top=200, width=512, height=341, toolbar=0, resizable=1');
    }
</script>

<script type="text/javascript" src="Resources/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="Resources/js/bootstrap.min.js"></script>

<div class="row">
    <div class="col-xs-12 col-sm-8">
        <div class="box">
            <div class="box-header">
                <div class="box-name">
                    <legend>Registro de Estudiante</legend>
                </div>
                <div class="no-move"></div>
            </div>
            <div class="box-content">
                
                

                <form action="org.giwepp_pf.controlador/agregarPersonaRegistro.php"  method="POST" class="form-horizontal">
                    <fieldset>

                        
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nombre</label>
                            <div class="col-sm-5">
                                <input class="form-control" id="txtNombre" name='txtNombre' type='text' maxlength="26" required/>
                            </div>
                        </div>
                           <div class="form-group">
                            <label class="col-sm-3 control-label">Apellido Paterno</label>
                            <div class="col-sm-5">
                                <input class="form-control" id="txtApellido_Pat" name='txtApellido_Pat' type='text' maxlength="22" required/>
                            </div>
                        </div>
                           <div class="form-group">
                            <label class="col-sm-3 control-label">Apellido Materno</label>
                            <div class="col-sm-5">
                                <input class="form-control" id="txtApellido_Mat" name='txtApellido_Mat' type='text' maxlength="22" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Fecha de Nacimiento</label>
                            <div class="col-sm-5">
                                <input class="form-control" id="txtFecha_nac" name='txtFecha_nac' maxlength="10" type='text' required/>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-sm-3 control-label">Correo</label>
                            <div class="col-sm-5">
                                <input class="form-control" id="txtFecha_nac" name='txtFecha_nac' maxlength="10" type='text' required/>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-sm-3 control-label">Usuario</label>
                            <div class="col-sm-5">
                                <input class="form-control" id="txtFecha_nac" name='txtFecha_nac' maxlength="10" type='text' required/>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-5">
                                <input class="form-control" id="txtFecha_nac" name='txtFecha_nac' maxlength="10" type='text' required/>
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3">
                                <button type="submit" class="btn btn-primary" id="btnAgregarEstudiante" name="btnAgregarEstudiante">Agregar Estudiante</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<br/><br/>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="box-name">
                    <span>Estudiante Registrado</span>
                </div>
                <div class="box-icons">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="expand-link">
                        <i class="fa fa-expand"></i>
                    </a>
                </div>
                <div class="no-move"></div>
            </div>
            <div class="box-content no-padding table-responsive">
                <table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-2">
                    <thead>
                        <tr>
                            <th><label>ID</label></th>
                            <th><label>Nombre</label></th>
                            <th><label>Apellido Paterno</label></th>
                            <th><label>Apellido Materno</label></th>
                            <th><label>Activo</label></th>
                            <th><label>Fecha nacimiento</label></th>
                            <th><label>Fecha de registro</label></th>
                            <th><label>Modificar</label></th>
                            <th><label>Eliminar</label></th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($all as $row): ?>
                            <tr>
                                <td id="Id"><?php echo $row['id']; ?></td>
                                <td id="tdNombre"><?php echo $row['nombre']; ?></td>
                                <td id="tdApe_pat"><?php echo $row['ape_pat']; ?></td>
                                <td id="tdApe_mat"><?php echo $row['ape_mat']; ?></td>
                                <td id="tdActivo"><?php echo $row['activo']; ?></td>
                                <td id="tdOFecha_nac"><?php echo $row['fecha_nac']; ?></td>
                                <?php
                                
                                if ($row['estado'] == "A") {
                                    echo "<td><a href='org.mecsa.controlador/modificarEstadoInventarioRegistro.php?id=" . $row['id'] . "&estado=A". "'>Dar de baja</a></td>";
                                } else {
                                    echo "<td><a href='org.mecsa.controlador/modificarEstadoInventarioRegistro.php?id=" . $row['id'] . "&estado=B". "'>Dar de alta</a></td>";
                              
                                }
                                echo "<td><a class='btn btn-primary' href='javascript:popUp(\"org.mecsa.controlador/modificarInventarioRegistro.php?id=" . $row['id'] . "&nombre=" . $row['nombre'] . "&ape_pat=" . $row['ape_pat'] . "&ape_mat=" . $row['ape_mat'] . "\");'>Modificar</a></td>";
                                
                                echo "<td><a href='org.mecsa.controlador/eliminarInventarioRegistro.php?id=" . $row['idprod'] . "'>Eliminar</a></td>";
                                ?>    
                                
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <script type="text/javascript">
// Run Datables plugin and create 3 variants of settings
                    function AllTables() {
                        TestTable1();
                        TestTable2();
                        TestTable3();
                        LoadSelect2Script(MakeSelect2);
                    }
                    function MakeSelect2() {
                        $('select').select2();
                        $('.dataTables_filter').each(function () {
                            $(this).find('label input[type=text]').attr('placeholder', 'Search');
                        });
                    }
                    $(document).ready(function () {
                        // Load Datatables and run plugin on tables 
                        LoadDataTablesScripts(AllTables);
                        // Add Drag-n-Drop feature
                        WinMove();
                    });
                </script>
            </div>
        </div>
    </div>
</div>

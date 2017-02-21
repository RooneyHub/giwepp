<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
    
        <?php
        include '../org.giwepp_pf.modelo/ModeloPersona.php';
        include '../org.giwepp_pf.modelo/ModeloCuenta.php';
        include '../org.giwepp_pf.bd/bdPersona.php';
        include '../org.giwepp_pf.bd/bdCuenta.php';
     

//        include 'encriptadoMD5.php';

        $model = new Persona();
        $model->setU_nombre($_POST['txtNombrePersona']);
        $model->setU_ape_pat($_POST['txtApellidoPaterno']);
        $model->setU_ape_mat($_POST['txtApellidoMaterno']);
        $model->setU_fecha_nac($_POST['txtFechaNac']);
        $model->setU_activo(1);

        $pross = new bdPersona();
        $pross->insert($model);

        $name = $_POST['txtNombrePersona'];
        $ap = $_POST['txtApellidoPaterno'];
        $am = $_POST['txtApellidoMaterno'];


        $model1 = new Persona();
        $model2 = new Cuenta();

        $id_estudiante = $model1->seleccionarIdPersonas($name, $ap, $am);

        foreach ($id_estudiante as $row1) {
                                             $model2->setId_dueño($row1['id_persona']);
                                          }

        $model2->setC_correo($_POST['txtCorreo']);
        $model2->setC_usuario($_POST['txtUsuario']);
        $model2->setC_contraseña($_POST['txtContraseña']);
        $model2->setId_dueño($row['id_persona']);
        $model2->setC_tipo_cuenta(2);
        
        
//        $model->setContrasena(encriptar($_POST['contra']));
        $pross2 = new bdCuenta();
        $pross2->insert($mode2);
        //header('Location:../index.php#org.mecsa.vista/usuario.php');

        
        //header('Location:../index.php#org.mecsa.vista/usuario.php');

        header('Location:../index.php#org.giwepp_pf.vista/vistaEstudiantes.php');
        ?>

    </body>
</html>

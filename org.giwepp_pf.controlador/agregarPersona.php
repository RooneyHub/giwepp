<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include '../org.giwepp_pf.modelo/ModeloPersona.php';
        include '../org.giwepp_pf.bd/bdPersona.php';
//        include 'encriptadoMD5.php';
        $model = new Persona();
        $model->setU_nombre($_POST['txtNombrePersona']);
        $model->setU_ape_pat($_POST['txtApellidoPaterno']);
        $model->setU_ape_mat($_POST['txtApellidoMaterno']);
        $model->setU_fecha_nac($_POST['txtFechaNac']);
        $model->setU_activo(1);
        
        
//        $model->setContrasena(encriptar($_POST['contra']));
        $pross = new bdPersona();
        $pross->insert($model);
        //header('Location:../index.php#org.mecsa.vista/usuario.php');
        ?>
    </body>
</html>

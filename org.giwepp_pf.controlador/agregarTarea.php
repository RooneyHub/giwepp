<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include '../org.giwepp_pf.modelo/ModeloTarea.php';
        include '../org.giwepp_pf.bd/bdTarea.php';
//        include 'encriptadoMD5.php';
        $model = new Tarea();
        $model->setT_tarea($_POST['txtTarea']);
        $model->setT_descripcion($_POST['txtDescripcionTarea']);
        $model->setId_materia($_POST['txtidMateria']);
        $model->setT_fecha_entrega($_POST['txtFechaEntrega']);
        $model->setId_maestro($_POST['txtidProfesor']);
        $model->setId_grupo($_POST['txtidGrupo']);
        $model->setT_activa(1);
        
        
//        $model->setContrasena(encriptar($_POST['contra']));  $_POST['txtidProfesor']
        $pross = new bdTarea();
        $pross->insert($model);
        //header('Location:../index.php#org.mecsa.vista/usuario.php');
        ?>
    </body>
</html>

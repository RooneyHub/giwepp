<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include '../org.giwepp_pf.modelo/ModeloMateria.php';
        include '../org.giwepp_pf.bd/bdMateria.php';
//        include 'encriptadoMD5.php';
        $model = new Materia();
        $model->setMateria($_POST['txtMateria']);
        $model->setDescripcionMateria($_POST['txtDescripcionMateria']);

        
//        $model->setContrasena(encriptar($_POST['contra']));  $_POST['txtidProfesor']
        $pross = new bdMateria();
        $pross->insert($model);
        //header('Location:../index.php#org.mecsa.vista/usuario.php');
        ?>
    </body>
</html>

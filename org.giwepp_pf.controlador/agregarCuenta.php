<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <?php       
        include '../org.giwepp_pf.modelo/ModeloCuenta.php';
        include '../org.giwepp_pf.bd/bdCuenta.php';

       
        //        include 'encriptadoMD5.php';
        $model = new Cuenta();
        $model->setC_correo($_POST['txtCorreo']);
        $model->setC_usuario($_POST['txtUsuario']);
        $model->setC_password($_POST['txtContraseña']);
        $model->setId_dueño($_POST['txtIdusuario']);
        $model->setC_tipo_cuenta($_POST['txtTipocuenta']);
        
        
//        $model->setContrasena(encriptar($_POST['contra']));
        $pross = new bdCuenta();
        $pross->insert($model);
        //header('Location:../index.php#org.mecsa.vista/usuario.php');
        ?>

    </body>
</html>

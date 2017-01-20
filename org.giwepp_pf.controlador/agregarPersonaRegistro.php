<?php
include '../org.giwepp_pf.modelo/modeloPersonaRegistro.php';
include '../org.giwepp_pf.bd/bdPersonaRegistro.php';
$model = new PersonaRegistro();
$pross = new BdPersonaRegistro();
$model->setNombre($_POST['txtNombre']);
$model->setApellido_pat($_POST['txtApellido_Pat']);
$model->setApellido_mat($_POST['txtApellido_Mat']);
$model->setFecha_nac($_POST['txtFecha_nac']);
$model->setActivo(1);

$resultado = $pross->insert($model);
header('Location:../index.php#org.giwepp_pf.vista/persona_registrar.php');
?>
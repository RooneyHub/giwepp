<?php
require_once 'conexion.php';
require_once '../org.giwepp_pf.modelo/ModeloCuenta.php';

class bdCuenta extends conex {

    public function __construct() {
        parent::_construct();
    }



    public function insert(Cuenta $emp) {
        $this->_db->beginTransaction();
        $statement = $this->_db->prepare(
                "insert into cuentas(id_dueño, c_correo, c_usuario, c_password, c_tipo_cuenta) "
                . "values (?, ?, ?, ?, ?);");
        $id_dueño=$emp->getId_dueño();
        $c_correo=$emp->getC_correo();
        $c_usuario=$emp->getC_usuario();
        $c_password=$emp->getC_password();
        $c_tipo_cuenta=$emp->getC_tipo_cuenta();

        $statement->bindParam(1, $id_dueño);
        $statement->bindParam(2, $c_correo);
        $statement->bindParam(3, $c_usuario);
        $statement->bindParam(4, $c_password);
        $statement->bindParam(5, $c_tipo_cuenta);

        try {
            $statement->execute();
            $this->_db->commit();
            console.log('Exito al registrar cuenta al sistema'); 
            header('Location:../org.giwepp_pf.vista/vistaCuentasRelacion.php');
        } catch (Exception $ex) {
            console.log('Error en el registro del estudiante');
            $this->_db->rollBack();
        }
        //return $result;
    }



}

?>
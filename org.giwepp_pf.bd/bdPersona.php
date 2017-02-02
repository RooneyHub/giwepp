<?php
require_once 'conexion.php';
require_once '../org.giwepp_pf.modelo/ModeloPersona.php';

class bdPersona extends conex {

    public function __construct() {
        parent::_construct();
    }

//    public function delete1(Empleado $emp) {
//        $this->_db->beginTransaction();
//        $statement = $this->_db->prepare("update usuario set estatus='B' where idusur=?;");
//        $id=$emp->getId();
//        $statement->bindParam(1, $id);
//        try {
//            $statement->execute();
//            $this->_db->commit();
//        } catch (Exception $ex) {
//            echo 'Error...';
//            $this->_db->rollBack();
//        }
//        return $result;
//    }
//    public function delete2(Empleado $emp) {
//        $this->_db->beginTransaction();
//        $statement = $this->_db->prepare("update usuario set estatus='A' where idusur=?;");
//        $id=$emp->getId();
//        $statement->bindParam(1, $id);
//        try {
//            $statement->execute();
//            $this->_db->commit();
//        } catch (Exception $ex) {
//            echo 'Error...';
//            $this->_db->rollBack();
//        }
//        return $result;
//    }

    public function insert(Persona $emp) {
        $this->_db->beginTransaction();
        $statement = $this->_db->prepare(
                "insert into personas(u_nombre,u_ape_pat,u_ape_mat,u_fecha_nac,u_activo,u_fecha_reg) "
                . "values (?,?,?,?,?,CURRENT_TIMESTAMP);");
        $nombre=$emp->getU_nombre();
        $apP=$emp->getU_ape_pat();
        $apM=$emp->getU_ape_mat();
        $fechaNac=$emp->getU_fecha_nac();
        $activo=$emp->getU_activo();

        $statement->bindParam(1, $nombre);
        $statement->bindParam(2,$apP );
        $statement->bindParam(3, $apM);
        $statement->bindParam(4, $fechaNac);
        $statement->bindParam(5, $activo);

        try {
            $statement->execute();
            $this->_db->commit();
            echo 'Exito';
            //header('Location:index.php');
        } catch (Exception $ex) {
            echo 'Error...';
            $this->_db->rollBack();
        }
        //return $result;
    }

//    public function update(Empleado $emp) {
//        $this->_db->beginTransaction();
//        $statement = $this->_db->prepare(
//                "update usuario set nombre=?,apellidop=?,apellidom=?,puesto=?,correo=?,username=?,contrasena=?,privilegio=?,estatus=? "
//                . "where idusur=?;");
//        $nombre=$emp->getNombre();
//        $apP=$emp->getApellidoP();
//        $apM=$emp->getApellidoM();
//        $puesto=$emp->getPuesto();
//        $correo=$emp->getCorreo();
//        $username=$emp->getUsername();
//        $contrasena=$emp->getContrasena();
//        $privilegio=$emp->getPrivilegio();
//        $estatus=$emp->getEstatus();
//        $id=$emp->getId();
//        $statement->bindParam(1, $nombre);
//        $statement->bindParam(2,$apP );
//        $statement->bindParam(3, $apM);
//        $statement->bindParam(4, $puesto);
//        $statement->bindParam(5, $correo);
//        $statement->bindParam(6, $username);
//        $statement->bindParam(7, $contrasena);
//        $statement->bindParam(8, $privilegio);
//        $statement->bindParam(9, $estatus);
//        $statement->bindParam(10, $id);
//        try {
//            $statement->execute();
//            $this->_db->commit();
//        } catch (Exception $ex) {
//            echo 'Error...';
//            $this->_db->rollBack();
//        }
//    }

    public function select() {
        $statement = $this->_db->prepare('select * from persona');
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

}

?>
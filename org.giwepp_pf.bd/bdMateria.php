<?php
require_once 'conexion.php';
require_once '../org.giwepp_pf.modelo/ModeloMateria.php';

class bdMateria extends conex {

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

    public function insert(Materia $emp) {
        $this->_db->beginTransaction();
        $statement = $this->_db->prepare(
                "insert into materias(ma_nombre,ma_descri) "
                . "values (?,?);");
        $Materia=$emp->getMateria();
        $Mat_desc=$emp->getDescripcionMateria();
     

        $statement->bindParam(1, $Materia);
        $statement->bindParam(2, $Mat_desc );
      

        try {
            $statement->execute();
            $this->_db->commit();
            echo 'Registro exitoso de la materia';
            //header('Location:index.php');
        } catch (Exception $ex) {
            echo 'Error al registrar la materia...';
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
        $statement = $this->_db->prepare('select * from materias');
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

}

?>
<?php
require_once 'conexion.php';
require_once '../org.giwepp_pf.modelo/ModeloTarea.php';

class bdTarea extends conex {

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

    public function insert(Tarea $emp) {
        $this->_db->beginTransaction();
        $statement = $this->_db->prepare(
                "insert into tareas(id_maestro,id_materia,id_grupo,t_tarea,t_descripcion,t_fecha_entrega,t_activa) "
                . "values (?,?,?,?,?,?,?);");
        $id_maestro=$emp->getId_maestro();
        $id_materia=$emp->getId_materia();
        $id_grupo=$emp->getId_grupo();
        $t_tarea=$emp->getT_tarea();
        $t_descripcion=$emp->getT_descripcion();
        $t_fecha_entrega=$emp->getT_fecha_entrega();
        $t_activa=$emp->getT_activa();

        $statement->bindParam(1, $id_maestro);
        $statement->bindParam(2, $id_materia );
        $statement->bindParam(3, $id_grupo);
        $statement->bindParam(4, $t_tarea);
        $statement->bindParam(5, $t_descripcion);
        $statement->bindParam(6, $t_fecha_entrega);
        $statement->bindParam(7, $t_activa);

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
        $statement = $this->_db->prepare('select * from tareas');
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

}

?>
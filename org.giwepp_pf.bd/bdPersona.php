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
                . "values (?,?,?,STR_TO_DATE(?, '%m/%d/%Y'),?,CURRENT_TIMESTAMP);");
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
            console.log('Exito'); 
            header('Location:../org.giwepp_pf.vista/vistaPersona.php');
        } catch (Exception $ex) {
            console.log('Error');
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

    public function seleccionarTodoPersonas() {
        $statement = $this->_db->prepare('SELECT personas.id_persona, personas.u_nombre, personas.u_ape_pat, personas.u_ape_mat, 
                                          personas.u_fecha_nac, personas. u_fecha_reg, cuentas.c_correo, 
                                          cuentas.c_usuario, cuentas.c_password, personas.u_activo FROM personas
                                          INNER JOIN cuentas ON personas.id_persona = cuentas.id_dueño
                                          ORDER by id_persona asc;');
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }
    

       public function seleccionarTodoEstudiante() {
        $statement = $this->_db->prepare('SELECT personas.id_persona, personas.u_nombre, personas.u_ape_pat, personas.u_ape_mat, 
                                          personas.u_fecha_nac, personas. u_fecha_reg, cuentas.c_correo, 
                                          cuentas.c_usuario, cuentas.c_password, personas.u_activo FROM personas
                                          INNER JOIN cuentas ON personas.id_persona = cuentas.id_dueño WHERE cuentas.c_tipo_cuenta = 2
                                          ORDER by id_persona asc;');
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }


       public function seleccionarTodoProfesor() {
        $statement = $this->_db->prepare('SELECT personas.id_persona, personas.u_nombre, personas.u_ape_pat, personas.u_ape_mat, 
                                          personas.u_fecha_nac, personas. u_fecha_reg, cuentas.c_correo, 
                                          cuentas.c_usuario, cuentas.c_password, personas.u_activo FROM personas
                                          INNER JOIN cuentas ON personas.id_persona = cuentas.id_dueño WHERE cuentas.c_tipo_cuenta = 3
                                          ORDER by id_persona asc;');
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }
    

           public function seleccionarTodoPersonas_SC() {
        $statement = $this->_db->prepare('SELECT * from personas;');
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

                  public function seleccionarIdPersonas($nombre, $apep, $apem) {
        $statement = $this->_db->prepare('SELECT id_persona from personas where u_nombre = ? and u_ape_pat = ? and u_ape_mat = ? ;');
        $statement->bindParam(1, $nombre);
        $statement->bindParam(2, $apep);
        $statement->bindParam(3, $apem);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }


    

        //$pasres = en


}

?>

    <?php
require_once 'conexion.php';
require_once '../org.giwepp_pf.modelo/ModeloPersona.php';
require_once '../org.giwepp_pf.modelo/ModeloCuenta.php';

class bdEstudiante extends conex {

    public function __construct() {
        parent::_construct();
    }



    public function insert(estudiante $emp) {
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
        $statement->bindParam(2, $apP );
        $statement->bindParam(3, $apM);
        $statement->bindParam(4, $fechaNac);
        $statement->bindParam(5, $activo);

        try {
            $statement->execute();
            $this->_db->commit();
            console.log('Exito'); 
            
        } catch (Exception $ex) {
            console.log('Error');
            $this->_db->rollBack();
        }
        
        $statement = $this->_db->prepare('SELECT id_persona from personas where u_nombre = '.$nombre.' and u_ape_pat = '.$apP.' and u_ape_mat = '. $apM.' ;');
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;


        $this->_db->beginTransaction();
        $statement = $this->_db->prepare(
                "insert into cuentas(id_dueño, c_correo, c_usuario, c_password, c_tipo_cuenta) "
                . "values (?, ?, ?, ?, ?);");

        $id_dueño=$emp->getId_dueño();
        $c_correo=$emp->getC_correo();
        $c_usuario=$emp->getC_usuario();
        $c_password=$emp->getC_password();
        $c_tipo_cuenta=$emp->$result;

        $statement->bindParam(1, $id_dueño);
        $statement->bindParam(2, $c_correo);
        $statement->bindParam(3, $c_usuario);
        $statement->bindParam(4, $c_password);
        $statement->bindParam(5, $result);

        try {
            $statement->execute();
            $this->_db->commit();
            console.log('Exito al registrar cuenta al sistema'); 
            header('Location:../org.giwepp_pf.vista/vistaEstudiantes.php');
        } catch (Exception $ex) {
            console.log('Error en el registro del estudiante');
            $this->_db->rollBack();
        }
        //return $result;
    }



   
    

        //$pasres = en


}

?>
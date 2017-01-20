
 <?php

require_once 'conexion.php';
require_once '../org.giwepp_pf.modelo/modeloPersonaRegistro.php';

class BdPersonaRegistro extends conex {

  public function __construct() {
        parent::_construct();
    }

 public function insert(PersonaRegistro $iR) {
        $this->_db->beginTransaction();
        $statement = $this->_db->prepare(
                "INSERT INTO public.persona(u_nombre,u_ape_pat, u_ape_mat, u_fecha_nac, u_activo) "
                . "VALUES (?,?,?,?,?);");
        $nombre = $iR->getNombre();
        $ape_pat = $iR->getApellido_pat();
        $ape_mat = $iR->getApellido_mat();
        $fecha_nac = $iR->getFecha_nac();
        $activo = $iR->getActivo();
  
        $observaciones = $iR->getObservaciones();
        $statement->bindParam(1, $nombre);
        $statement->bindParam(2, $ape_pat);
        $statement->bindParam(3, $ape_mat);
        $statement->bindParam(4, $fecha_nac);
        $statement->bindParam(5, $activo);
        
        try {
            $result = $statement->execute();
            $this->_db->commit();
            if ($result) {
                echo 'CORRECTO';
            } else {
                echo 'FALLA';
            }
        } catch (Exception $ex) {
            echo 'Error...';
            $this->_db->rollBack();
        }
    }

        public function select() {
        $statement = $this->_db->prepare('SELECT * FROM public.personas');
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }

    }

    ?>
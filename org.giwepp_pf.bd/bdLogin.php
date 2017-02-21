<?php

require_once 'conexion.php';
//require_once '../org..giwepp_pf.controlador/encriptadoMD5.php';

class bdLogin extends conex {

    protected $md5;

    public function __construct() {
        parent::_construct();
    }

    public function login($username, $password) {


        $statement = $this->_db->prepare(
                'SELECT * FROM cuentas ' .
                'WHERE c_usuario LIKE ? ' .
                'AND c_password LIKE  ? ' .
                'LIMIT 1;'
        );
        //$pasres = encriptar($password);
        $statement->bindParam(1, $username);
        $statement->bindParam(2, $password);
        $statement->execute();
        $userRow = $statement->fetch(PDO::FETCH_ASSOC);

        if ($statement->rowCount() > 0) {
            $_SESSION['user_session'] = $userRow['id_dueño'];
            $_SESSION['user_name'] = $userRow['c_usuario'];
            $_SESSION['user_type'] = $userRow['c_tipo_cuenta'];
            return true;
        } else {
            return false;
        }
    }

}

?>
<?php

class Cuenta {
    

    private $id_cuenta;
    private $id_dueño;
    private $c_correo;
    private $c_usuario;
    private $c_password;
    private $c_tipo_cuenta;
    
    
    
    function getId_cuenta() {
        return $this->id_cuenta;
    }

    function getId_dueño() {
        return $this->id_dueño;
    }

    function getC_correo() {
        return $this->c_correo;
    }

    function getC_usuario() {
        return $this->c_usuario;
    }

    function getC_password() {
        return $this->c_password;
    }

    function getC_tipo_cuenta() {
        return $this->c_tipo_cuenta;
    }

  
    function setId_cuenta($id_cuenta) {
        $this->id_cuenta = $id_cuenta;
    }

    function setId_dueño($id_dueño) {
        $this->id_dueño = $id_dueño;
    }

    function setC_correo($c_correo) {
        $this->c_correo = $c_correo;
    }

    function setC_usuario($c_usuario) {
        $this->c_usuario = $c_usuario;
    }

    function setC_password($c_password) {
        $this->c_password = $c_password;
    }

    function setC_tipo_cuenta($c_tipo_cuenta) {
        $this->c_tipo_cuenta = $c_tipo_cuenta;
    }


        
}
?>

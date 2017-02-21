<?php

class Telefono {
    

    private $id_telefono;
    private $id_dueño_tel;
    private $numero_tel;
    private $id_telefono;
    private $tipo_tel;
    
    
    function getId_telefono() {
        return $this->id_telefono;
    }

  
    function setId_telefono($id_telefono) {
        $this->id_telefono = $id_telefono;
    }


    function getId_dueño_tel() {
        return $this->id_dueño_tel;
    }

  
    function setId_dueño_tel($id_dueño_tel) {
        $this->id_dueño_tel = $id_dueño_tel;
    }


    function getNumero_tel() {
        return $this->numero_tel;
    }

  
    function setNumero_tel($numero_tel) {
        $this->numero_tel = $numero_tel;
    }


    function get_Tipo_tel() {
        return $this->tipo_tel;
    }

  
    function set_Tipo_tel($tipo_tel) {
        $this->tipo_tel = $tipo_tel;
    }



        
}
?>
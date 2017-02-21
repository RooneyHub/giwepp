<?php

class Roles {
    

    private $id_rol;
    private $ro_nombre;
    private $ro_descripcion;
  
    
    function getId_rol() {
        return $this->id_rol;
    }

  
    function setId_rol($id_rol) {
        $this->id_rol = $id_rol;
    }


    function getRo_nombre() {
        return $this->ro_nombre;
    }

  
    function setRo_nombre($ro_nombre) {
        $this->ro_nombre = $ro_nombre;
    }


    function getRo_descripcion() {
        return $this->ro_descripcion;
    }

  
    function setRo_descripcion($ro_descripcion) {
        $this->ro_descripcion = $ro_descripcion;
    }


        
}
?>
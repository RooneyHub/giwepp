<?php

class Grupo {
    

    private $id_grupo;
    private $id_generacion;
    private $gr_nombre;
  
    
    function getId_grupo() {
        return $this->id_grupo;
    }

  
    function setId_grupo($id_grupo) {
        $this->id_grupo = $id_grupo;
    }


    function getId_generacion() {
        return $this->id_generacion;
    }

  
    function setId_generacion($id_generacion) {
        $this->id_generacion = $id_generacion;
    }


    function getGr_nombre() {
        return $this->gr_nombre;
    }

  
    function setGr_nombre($gr_nombre) {
        $this->gr_nombre = $gr_nombre;
    }


        
}
?>
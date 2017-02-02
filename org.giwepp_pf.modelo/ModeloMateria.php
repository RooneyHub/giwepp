<?php

class Materia {
    

    private $id_Materia;
    private $id_maestro;
    private $id_materia;
    
    
    function getId_Materia() {
        return $this->id_Materia;
    }

      function setId_Materia($id_Materia) {
        $this->id_Materia = $id_Materia;
    }

      function getMateria() {
        return $this->Materia;
    }

      function setMateria($Materia) {
        $this->Materia = $Materia;
    }


      function getDescripcionMateria() {
        return $this->DescripcionMateria;
    }


     function setDescripcionMateria($DescripcionMateria) {
        $this->DescripcionMateria = $DescripcionMateria;
    }


        
}
?>


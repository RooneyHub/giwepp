
<?php

class PersonaRegistro {

    private $id_Persona;
    private $Nombre;
    private $Apellido_pat;
    private $Apellido_mat;
    private $Activo;
    private $Fecha_nac;


    public function getId_Persona(){
        return $this->id;
    }

    public function setId_Persona($id_per){
        $this->id = $id_per;
    }

    public function getNombre(){
        return $this->Nombre;
    }

    public function setNombre($Nombre){
        $this->Nombre = $Nombre;
    }

    public function getApellido_pat(){
        return $this->Apellido_pat;
    }

    public function setApellido_pat($Apellido_pat){
        $this->Apellido_pat = $Apellido_pat;
    }

    public function getApellido_mat(){
        return $this->Apellido_mat;
    }

    public function setApellido_mat($Apellido_mat){
        $this->Apellido_mat = $Apellido_mat;
    }

    public function getFecha_nac(){
        return $this->Fecha_nac;
    }

    public function setFecha_nac($Fecha_nac){
        $this->Fecha_nac = $Fecha_nac;
    }

        public function getActivo(){
        return $this->Activo;
    }

    public function setActivo($Activo){
        $this->Activo = $Activo;
    }

    

}
?>

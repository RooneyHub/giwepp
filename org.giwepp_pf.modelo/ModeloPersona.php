<?php

class Persona {
    

    private $id_persona;
    private $u_nombre;
    private $u_ape_pat;
    private $u_ape_mat;
    private $u_fecha_nac;
    private $u_activo;
    private $u_fecha_reg;
    
    
    function getId_persona() {
        return $this->id_persona;
    }

    function getU_nombre() {
        return $this->u_nombre;
    }

    function getU_ape_pat() {
        return $this->u_ape_pat;
    }

    function getU_ape_mat() {
        return $this->u_ape_mat;
    }

    function getU_fecha_nac() {
        return $this->u_fecha_nac;
    }

    function getU_activo() {
        return $this->u_activo;
    }

    function getU_fecha_reg() {
        return $this->u_fecha_reg;
    }

    function setId_persona($id_persona) {
        $this->id_persona = $id_persona;
    }

    function setU_nombre($u_nombre) {
        $this->u_nombre = $u_nombre;
    }

    function setU_ape_pat($u_ape_pat) {
        $this->u_ape_pat = $u_ape_pat;
    }

    function setU_ape_mat($u_ape_mat) {
        $this->u_ape_mat = $u_ape_mat;
    }

    function setU_fecha_nac($u_fecha_nac) {
        $this->u_fecha_nac = $u_fecha_nac;
    }

    function setU_activo($u_activo) {
        $this->u_activo = $u_activo;
    }

    function setU_fecha_reg($u_fecha_reg) {
        $this->u_fecha_reg = $u_fecha_reg;
    }

        
}
?>


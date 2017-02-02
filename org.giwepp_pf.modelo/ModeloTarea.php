<?php

class Tarea {
    

    private $id_tarea;
    private $id_maestro;
    private $id_materia;
    private $id_grupo;
    private $t_tarea;
    private $t_descripcion;
    private $t_fecha_entrega;
    private $t_activa;
    private $t_fecha_registro;
    
    
    function getId_tarea() {
        return $this->id_tarea;
    }

      function setId_tarea($id_tarea) {
        $this->id_tarea = $id_tarea;
    }

      function getId_maestro() {
        return $this->id_maestro;
    }

      function setId_maestro($id_maestro) {
        $this->id_maestro = $id_maestro;
    }


  function getId_materia() {
        return $this->id_materia;
    }

      function setId_materia($id_materia) {
        $this->id_materia = $id_materia;
    }

  function getId_grupo() {
        return $this->id_grupo;
    }

      function setId_grupo($id_grupo) {
        $this->id_grupo = $id_grupo;
    }

  function getT_tarea() {
        return $this->t_tarea;
    }

      function setT_tarea($t_tarea) {
        $this->t_tarea = $t_tarea;
    }


     function getT_descripcion() {
        return $this->t_descripcion;
    }

      function setT_descripcion($t_descripcion) {
        $this->t_descripcion = $t_descripcion;
    }

     function getT_fecha_entrega() {
        return $this->t_fecha_entrega;
    }

      function setT_fecha_entrega($t_fecha_entrega) {
        $this->t_fecha_entrega = $t_fecha_entrega;
    }

      function getT_activa() {
        return $this->t_activa;
    }

      function setT_activa($t_activa) {
        $this->t_activa = $t_activa;
    }

      function getT_fecha_registro() {
        return $this->t_fecha_registro;
    }

      function setT_fecha_registro($t_fecha_registro) {
        $this->t_fecha_registro = $t_fecha_registro;
    }

        
}
?>


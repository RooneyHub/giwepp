<?php
  session_start();
  if(!isset($_SESSION['user_session']) || !isset($_SESSION['user_name']) || !isset($_SESSION['user_type']) || !isset($_SESSION['user_person']))
    {echo "<meta http-equiv='refresh' content='0;url=../login.php'>";}
  else
    {
        include('conexion_bd.php');
            $conectar=conexion();
            $consulta="select u_nombre, u_ape_pat, u_ape_mat
            from personas 
            where id_persona = '".$_SESSION['user_person']."' ";

            $datos=mysql_query($consulta,$conectar);
            $id=mysql_fetch_assoc($datos);
            $_SESSION['nombre_usuario']=$id['u_nombre'] ." ". $id['u_ape_pat'] ." ". $id['u_ape_mat'] ;
    }


  ?>
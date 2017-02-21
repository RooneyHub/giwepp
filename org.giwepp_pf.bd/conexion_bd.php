<?php
 function conexion()
    {
	     $servidor='localhost';
		 $usuario='root';
		 $password='root1234';
		 $basededatos='giwepp_pf';
		
		 
		 
		 $enlace=mysql_connect($servidor,$usuario,$password);
		 if(!$enlace)
		    die('No se pudo conectar a la Base de datos, el error es:' .mysql_error());
			
			$dbselect=mysql_select_db($basededatos,$enlace);
			if(!$dbselect)
			{
			die('Error, Contacte al administrador del sistema o vuelba a intentarlo en unos momentos por favor');
			return false;
			}
			else
			return $enlace;
	}

<?php
        
	// Datos de la base de datos
	$usuario = "root";
	$password = "";
	$servidor = "localhost";
	$basededatos = "trivial";
	
        
        
        session_start();
        $_SESSION['preguntasEconomia'] = getEconomia();
        $_SESSION['preguntasHistoria'] = getHistoria();
        $_SESSION['preguntasFilosofia'] = getFilosofia();
        $_SESSION['preguntasLengua'] = getLengua();
        $_SESSION['preguntasIngles'] = getIngles();
        
        

        
	// creación de la conexión a la base de datos con mysql_connect()
	$conexion = mysqli_connect( $servidor, $usuario, "" ) or die ("No se ha podido conectar al servidor de Base de datos");
	
	// Selección del a base de datos a utilizar
	$db = mysqli_select_db( $conexion, $basededatos ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
	// establecer y realizar consulta. guardamos en variable.
	
        
        
        function getEconomia(){
            $consulta = "SELECT * FROM `preguntas` WHERE tema = 'Economia';";
            $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos de Economia");
            return json_encode($resultado); //convertimos a json
        }
        function getHistoria(){
            $consulta = "SELECT * FROM `preguntas` WHERE tema = 'Historia';";
            $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos de Historia");
            return json_encode($resultado); //convertimos a json
        }
        function getFilosofia(){
            $consulta = "SELECT * FROM `preguntas` WHERE tema = 'Filosofia';";
            $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos de Filosofia");
            return json_encode($resultado); //convertimos a json
        }
        function getLengua(){
            $consulta = "SELECT * FROM `preguntas` WHERE tema = 'Lengua';";
            $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos de Lengua");

            return json_encode($resultado); //convertimos a json
        }
        function getIngles(){
            $consulta = "SELECT * FROM `preguntas` WHERE tema = 'Ingles';";
            $resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos de Ingles");
            return json_encode($resultado); //convertimos a json
        }



 

 
        
        $consulta = "SELECT * FROM preguntas";
	$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");
	
        
        
	// Motrar el resultado de los registro de la base de datos
	// Encabezado de la tabla
	echo "<table borde='2'>";
	echo "<tr>";
	echo "<th>Nombre</th>";
	echo "<th>Edad</th>";
	echo "</tr>";
	
	// Bucle while que recorre cada registro y muestra cada campo en la tabla.
	while ($columna = mysqli_fetch_array( $resultado ))
	{
		echo "<tr>";
		echo "<td>" . $columna['tema'] . "</td><td>" . $columna['enunciado'] . "</td>";
		echo "</tr>";
	}
        
        
        
        
	
	echo "</table>"; // Fin de la tabla
      
	// cerrar conexión de base de datos
	mysqli_close( $conexion );
?>
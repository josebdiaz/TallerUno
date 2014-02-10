<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
	<style type="text/css">
		.debug {
			font:15px helvetica,arial,sans-serif;
			
			display: block;
			color: blue;
			border: solid 1px blue;
			padding: 2px;
		}
		.login{
			font:15px helvetica,arial,sans-serif;
			display: block;

		}
	</style>
		<p class='debug'>

		<?php 
		session_start(); 
		include('includes/database.php'); 
		if(empty($_SESSION['usuario_nombre'])) { // comprobamos que las variables de sesión estén vacías         
		?>
	</p>
		<form action="comprobar.php" method="post"> 
            <label>Usuario:</label><br /> 
            <input type="text" name="usuario_nombre" /><br /> 
            <label>Contraseña:</label><br /> 
            <input type="password" name="usuario_clave" /><br /> 
            <input type="submit" name="enviar" value="Ingresar" /> 
        </form>                 
		<?php 
		    }else { 
		?> 
		<p>Hola <strong><?=$_SESSION['usuario_nombre']?></strong> | <a href="logout.php">Salir</a></p> 
		<?php 
		    } 
		?>
		<div>
			<?php 
			 $query = "SELECT nombre,mail,pass FROM user WHERE 1";	
			 echo "<p class='debug'>";
			 $resultado = mysql_query($query) OR die("<p class='error'>Error de query: ".mysql_error()."</p></p>");
			 echo "<br />Query efectuado</p>";
			 while ( $row = mysql_fetch_array($resultado) ) {
			 	echo $row['nombre'].",".$row['mail'].",".utf8_decode($row['pass'])."<br />";
			 }
			?>
		</div>
	</body>
</html>
<html>
<head>
	<title>Ejemplos de ABM - con archivo de texto</title>
	  
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="http://www.octavio.com.ar/favicon.ico">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/animacion.css">
		<!--final de Estilos-->
		

		<script type="text/javascript" src="./bower_components/jquery/dist/jquery.js"></script>
		<script type="text/javascript" src="js/ValidacionjavaScript.js">		
	    </script>
	   		<script type="text/javascript" src="js/procesarDatos.js">		
	    </script>
	    
</head>
<body>
		<?php
		session_start();
	
		require_once"partes/barraDeMenu.php";
      
	 ?>
<?php     
	require_once("clases\Personas.php");

	$titulo = "ALTA";
	if(isset($_POST['idParaModificar'])) //viene de la grilla
	{
		$unaPersona = Persona::TraerUnaPersona($_POST['idParaModificar']);
		$titulo = "MODIFICACIÓN";
	} 
	if (isset($_SESSION["user"])) {
		$usuario=$_SESSION["user"];
	}
?>
	<div class="container">
		<div class="page-header">
			<center> <h1>Datos</h1>   </center>     
		</div>
		<div class="CajaInicio animated bounceInRight" id="cargarAltaMod">
			<h1>BIENVENID: <?php echo $usuario; ?> </h1>
            
			<form id="FormIngreso" method="post" action="formAlta.php" enctype="multipart/form-data" >
				<input type="text" name="apellido" id="apellido" placeholder="ingrese apellido" value="<?php echo isset($_GET["apellido"]) ? $_GET["apellido"] : "" ; ?>" /><span id="lblApellido" style="display:none;color:#FF0000;width:1%;float:right;font-size:80">*</span>
				<input type="text" name="nombre" id="nombre" placeholder="ingrese nombre" value="<?php echo isset($_GET["nombre"]) ? $_GET["nombre"] : "" ; ?>" /> <span id="lblNombre" style="display:none;color:#FF0000;width:1%;float:right;font-size:80">*</span>
				<input type="text" name="dni" id="dni" placeholder="ingrese dni" value="<?php echo isset($_GET["dni"]) ? $_GET["dni"] : "" ; ?>" <?php echo isset($unaPersona) ?  "readonly": "" ; ?>        /> <span id="lblDni" style="display:none;color:#FF0000;width:1%;float:right;font-size:80">*</span>
				<?php echo isset($unaPersona) ? 	"<p style='color: black;'>*El DNI no se puede modificar.</p> ": "" ; ?>
				<input type="file" name="foto" id="foto" />


				<img  src="fotos/<?php echo isset($_GET["foto"]) ? $_GET["foto"] : "pordefecto.png" ; ?>" class="fotoform" id="foto"/>
				<p style="  color: black;">*La foto se actualiza al guardar.</p>

                  <?php 
                       if(isset($_GET["id"])){
                       	$id=$_GET["id"];
                       }
                  
			echo "<a class='btn btn-info' name='guardar' onclick='GuardarPersona(".$id.")' ><span class='glyphicon glyphicon-save'>&nbsp;</span>.'Guardar'.</a>"
				 ?>	
				<input type="hidden" value="<?php echo $_POST['idParaModificar']; ?>" id="idParaModificar" name="agregar" />
				<input type="hidden" value="" id="hdnAgregar" name="agregar" />
				</div>

			</form>
				</div>
	</div>
</body>
</html>
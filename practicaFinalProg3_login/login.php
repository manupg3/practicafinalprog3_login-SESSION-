  				<head>
	<title>Ejemplos de ABM - con archivo de texto</title>
	  
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<link rel="stylesheet" type="text/css" href="css/animacion.css">
		<!--final de Estilos-->
		

	
	    
</head>


  				<script type="text/javascript" src="./bower_components/jquery/dist/jquery.js"></script>

  		<script type="text/javascript" src="js/procesarDatos.js">		
	    </script>
	    <body>
<div class="container">
		<div >
			<center> <h1>LOGIN</h1>   </center>     
		</div>
		<div class="CajaInicio animated bounceInRight">
            
			<form id="FrmLog" method="post" >
				<input type="text" name="user" id="user" placeholder="ingrese usuario" />
				<input type="text" name="psw" id="psw" placeholder="ingrese password" /> 
			

			<button class="btn btn-info" onclick="validarLogin();return false">LOGEARSE</button>
		 </form>
		</div>
		</div>
</body>


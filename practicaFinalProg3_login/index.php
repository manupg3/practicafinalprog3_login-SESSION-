<html>
<head>
	<title>ABM WEBSERVICE</title>
	  
		<?php require_once"partes/referencias.php" ;
	session_start();
		require_once"CrearSession.php"; 
		/**/?>
		<!--final de Estilos-->    

      <script type="text/javascript" src="./bower_components/jquery/dist/jquery.js"></script>
       
</head>
<body>
	<?php		
		require_once"partes/barraDeMenu.php";
	 ?> 
	  <div class="container">

	  	  <div class="page-header " >
                <h1 align="center">ABM-WEBSERVICE</h1>      
            </div>
					<div class="CajaInicio animated bounceInRight">
							<?php 
							 if (isset($_SESSION["user"])) {
							 
							 
						   echo "<h1>".$_SESSION["user"]."</h1>";
				               	}
						?>
							<form id="FormIngreso">
 										<?php
 										if(isset($_SESSION["user"])){
									   echo " <a href='formAlta.php' class='list-group-item  list-group-item list-group-item-info'>
									      <h4 class='list-group-item-heading'>Alta de Personas</h4>
									    </a>";
									}
										?>
										<a href="formGrillaWS.php" class="list-group-item  list-group-item list-group-item-info">
									      <h4 class="list-group-item-heading">Grilla de Personas</h4>
									    </a>
									
									  </div>
									
							</form>
						</div>
		</div>
</body>
</html>
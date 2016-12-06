<div id="header">
		
	
			<a class="btn btn-primary animated bounceInLeft" href="index.php"><span class="glyphicon glyphicon-list-alt">&nbsp;</span>Menu principal</a>
			<a class="btn btn-primary animated bounceInLeft" href="formGrillaWS.php"><span class="glyphicon glyphicon-th">&nbsp;</span>Grilla WS</a>
			<?php
			if (isset($_SESSION["user"])) {

			
		echo "<a class='btn btn-primary animated bounceInLeft' href='formAlta.php'><span class='glyphicon glyphicon-plus-sign'>&nbsp;</span>Alta</a>";
            }
           	if (!isset($_SESSION["user"])) {
           		
           	
         echo "<a class='btn btn-primary animated bounceInLeft' href='login.php'> <span class='glyphicon glyphicon-th'>&nbsp;</span>   Logearse</a>";
            }
            ?>		    

		    
            <?php
			if (isset($_SESSION["user"])) {

			

		    echo  "<a class='btn btn-primary animated bounceInLeft' href='logout.php'> <span class='glyphicon glyphicon-th'>&nbsp;</span>    Logut</a>";
           }
           ?>
			<span id="tituloBarra"  class="animated bounceInRight">ABM - WS</span>

	</div>
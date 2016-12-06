 
 <html>

 <form id="FormIngreso" method="post" action="formAlta.php" enctype="multipart/form-data" >
				<input type="text" name="apellido" id="apellido" placeholder="ingrese apellido" value="<?php echo isset($unaPersona) ?  $unaPersona->GetApellido() : "" ; ?>" /><span id="lblApellido" style="display:none;color:#FF0000;width:1%;float:right;font-size:80">*</span>
				<input type="text" name="nombre" id="nombre" placeholder="ingrese nombre" value="<?php echo $_POST['nombre'];?> " /> <span id="lblNombre" style="display:none;color:#FF0000;width:1%;float:right;font-size:80">*</span>
				<input type="text" name="dni" id="dni" placeholder="ingrese dni" value="<?php echo isset($unaPersona) ?  $unaPersona->GetDni() : "" ; ?>" <?php echo isset($unaPersona) ?  "readonly": "" ; ?>        /> <span id="lblDni" style="display:none;color:#FF0000;width:1%;float:right;font-size:80">*</span>
				<?php echo isset($unaPersona) ? 	"<p style='color: black;'>*El DNI no se puede modificar.</p> ": "" ; ?>
				<input type="hidden" name="idOculto" id="id" value="<?php echo isset($unaPersona) ? $unaPersona->GetId() : "" ; ?>" />
				<input type="file" name="foto" id="foto" />


				<img  src="fotos/<?php echo isset($unaPersona) ? $unaPersona->GetFoto() : "pordefecto.png" ; ?>" class="fotoform" id="foto"/>
				<p style="  color: black;">*La foto se actualiza al guardar.</p>


				<a class="btn btn-info " name="guardar" onclick="GuardarPersona()" ><span class="glyphicon glyphicon-save">&nbsp;</span>Guardar</a>
					
				<input type="hidden" value="<?php echo $_POST['idParaModificar']; ?>" id="idParaModificar" name="agregar" />
				<input type="hidden" value="" id="hdnAgregar" name="agregar" />
				</div>

			</form>
 <div id="frmMod" align="center">

</div>

         </html>
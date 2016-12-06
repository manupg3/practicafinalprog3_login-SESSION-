
function GuardarPersona(id){
        alert(id);
    
             if(id==null){
             	alert("ID NULL");
             var path=window.location.pathname.substring(1);
			var ape = document.getElementById('apellido').value;
			var nom = document.getElementById('nombre').value;
			var dnii = document.getElementById('dni').value;
            
			var fotoo = document.getElementById('foto').value;
       
	$.ajax({
	        type: "POST",
	        url: "http://127.0.0.1/practicaFinalProg3_login/ws/index.php/personas/",
	        data: {"nombre":nom,"apellido":ape,"dni":dnii,"foto":fotoo},
	        dataType:"json",
	        success: function(data, textStatus, jqXHR){
	            console.log(data,textStatus,jqXHR);
	          //  renderLista(data);
	           document.location.href="formGrillaWS.php";
	        },
	        error: function(jqXHR, textStatus, errorThrown){
	            console.log(errorThrown);
	            alert("No se pudo modificarrrr " + errorThrown);
	        }
	    });
      }
      else{
       	var ape = document.getElementById('apellido').value;
			var nom = document.getElementById('nombre').value;
			var dnii = document.getElementById('dni').value;
			var fotoo = document.getElementById('foto').value;
        alert(id);

	$.ajax({
	        type: "PUT",
	        url: "http://127.0.0.1/practicaFinalProg3_login/ws/index.php/personas/",
	        data: {"nombre":nom,"apellido":ape,"dni":dnii,"foto":fotoo,"id":id},
	       
	        success: function(data, textStatus, jqXHR){
	            
	             document.location.href="formGrillaWS.php";
	        },
	        error: function(jqXHR, textStatus, errorThrown){
	            console.log(errorThrown);
	            alert("No se pudo modificar " + errorThrown);
	        }
	    });   

      }
}
function validarLogin(){

   var usuario=document.getElementById("user").value;
   var pass=document.getElementById("psw").value;
   alert(usuario+pass);
     $.ajax({
	        type: "POST",
	        url: "http://127.0.0.1/practicaFinalProg3_login/ws/index.php/login/",
	        data: {"user":usuario,"password":pass},
	  
	        success: function(data, textStatus, jqXHR){
	            // console.log(data);
	           // alert(data);
            // alert("asd");
               if(data.user==usuario){

              CrearSession(data);
	             }
	             else{
	             	alert("USUARIO INCORRECTO..");
	             }
	        },
	        error: function(jqXHR, textStatus, errorThrown){
	            console.log(errorThrown);
	            alert("No se pudo modificar " + errorThrown);
	        }
	    });   
   }
function CrearSession(data){
	$.ajax({
	        type: "POST",
	        url: "CrearSession.php",
	        data: {"user":data.user},
	       
	          
	        success: function(data, textStatus, jqXHR){
	   //          console.log(data);
             document.location.href="index.php";
             alert("SERAS REDIRECCIONADO..");     


	        },
	        error: function(jqXHR, textStatus, errorThrown){
	            console.log(errorThrown);
	            alert("No se pudo modificar " + errorThrown);
	        }
	    });
}   
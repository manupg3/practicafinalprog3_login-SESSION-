
     
function Borrar(id)
{
	
	// var id =document.getElementById();
	$.ajax({
        type: 'DELETE',
        url: "http://127.0.0.1/practicaFinalProg3/ws/index.php/personas/" + id,
        success: function(data, textStatus,jqXHR){
            console.log(textStatus);
            console.log("data"+data);
			cargar();            
        },
        error: function(jqXHR, textStatus, errorThrown){
            console.log(errorThrown);
        }
    });

	// document.getElementById('idParaBorrar').value = id;
	// document.frmBorrar.submit();
}
function mostrarFrmMod(data) {
          var funcionA=$.ajax({url:"mostrarFrmMod.php",type:"post",data:{nombre:data[0].nombre,apellido:data[0].apellido,dni:data[0].dni,foto:data[0].foto}});
      funcionA.done(function(retorno){
                 console.log(retorno);
           
       });
funcionA.fail(function(retorno){
    $("#Mostrar").html("ERROR");
    $("#infome").html(retorno.responseText); 
    }); 
}

function Modificar(id)
 {               
 		$.ajax({
         type: 'GET',
         url: "http://127.0.0.1/practicaFinalProg3/ws/index.php/personas/" + id,
        dataType:"json",
         success: function(data, textStatus, jqXHR){
              document.location.href="formAlta.php?nombre="+data[0].nombre+"&apellido="+data[0].apellido+"&dni="+data[0].dni+"&foto="+data[0].foto+"&id="+data[0].id;

               console.log(data);
         },
         error: function(jqXHR, textStatus, errorThrown){
             console.log(errorThrown);
         }
     });
     
        
	
//	document.getElementById('idParaModificar').value = id;
//	document.frmModificar.submit();
}

function renderLista(data) {
	
	var lista = data == null ? [] : (data instanceof Array ? data : [data]);
	
	$('#listaPersonas tr:not(:first)').remove();
	
	$.each(lista, function(index, persona) {
				
		$('#listaPersonas').append("<tr><td><img  class='fotoGrilla' src='fotos/" + persona.foto + "' /></td><td>"+ persona.nombre +"</td><td>"+ persona.apellido + "</td><td>"+ persona.dni +"</td><td><button class='btn btn-danger' name='Borrar' onclick='Borrar("+ persona.id +")'>   <span class='glyphicon glyphicon-remove-circle'>&nbsp;</span>Borrar</button></td><td><button class='btn btn-warning' id='btnmod' name='Modificar' onclick='Modificar("+ persona.id + ")'><span class='glyphicon glyphicon-edit'>&nbsp;</span>Modificar</button></td></tr>");				

	});
}

function cargar(){
		$.ajax({
	        type: "GET",
	        url: "http://127.0.0.1/practicaFinalProg3/ws/index.php/personas/",
	        success: function(data, textStatus, jqXHR){
	            console.log(data,textStatus,jqXHR);
	            renderLista(data);
	        },
	        error: function(jqXHR, textStatus, errorThrown){
	            console.log(errorThrown);
	            alert("No se pudo modificar " + errorThrown);
	        }
	    });
}
   		
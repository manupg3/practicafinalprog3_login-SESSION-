<?php
if(!defined("SPECIALCONSTANT")) die("Acceso denegado");
// var_dump($app);

// GET: Para consultar y leer recursos
// POST: Para crear recursos
// PUT: Para editar recursos
// DELETE: Para eliminar recursos

// GET: Para consultar y leer recursos

$app->get("/personas/", function() use($app)
{
	$cnn = Conexion::DameAcceso();
	$sentencia = $cnn->prepare('SELECT * FROM persona');
	
	$sentencia->execute();
	$res = $sentencia->fetchAll(PDO::FETCH_ASSOC);
		
	$app->response->headers->set("Content-type", "application/json");
	$app->response->status(200);
	$app->response->body(json_encode($res));
});

$app->get("/personas/:id", function($id) use($app)
{
	try{
		$cnn = Conexion::DameAcceso();

		$sentencia = $cnn->prepare('SELECT * FROM persona WHERE id=:id');
				$sentencia->bindValue(":id", $id, PDO::PARAM_INT);

		$sentencia->execute(array($id));
		$res = $sentencia->fetchAll(PDO::FETCH_ASSOC);
		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
    	$app->response->body(json_encode($res));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
});

$app->post("/login/", function() use($app)
{
    	$nomUser = $app->request->post("user");
        $pas=$app->request->post("password");

 
	 try{
	 	$cnn = Conexion::DameAcceso();

	 	$sentencia = $cnn->prepare('SELECT * FROM usuarios ');

	 	$sentencia->execute();
	     $res = $sentencia->fetchObject();
        
        if($res->user==$nomUser){
             
           
    	$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
    	$app->response->body(json_encode($res));
   }
  else{
  $res=array("rsta"=>false);
     	$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
     	$app->response->body(json_encode($res));
     }
	}
	 catch(PDOException $e)
	 {
	 	echo "Error: " . $e->getMessage();
	 }
});

// POST: Para crear recursos
$app->post("/personas/", function() use($app)
{
	$nombre = $app->request->post("nombre");
	$dni = $app->request->post("dni");
	$apellido = $app->request->post("apellido");
    $foto=$app->request->post("foto");
	//$foto = "pordefecto.png";//$app->request->post("foto");

	$cnn = Conexion::DameAcceso();
	$sentencia = $cnn->prepare('INSERT INTO persona(nombre,apellido,dni,foto) VALUES(:nombre,:apellido,:dni,:foto)');
	 $sentencia->bindValue(':nombre', $nombre, PDO::PARAM_STR);
		$sentencia->bindValue(':apellido', $apellido, PDO::PARAM_STR);
		$sentencia->bindValue(':dni', $dni, PDO::PARAM_STR);
		$sentencia->bindValue(':foto', $foto, PDO::PARAM_STR);
	
	$status = 200;
	if ($sentencia->execute(array($nombre, $apellido, $dni, $foto)))
		$res = array("rta" => $foto);	
	else{
		$res = array("rta" => false);
		$status = 500;
	}
	$app->response->headers->set("Content-type", "application/json");
	$app->response->status($status);
	$app->response->body(json_encode(json_encode($res)));
});


// PUT: Para editar recursos
$app->put("/personas/", function() use($app)
{    
	$nombre = $app->request->put("nombre");
	$id = $app->request->put("id");
	$dni=$app->request->put("dni");
	$apellido = $app->request->put("apellido");
	$foto = $app->request->put("foto");
       
	 $cnn = Conexion::DameAcceso();
	 $sentencia = $cnn->prepare('UPDATE persona SET nombre=:nombre, apellido=:apellido,dni=:dni,foto=:foto WHERE id=:id');
	  				$sentencia->bindValue(":id", $id, PDO::PARAM_INT);
	  				 $sentencia->bindValue(':nombre', $nombre, PDO::PARAM_STR);
		$sentencia->bindValue(':apellido', $apellido, PDO::PARAM_STR);
		$sentencia->bindValue(':dni', $dni, PDO::PARAM_STR);
		$sentencia->bindValue(':foto', $foto, PDO::PARAM_STR);

	 $status = 200;
	 if ($sentencia->execute())
	 	$res = array("rta" => true);	
	 else{
		$res = array("rta" => false);
		$status = 500;
	}
	
	$app->response->headers->set("Content-type", "application/json");
	$app->response->status($status);
	$app->response->body(json_encode($res));
});
// DELETE: Para eliminar recursos
$app->delete("/personas/:id", function($id) use($app)
{
	try{
		$cnn = Conexion::DameAcceso();
		$sentencia = $cnn->prepare('DELETE FROM persona WHERE id=:id');
	//	 $sentencia->bindValue(':id', $id, PDO::PARAM_INT);
		$sentencia->execute(array($id));

		$app->response->headers->set("Content-type", "application/json");
		$app->response->status(200);
		$app->response->body(json_encode(array("res" => 111)));
	}
	catch(PDOException $e)
	{
		echo "Error: " . $e->getMessage();
	}
});
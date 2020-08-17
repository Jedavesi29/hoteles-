<?php 
require_once "conexion.php";
require_once "usuarios.php";
require_once "hotel.php";
class Data{
	private $con;

	public function __construct(){
		$this->con = new Conexion();
	}

	// LOGIN INICIO DE SESION PARA ADMINS Y USUARIOS
	public function login($usuario, $password, $toke){
			$query = "SELECT * from usuarios where usuario = '$usuario' LIMIT 1";
			$res = $this->con->ejecutar($query);

			if ($res = $this->con->ejecutar($query)) {
				/* obtener el array de objetos */
				while($reg = $res->fetch_object()){
					$passwordDB = $reg->password;
					$id = $reg->id;
				}

				if (isset($passwordDB) && !is_null($passwordDB)) {
					if (password_verify($password, $passwordDB)) {
						$query = "INSERT INTO token values(null, '$toke')";
						$res = $this->con->ejecutar($query);

						$_SESSION['usuario'] = $usuario;
						$_SESSION['loggedin'] = true;
						$_SESSION["id"] = $id;
						$_SESSION["token"] = $toke;
					}else{
						$usuario=null;
					}
				} else{
					$usuario=null;
				}
			} else {
				$usuario=null;
			}
		// $res->close();
		return $usuario;
	}

	public function insert_usuario($usuario, $password){
		$query = "INSERT into usuarios values(null, '$usuario', '$password')";
		$this->con->ejecutar($query);
	}

	public function getUsuaios(){
		$usuarios = array();

		$query = "SELECT * FROM usuarios";
		$res = $this->con->ejecutar($query);

		while($reg = $res->fetch_object()){
			$u = new Usuario();

			$u->id = $reg->id;
			$u->usuario = $reg->usuario;
			$u->password = $reg->password;

			array_push($usuarios, $u);
		}

		return $usuarios;
	}

	public function actualizar_usuario($id, $usuario, $password){
		//Actualizar usuario
		$query = "UPDATE usuarios set usuario = '$usuario', password = '$password' where id=$id";
		$this->con->ejecutar($query);
	}

	public function buscar_usuario($id){
		$usuarios = array();

		$query = "SELECT * from usuarios where id=$id LIMIT 1";
		$res = $this->con->ejecutar($query);

		while($reg = $res->fetch_object()){
			$u = new Usuario();

			$u->id = $reg->id;
			$u->usuario = $reg->usuario;
			$u->password = $reg->password;

			array_push($usuarios, $u);
		}

		return $usuarios;
	}


public function	newHotel($nombre, $estrellas,$ciudad,$descripcion,$toke){

	 $query = "SELECT id, acceso FROM token WHERE acceso= '$toke' ";
	$res = $this->con->ejecutar($query);
	$reg = $res->fetch_assoc();
	if (isset($reg)) { 
		$query = "INSERT INTO hoteles VALUES (null,'$nombre',$estrellas,'$ciudad','$descripcion')";
		$this->con->ejecutar($query);
	
	} 


}

public function getHoteles(){
	$hoteles = array();

	$query = " SELECT * FROM hoteles ORDER BY id DESC";
	$res = $this->con->ejecutar($query);

	while($reg = $res->fetch_object()){
		$h = new Hoteles();

		$h->id = $reg->id;
		$h->nombre = $reg->nombre;
		$h->estrellas = $reg->estrellas;
		$h->ciudad = $reg->ciudad;
		$h->descripcion = $reg->descripcion;

		array_push($hoteles, $h);
	}

	return $hoteles;
}

  public function deleteHotel($id){

		$query = "DELETE FROM hoteles WHERE  id=$id  ";
		$this->con->ejecutar($query);
	

}

 public function  buscarHotel($id){

	$hotel = array();

		$query = "SELECT * from hoteles where id=$id LIMIT 1";
		$res = $this->con->ejecutar($query);

		while($reg = $res->fetch_object()){
			$h = new Hoteles();

			$h->id = $reg->id;
			$h->nombre = $reg->nombre;
			$h->estrellas = $reg->estrellas;
			$h->ciudad = $reg->ciudad;
			$h->descripcion = $reg->descripcion;
			array_push($hotel, $h);
		}

		return $hotel;


}


public function recienHoteles(){
	$hoteles = array();

	$query = " SELECT * FROM hoteles ORDER BY id DESC LIMIT 4";
	$res = $this->con->ejecutar($query);

	while($reg = $res->fetch_object()){
		$h = new Hoteles();

		$h->id = $reg->id;
		$h->nombre = $reg->nombre;
		$h->estrellas = $reg->estrellas;
		$h->ciudad = $reg->ciudad;
		$h->descripcion = $reg->descripcion;

		array_push($hoteles, $h);
	}

	return $hoteles;
}

}

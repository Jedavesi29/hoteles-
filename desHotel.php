<?php
session_start();
require_once "model/data.php";

$d=new Data();

$id=$_GET["id"];
$hotel = $d->buscarHotel($id);
 foreach ($hotel as $h) {
 $h->nombre;
 $h->estrellas;
 $h->ciudad;
 $h->descripcion;
 }

 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

include 'header.php';

?>



<div class="container-fluid">
 <div class="d-sm-flex align-items-center justify-content-between mb-4">

</div>

<div class="row" style="margin-top: 10px;">
	<div class="col s12 m4 center">
	<div class="col s12">
  
  <h2> <strong> Informacion del Hotel</strong></h2></div> 
		<img src="images/hotel.jpg" class="circle foto_perfil" alt="Foto perfil" width="100%">
  </div>	
	<div class="col m8">
  
<br>
   <h4><?php echo "<strong>$h->nombre</strong>";  ?>
  </h4>
			<div class="col s12"><?php echo "<strong>Estrellas:</strong> ".$h->estrellas; ?></div>
			<div class="col s12"><?php echo "<strong>Ciudad:</strong> ".$h->ciudad; ?></div> 
			<div class="col s12"><?php echo "<strong>Descrpcion:</strong> ".$h->descripcion; ?></div> 
			
		
	</div>
</div>


<?php
include 'footer.php';
?>
</div>


<?php } else{ include("login.php");}
			?>
<?php
session_start();
require_once "model/data.php";

$d=new Data();

$recientes=$d->recienHoteles();
$contador=0;
$hoteles = $d->getHoteles();
foreach ($hoteles as $h){$contador++;}

$cantidad=0;
$usuario=$d->getUsuaios();
foreach ($usuario as $u){$cantidad++;}
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
include 'header.php';
?>


<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Bienvenido</h1>
  
</div>

<!-- Content Row -->
<div class="row">

  <!-- Earnings (Monthly) Card Example -->
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total De Hoteles Registrados</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800" ><?php echo $contador  ?></div>
          </div>
          <div class="col-auto">
          <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

 
  <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Usuarios Registrados</div>
            <div class="h5 mb-0 font-weight-bold text-gray-800"> <?php echo $cantidad ?></div>
          </div>
          <div class="col-auto">
          <i class="fas fa-user fa-2x text-gray-300"></i>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="row">
<div class="col-md-5">



<h4><strong>Hoteles RECIEN AGG</strong></h4>


<div class="card-body">
<div class="table-responsive">
<table class="table">
<thead class="thead-dark">
<tr>
<th scope="col">nombre</th>
<th scope="col">ciudad</th>
<th scope="col">Estrellas</th>


</tr>
</thead>
<?php foreach ($recientes as  $h){ ?>
<tbody>
<tr>
<th scope="row"><?php echo $h->nombre?></th>
<th scope="row"><?php echo $h->ciudad?></th>
<td><?php echo  $h->estrellas?></td>


</tr>

</tbody><?php  }?>
</table>

</div>
</div>
</div>
<div class="col-md-4">






</div>

<?php } else{ include("login.php");}
			?>
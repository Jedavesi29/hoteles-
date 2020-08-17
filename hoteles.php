<?php
session_start();
require_once "model/data.php";

$d= new Data();


$hoteles= $d->getHoteles();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
include 'header.php';
?>



<div class="row">
  <div class="col s12 l4"></div>
  <div class="col s12 l4"></div>
  <div class="col s12 l4"></div>

  <div class="col s12 l6"></div>

  <div class="col s12 l6"></div>
</div>

<div class="container-fluid">
  
 
  <!-- Busqueda-->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Hoteles Registrados</h6>
      <span style='display:block; width:50%; text-align: right;'><button id="btn-abrir-popup" class="btn btn-success btn-icon-split btn-abrir-popup">
            <span class="icon text-white-30">
                     <i class="fas fa-mobile-alt"></i>    

            </span> 
            <span class="text">Agregar Hotel</span>
          </button></span>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable"  cellspacing="0">
          <thead>
            <tr>
             
              <th>#</th>
              <th>Nombre</th>
              <th> Estrella</th>
              <th>Ciudad</th>
              <th>Descripcion</th>
              <th>Detalles</th>

            </tr>
          </thead>
          <tfoot>
            <tr>
            
            <th>#</th>
              <th>Nombre</th>
              <th> Estrella</th>
              <th>Ciudad</th>
              <th>Descripcion</th>
              <th>Detalles</th>

            </tr>
          </tfoot>

          <tbody>
            <?php
            $cantidad=0;
            foreach($hoteles as $h){ $cantidad++;
            ?>
              <tr>
              
                <td> <?php echo $cantidad;   ?></td>
                <td> <?php echo $h->nombre;   ?></td>
                <td> <?php echo $h->estrellas;   ?></td>
                <td> <?php echo $h->ciudad;   ?></td>
                <td> <?php echo $h->descripcion;   ?></td>

                <td>
                  <a class='btn btn-primary btn-circle  btn-sm' href='desHotel.php?id=<?php echo $h->id ?>'><i class="fas fa-info-circle"></i>
                  </a>

                  <br>
                  <br>


                  <button class='btn btn-danger btn-circle  btn-sm' type='submit' data-toggle='modal' data-target='#exampleModalBorrar<?php echo $h->id ?>'><i class='fas fa-trash'></i>
                  </button>
                  </td>
              </tr>

              <div class="modal fade " id="exampleModalBorrar<?php echo $h->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form action="controller/eliminarProducto.php" method="post">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Borrar El Hotel: <?php echo $h->nombre; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>

                  <div class="modal-body">
                    <input type="hidden" name="id" value="<?php echo $h->id; ?>">

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                      <button name="action" id="action" type="submit" class="btn btn-primary">Borrar</button>
                    </div>
                  </div>
              </div>
              </form>
            </div>

            <?php } ?>
           
          </tbody>
 <!-- MODAL BORRAR-->
 
        </table>
      </div>
    </div>
  </div>

</div>




<div class="overlay" id="overlay">
  <div class="popup" id="popup">
    <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
    <h1>AGREGAR HOTEL</h1>

    <form action="controller/agregarHotel.php" method="post">
      <div class="input-field col s12 m12">

      </div>
      <div class="contenedor-inputs">
        <div>
        <input  name="token" type="hidden" class="validate" value="<?php echo $_SESSION["token"];  ?>"  required>
          <label for="nombre">Agregar Nombre</label>
          <input id="nombre" name="nombre" type="varchar" class="validate" placeholder="Añade Nombre"  required>
          <label for="estrellas">Estrellas</label>
          <input id="estrellas" name="estrellas" type="number" class="validate"  placeholder="Añade Estrellas"  required>
          <label for="ciudad">Ciudad</label>
          <input id="ciudad" name="ciudad" type="text" class="validate"   placeholder="Añade Ciudad"  required>
        </div>
        <label for="descripcion">Descripcion Del Hotal</label>
        <input id="descripcion" name="descripcion" type="text" class="validate" placeholder="Añade Descripcion" required>


        
      </div>
      <input type="submit" class="btn-submit " value="AGREGAR">
    </form>
  </div>
</div>
</div>



<?php
include 'footer.php';
?>
<!--
<script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->

  <!-- Core plugin JavaScript
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->

  <!-- Custom scripts for all pages
  <script src="js/sb-admin-2.min.js"></script> -->

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>


<script src="popup.js"></script>



<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
<link rel="stylesheet" href="estilos.css">

<script src="js/texto.js"></script>
<link rel="stylesheet" href="CSS2/bootstrap.min.css">
<link rel="stylesheet" href="CSS2/bootstrap-grid.min.css">

<?php } else{ include("login.php");}
			?>
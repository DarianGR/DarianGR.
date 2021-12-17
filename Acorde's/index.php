<?php
session_start();
require 'funciones.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Best Guitar Shop</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel = "icon" href = "upload/icon.png" type = "image/x-icon">
    <style>
      *{
        font-family:'Poppins';
      }
      .border{
        border: 0;
      }
      .cardChida{
        display:flex; 
        flex-wrap:wrap; 
        align-items: center; 
        justify-content: center; 
        align-content:center; 
        margin: 0 30px 50px 30px;
      }
      .titlePage{
        font-size:28px;
        font-weight: bold;
        padding-left: 40px;
        letter-spacing: 3.5px;
      }
      .bC{
        background-color: #3e214e;
        filter: blur(.3px);
      }
    </style>
  </head>

  <body>

<nav class="navbar navbar-expand-lg bC" style>    
  <div class="container-fluid">    
    <a class="navbar-brand text-light titlePage" style="font-family:'Quicksand';" href="#">Acorde's</a>     
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">     
      <span class="navbar-toggler-icon"></span>    
    </button>    
    <div class="collapse navbar-collapse" id="navbarScroll">     
      <ul class="navbar-nav my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px; width:100%; display:flex; justify-content:center;">          
        <li class="nav-item">    
          <a class="nav-link text-light" href="#" tabindex="-1" aria-disabled="true">Gibson</a>    
        </li>
        <li class="nav-item">    
          <a class="nav-link text-light" href="#" tabindex="-1" aria-disabled="true">Fender</a>    
        </li>   
        <li class="nav-item">    
          <a class="nav-link text-light" href="#" tabindex="-1" aria-disabled="true">Rickenbacker</a>    
        </li>
                             
      </ul>    
      <form class="d-flex" style="width:20%">
        <a style="color:white;" href="panel/guitarras/index.php" class="btn"><i class="fas fa-user"></i></a>    
        <a style="color:white;" href="carrito.php" class="btn"><i class="fas fa-shopping-cart"></i> <span class="badge"><?php print cantidadGuitarras(); ?></span></a>     
        <a style="color:white;" href="https://es-la.facebook.com" class="btn"><i class="fab fa-facebook-square"></i> </a>    
        <a style="color:white;" href="https://www.instagram.com/?hl=es-la" class="btn"><i class="fab fa-instagram-square"></i> </a>    
      </form>    
    </div>     
  </div>     
</nav>     
 
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="upload/megabanner.jpg" alt="First slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

    <div class="container bM" id="main">
        <div class="row">
            <?php
              require 'vendor/autoload.php';
              $guitarra = new GuitarShop\Guitarra;
              $info_guitarras = $guitarra->mostrar();
              $cantidad = count($info_guitarras);
              if($cantidad > 0){
                for($x =0; $x < $cantidad; $x++){
                  $item = $info_guitarras[$x];
            ?>
              <div class="col-md-3">
                  <div class="panel-default cardChida">
                    <div>
                      <h1 class="text-center" style="margin-bottom: 15px; font-size: 20px; font-weight: bold;"><?php print $item['titulo'] ?></h1>  
                    </div>
                    <div class="panel-body">
                      <?php
                          $foto = 'upload/'.$item['foto'];
                          if(file_exists($foto)){
                        ?>
                          <img src="<?php print $foto; ?>" style="width:100%;height:100%;" >
                      <?php }else{?>
                        <img src="assets/imagenes/not-found.jpg" class="img-responsive">
                      <?php }?>
                    </div>
                    <div style="margin-bottom: 50px; margin-top: 20px;">
                        <a href="carrito.php?id=<?php print $item['id'] ?>" class="btn btn-success btn-block " style="background-color:#000; border: none;">
                          <span  class="fas fa-shopping-cart"></span> Añadir
                        </a>
                    </div>
                  </div>
              </div>
          <?php
                }
            }else{?>
              <h4>No hay registros</h4>
          <?php }?>
        </div>
    </div>

<footer class="text-center text-lg-start">
  <div class="text-center p-3 text-light" style="background-color: #3e214e;">
    © Programación Web 2021:
    <p class="text-light" >Miguel Angel Martínez Mendoza -- Darian García Rentería</p>
  </div>
</footer>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>

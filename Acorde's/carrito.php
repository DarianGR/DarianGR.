<?php
session_start();
require 'funciones.php';

if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];
    require 'vendor/autoload.php';
    $guitarra = new GuitarShop\Guitarra;
    $resultado = $guitarra->mostrarPorId($id);
    
    if(!$resultado)
       header('Location: index.php');
      
    if(isset($_SESSION['carrito'])){ 
        if(array_key_exists($id,$_SESSION['carrito'])){
            actualizarGuitarra($id);
        }else{
            agregarGuitarra($resultado, $id);
        }
    }else{
        agregarGuitarra($resultado, $id);
    }
}  

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Best Guitar Shop</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
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
    <a class="navbar-brand text-light titlePage" style="font-family:'Quicksand';" href="index.php">Acorde's</a>     
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
        <a style="color:white;" href="index.php" class="btn"><i class="fas fa-home"></i> </a>      
        <a style="color:white;" href="carrito.php" class="btn"><i class="fas fa-shopping-cart"></i> <span class="badge"><?php print cantidadGuitarras(); ?></span></a>     
        <a style="color:white;" href="https://es-la.facebook.com" class="btn"><i class="fab fa-facebook-square"></i> </a>    
        <a style="color:white;" href="https://www.instagram.com" class="btn"><i class="fab fa-instagram-square"></i> </a>    
      </form>    
    </div>     
  </div>     
</nav>

    <div class="container" id="main">
            <table class="table table-bordered table-hover" style="text-align:center; justify-content:center; align-items:center; align-content:center;">
                  <thead>
                    <tr style="text-align:center;">
                      <th>#</th>
                      <th>Guitarra</th>
                      <th>Foto</th>
                      <th>Precio</th>
                      <th>Cantidad</th>
                      <th>Total</th>
                      <th>Agregar/Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                        if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
                            $c=0;
                            foreach($_SESSION['carrito'] as $indice => $value){
                                $c++;
                                $total = $value['precio'] * $value['cantidad'];
                      ?>
                        <tr>
                            <form action="actualizar_carrito.php" method="post">
                                <td><?php print $c ?></td>
                                <td><?php print $value['titulo']  ?></td>
                                <td>
                                    <?php
                                        $foto = 'upload/'.$value['foto'];
                                        if(file_exists($foto)){
                                        ?>
                                        <img src="<?php print $foto; ?>" width="35">
                                    <?php }else{?>
                                        <img src="assets/imagenes/not-found.jpg" width="35">
                                    <?php }?>
                                </td>
                                <td><?php print $value['precio']  ?> Pesos</td>
                                <td>
                                <input type="hidden" name="id" style="justify-content:center; align-items:center; align-content:center;"  value="<?php print $value['id'] ?>">
                                    <input type="text" name="cantidad" class="form-control u-size-100" value="<?php print $value['cantidad'] ?>">
                                </td>
                                <td>
                                    <?php print $total  ?> Pesos
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-success btn-xs">
                                        <i class="fas fa-sync-alt"></i> 
                                    </button>

                                    <a href="eliminar_carrito.php?id=<?php print $value['id']  ?>" class="btn btn-danger btn-xs">
                                        <i class="fas fa-trash"></i> 
                                    </a>


                                </td>
                            </form>
                        </tr>

                    <?php
                        }
                        }else{
                    ?>
                        <tr>
                            <td colspan="7">No hay productos en el carrito</td>

                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
                <tfoot>
                        <tr>
                            <td colspan="5" class="text-right"><b>Total:</b></td>
                            <td><?php print calcularTotal(); ?> Pesos</td>
                            <td></td>
                        </tr>

                </tfoot>
            </table>
            <hr>
            <?php
                if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
            ?>  
            <div class="row">
                    <div style="width: 100%; display:flex; justify-content:center;">
                        <a style="margin-right: 100px; background-color:black; border:none;" href="index.php" class="btn btn-success">Seguir Comprando</a>
                        <a href="finalizar.php" class="btn btn-success" style="background-color:black; border:none;">Finalizar Compra</a>
                    </div>
            </div>

            <?php
                }
            ?>
    </div> 
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

  </body>
</html>

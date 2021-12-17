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
    <a class="navbar-brand text-light titlePage" style="font-family:'Quicksand';" href="#">Acorde's</a>     
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">     
      <span class="navbar-toggler-icon"></span>    
    </button>    
    <div class="collapse navbar-collapse" id="navbarScroll">        
      <form class="d-flex" style="width:20%">
        <a style="color:white;" href="index.php" class="btn"><i class="fas fa-home"></i> </a>   
        <a style="color:white;" href="https://es-la.facebook.com" class="btn"><i class="fab fa-facebook-square"></i> </a>    
        <a style="color:white;" href="https://www.instagram.com" class="btn"><i class="fab fa-instagram-square"></i> </a>    
      </form>    
    </div>     
  </div>     
</nav>

    <div class="container" id="main">
        <div class="main-form">
            <div class="row">
                <div class="col-md-12">
                    <fieldset>
                        <legend>Completar Datos</legend>
                            <form action="completar_pedido.php" method="post">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" class="form-control" name="nombre" required>
                                </div>
                                <div class="form-group">
                                    <label>Apellidos</label>
                                    <input type="text" class="form-control" name="apellidos" required>
                                </div>
                                <div class="form-group">
                                    <label>Correo</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label>Teléfono</label>
                                    <input type="text" class="form-control" name="telefono" required>
                                </div>
                                <div class="form-group">
                                    <label>Comentario</label>
                                    <textarea name="comentario" class="form-control"  rows="4"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block" style="margin-top: 20px;">Enviar</button>
                            </form>
                    </fieldset>
                </div>
            </div>
        </div>
    </div> 
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

  </body>
</html>

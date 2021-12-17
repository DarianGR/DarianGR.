<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Best Guitar Shop</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/estilos.css">
    <link rel = "icon" href = "../../upload/icon.png" type = "image/x-icon">
  </head>
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
      #main{
        margin-top: 40px;
      }
    </style>
  <body>

    <nav class="navbar navbar-expand-lg bC" style>    
      <div class="container-fluid">    
        <a class="navbar-brand text-light titlePage" style="font-family:'Quicksand';" href="../dashboard.php">Acorde's</a>     
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">     
          <span class="navbar-toggler-icon"></span>    
        </button>    
        <div class="collapse navbar-collapse" id="navbarScroll">     
          <ul class="navbar-nav my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px; width:100%; display:flex; justify-content:flex-end;">    
            <li class="nav-item" style="margin-left: 40px; margin-right: 40px;">    
              <a class="nav-link text-light" href="../../index.php">Home</a>     
            </li>  
            <li class="nav-item" style="margin-left: 40px; margin-right: 40px;">    
              <a class="nav-link active text-light" aria-current="page" href="index.php">Pedidos</a>    
            </li>    
            <li class="nav-item" style="margin-left: 40px; margin-right: 40px;">    
              <a class="nav-link text-light" href="../guitarras/index.php">Guitarras</a>     
            </li>
                                   
          </ul>

        </div>     
      </div>     
    </nav>

    <div class="container" id="main">
    <div class="row">
          <div class="col-md-12">
            <fieldset>
                <?php
                    require '../../vendor/autoload.php';
                    $id = $_GET['id'];
                    $pedido = new GuitarShop\Pedido;

                    $info_pedido = $pedido->mostrarPorId($id);

                    $info_detalle_pedido = $pedido->mostrarDetallePorIdPedido($id);

                ?>
                <legend>Información de la Compra</legend>
                <div class="form-group">
                    <label>Nombre</label>
                    <input value="<?php print $info_pedido['nombre'] ?>" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Apellidos</label>
                    <input value="<?php print $info_pedido['apellidos'] ?>" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input value="<?php print $info_pedido['email'] ?>" type="text" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Fecha</label>
                    <input value="<?php print $info_pedido['fecha'] ?>" type="text" class="form-control" readonly>
                </div>
                <hr>
                    Productos Comprados
                <hr>
                <table class="table table-bordered" style="text-align:center;">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Titulo</th>
                      <th>Foto</th>
                      <th>Precio</th>
                      <th>Cantidad</th>
                      <th>
                          Total
                      </th>
                    </tr>
                  </thead>
                  <tbody> 
                    <?php
                                      
                      $cantidad = count($info_detalle_pedido);
                      if($cantidad > 0){
                        $c=0;
                      for($x =0; $x < $cantidad; $x++){
                        $c++;
                        $item = $info_detalle_pedido[$x];
                        $total = $item['precio'] * $item['cantidad'];
                    ?>
                    <tr>
                      <td><?php print $c?></td>
                      <td><?php print $item['titulo']?></td>
                      <td>
                      <?php
                          $foto = '../../upload/'.$item['foto'];
                          if(file_exists($foto)){
                        ?>
                          <img src="<?php print $foto; ?>" width="35">
                      <?php }else{?>
                          SIN FOTO
                      <?php }?>
                      </td>
                      <td><?php print $item['precio']?> Pesos</td>
                      <td><?php print $item['cantidad']?></td>
                    <td>
                    <?php print $total?>
                    </td>
                    </tr>
                    <?php
                      }
                    }else{
                    ?>
                    <tr>
                      <td colspan="6">No hay registros</td>
                    </tr>
                    <?php }?>               
                  </tbody>
                </table>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Total Compra</label>
                        <input value="<?php print $info_pedido['total'] ?>" type="text" class="form-control" readonly>
                    </div>
                </div>
                
            </fieldset>
            <div style="display: flex; justify-content:center;">
                <a href="index.php" style="margin-right: 50px;" class="btn btn-secondary">Cancelar</a>
                <a href="javascript:;" id="btnImprimir" class="btn btn-success">Imprimir</a>
            </div>
          </div>
        </div>
    </div>
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script>
        $('#btnImprimir').on('click',function(){

            window.print();

            return false;

        })                        
    </script>
  </body>
</html>

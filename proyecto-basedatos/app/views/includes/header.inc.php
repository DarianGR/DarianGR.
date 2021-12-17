<!doctype html>
<html class="h-100" lang="en">
  <head>
    <title><?= TITLE; ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/bootstrap.min.css">


    <!-- Fontawesone CSS v6 -->
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/all.min.css">



  </head>
  <body class="d-flex flex-column h-100">
        <header class="mt-3">
            <h1 class="container">Empresas Tecnol&oacute;gicas S.A de C.V</h1>
        </header>
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#"><i class="fa-brands fa-apple text-info"></i></a>
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a class="nav-link" href="<?= URLROOT; ?>/">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URLROOT; ?>/clientes">Clientes</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reportes</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="<?= URLROOT; ?>/clientes/reporte">Clientes</a>
                                <a class="dropdown-item" href="<?= URLROOT; ?>/usuarios/reporte">Usuarios</a>
                            </div>
                        </li>
                        <!-- Zona de migracion -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Migración</a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="<?= URLROOT; ?>/clientes/CSV">Clientes a CSV</a>
                                <a class="dropdown-item" href="<?= URLROOT; ?>/clientes/json">Clientes a JSON</a>
                            </div>
                        </li>
                    </ul>
                    <ul class="navbar-nav d-flex my-2 my-lg-0">
                        <?php if(estaLogueado()){ ?>
                        <li class="nav-item">
                            <a class="nav-link btn btn-info active" href="#"><?= $_SESSION['usuario_nombre']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URLROOT ?>/usuarios/logout">Salir</a>                        
                        </li>
                        <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URLROOT ?>/usuarios/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URLROOT ?>/usuarios/register">Registrar</a>                        
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>
        <main class="container flex-shrink-0">
<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url ?>assets/css/floating-labels.css">
    <link rel="stylesheet" href="<?= base_url ?>assets/css/styles.css">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web:400,600" rel="stylesheet">

    <!-- Ionic icons-->
    <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">

    <!--Font-Awesome--->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url ?>assets/images/school.svg" />
    <title>Institute Academy | INAC</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#hero">
                <img src="<?= base_url ?>assets/images/school.svg" width="45px" height="45px" alt="logo">
                <span id="tienda" class="ml-2 text-dark" style="font-size: 23px;">Institute Academy</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <img src="<?= base_url ?>assets/images/menu.svg">
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['admin'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url ?>nivel/gestion_nivel"> Gestion de Niveles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url ?>materia/gestion_materias">Gestion de Materias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url ?>usuario/gestion_profesor">Gestion de Profesores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url ?>horario/gestion_horario">Gestion de Horarios</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Bienvenido Admin</a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="<?= base_url ?>controlm/control_materias">Control de Materias</a>
                                <a class="dropdown-item" href="<?= base_url ?>seccion/control_secciones">Control de Secciones</a>
                                <a class="dropdown-item" href="<?= base_url ?>pago/control_pagos">Control de Pagos</a>
                                <a class="dropdown-item" href="<?= base_url ?>seccion/gestion_bachillerato">Asignacion de Bachillerato</a>
                                <a class="dropdown-item" href="<?= base_url ?>seccion/gestion_grado">Asignacion de Primaria</a>
                                <a class="dropdown-item" href="<?= base_url ?>inscripcion/listado_estudiantes">Gestion de Inscripcion</a>
                                <div class="dropdow-divider"></div>
                                <a class="dropdown-item" href="<?= base_url ?>usuario/logout"> <i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
                            </div>
                        </li>
                    <?php elseif (isset($_SESSION['student'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url ?>inscripcion/elige_pago"> <i class="fa fa-home mr-1"></i>Realizar Pago</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Bienvenido/a, <?= $_SESSION['student']->primer_nombre ?></a>
                            <div class="dropdown-menu">
                                <div class="dropdow-divider"></div>
                                <a class="dropdown-item" href="<?= base_url ?>usuario/logout"> <i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
                            </div>
                        </li>
                    <?php elseif (isset($_SESSION['user'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url?>nota/gestion_notas"> <i class="fa fa-folder-open  mr-2" aria-hidden="true"></i>Gestion de Notas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url?>usuario/listado_mis_estudiantes"> <i class="fa fa-users mr-2" aria-hidden="true"></i></i>Listado de mis Estudiantes</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Bienvenido/a Profesor/a, <?= $_SESSION['user']->primer_nombre ?> <?=$_SESSION['user']->primer_apellido?></a>
                            <div class="dropdown-menu">
                                <div class="dropdow-divider"></div>
                                <a class="dropdown-item" href="<?= base_url ?>usuario/logout"> <i class="fa fa-sign-out" aria-hidden="true"></i> Log Out</a>
                            </div>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url ?>"> <i class="fa fa-home mr-1"></i> inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#portfolio"> <i class="fa fa-book mr-1" aria-hidden="true"></i> Clases</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#team"><i class="fa fa-users mr-2" aria-hidden="true"></i>Profesores</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pricing"> <i class="fa fa-window-restore mr-2" aria-hidden="true"></i>Módulos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#testimonial"> <i class="fa fa-comments mr-2" aria-hidden="true"></i>Opiniones</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
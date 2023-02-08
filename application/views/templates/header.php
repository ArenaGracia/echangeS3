<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>EchangeObjet</title>
    <link rel="stylesheet" href="<?php echo site_url('assets/bootstrap/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/fonts/fontawesome-all.min.css')?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/header.css')?>">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-md bg-dark py-3 myNav">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon">
                    <img src="" alt="">
                </span>
                <span>Echange</span>
            </a>
            <div class="collapse navbar-collapse list" id="navcol-5">
                <ul class="navbar-nav ms-auto">
                    <form action="">
                        <li class="nav-item">
                            <input type="text" name="mot-cle">
                        </li>
                    </form>
                    <li class="nav-item"><a class="nav-link active" href="<?php echo site_url('welcome/proposition')?>">Proposition</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('welcome/objetUser')?>">Proposer</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('welcome/newObject')?>">New object</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo site_url('welcome/listeObjet')?>">Your Objects</a></li>
                </ul><a class="btn btn-primary ms-md-2" role="button" href="<?php echo site_url('login/deconnect')?>" >Se deconnecter</a>
            </div>
        </div>
    </nav>
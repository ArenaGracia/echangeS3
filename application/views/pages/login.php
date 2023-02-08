<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>EchangeObjet</title>
    <link rel="stylesheet" href="<?php echo site_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/animate.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/login.css'); ?>">
</head>

<body>
    <div class="d-flex d-xl-flex align-items-center align-items-xl-center" style="width: 100%;height: 100%;">
        <div class="container">
            <div class="row justify-content-center" id="verctical-position">
                <div class="col-md-9 col-lg-12 col-xl-10">
                    <div class="card shadow-lg o-hidden border-0 my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-flex">
                                    <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;assets/img/login.jpg&quot;);"></div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="pulse animated p-5">
                                        <div class="text-center">
                                            <h4 class="text-dark mb-4">Login</h4>
                                        </div>
                                        <form class="user" action="<?php echo site_url('login/verify'); ?>" method="post">
                                            <div class="mb-3"><input class="form-control form-control-user" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" value="ETU001933@gmail.com"></div>
                                            <div class="mb-3"><input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="pwd" value="johan"></div>
                                            <div class="mb-3">
                                                <div class="custom-control custom-checkbox small"></div>
                                            </div><button class="btn btn-primary d-block btn-user w-100" type="submit" style="background: #01703E;">Login</button>
                                            <hr>
                                            <hr>
                                        </form>
                                        <div class="text-center"><a class="small" style="color: #01703E;" href="<?php echo site_url('login/admin'); ?>">Super utilisateur</a></div>
                                        <div class="text-center"><a class="small" style="color: #01703E;" href="<?php echo site_url('login/inscription'); ?>">S'inscrire</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo site_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo site_url('assets/js/bs-init.js'); ?>"></script>
</body>

</html>
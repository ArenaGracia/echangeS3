<?php $this->load->view('templates/header') ?>

    <div class="row">

    <?php for($i=0;$i<count($propo['receveur']);$i++) {  ?>
        <div class="col-4 py-3 mx-auto col-xl-4 col-lg-6 col-md-6 col-sm-12" style="min-width: 300px;min-height: 300px;">
            <div class="card" style="width: 100%;height: 100%;"><a href="#"><img class="img-fluid card-img-top" style="height: 200px;" src="assets/img/listProposition.jpg"></a>
                <div class="card-body">
                    <p><?php echo $propo['objet2'][$i]['description'] ?></p>
                    <p><?php echo $propo['objet2'][$i]['prix'] ?> Ar</p>

                </div>
                <div class="card-footer text-center"><small><a href="#"><i class="fa fa-eye pe-1"></i>Voir etat<br></a></small></div>
            </div>
        </div>

        <div class="col-md-2 inter">
            <div class="card-footer text-center"><small><a href="<?php echo site_url('welcome/accept/'.$propo['id'][$i]) ?>"><i class="fa fa-eye pe-1"></i>Accepter<br></a></small></div>
            <div class="card-footer text-center"><small><a href="<?php echo site_url('welcome/refuse/'.$propo['id'][$i]) ?>"><i class="fa fa-eye pe-1"></i>Refuser<br></a></small></div>
        </div>
        <div class="col-4 py-3 mx-auto col-xl-4 col-lg-6 col-md-6 col-sm-12" style="min-width: 300px;min-height: 300px;">
            <div class="card" style="width: 100%;height: 100%;"><a href="#"><img class="img-fluid card-img-top" style="height: 200px;" src="assets/img/listProposition.jpg"></a>
                <div class="card-body">
                    <p><?php echo $propo['objet1'][$i]['description'] ?></p>
                    <p><?php echo $propo['objet1'][$i]['prix'] ?> Ar</p>
                </div>
                <div class="card-footer text-center"><small><a href="<?php echo site_url('welcome/objet/'.$propo['objet2'][$i]['idO']) ?>"><i class="fa fa-eye pe-1"></i>Voir etat<br></a></small></div>
            </div>
        </div>
    <?php } ?>

<?php $this->load->view('templates/footer') ?>

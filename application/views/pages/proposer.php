<!-- IMPORTATION -->
    <link rel="stylesheet" href="<?php echo site_url('assets/css/proposer.css')?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/proposer.css')?>">
<!-- IMPORTATION -->
<!-- HEADER -->
<?php $this->load->view('templates/header'); ?>
<!-- HEADER -->
<div class="container py-5">
    <div class="intro">
        <h2 class="text-center">Echange d` objet</h2>
        <p class="text-center">
            Taloha dia takalo no natao
            Taloha dia takalo no natao
            Taloha dia takalo no natao
        </p>
    </div>
    <form class="row">
        <!------------------ Notre objet --------------------------  -->
        <div class="col-md-6 ">
        <h3>Votre objet</h3>
        <!-- List group-->
        <ul class="list-group shadow scroleo">

            <?php for($i=0;$i<count($objet);$i++) { ?>
                <li class="list-group-item">
                <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                    <div class="media-body order-2 order-lg-1">
                        <h5 class="mt-0 font-weight-bold mb-2">Nom de l` objet</h5>
                        <p class="font-italic text-muted mb-0 small">
                            Description
                        </p>
                        <div class="d-flex align-items-center justify-content-between mt-1">
                            <h6 class="font-weight-bold my-2">$120.00</h6>
                        </div>
                    </div>
                    <span>
                        <img src="" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                        <label for="" class="etiquette">Choisir</label>
                        <input type="checkbox">
                    </span>
                </div>
                </li>
            <?php } ?>
            <!-- End -->
            
        </ul>
        <!-- End -->
        </div>
        <!------------------ Notre objet --------------------------  -->

        <!------------------ Autre objet --------------------------  -->    
        <div class="col-md-6">
            <h3>Objet voulous</h3>

            <ul class="list-group shadow scroleo">
                
                <?php for($i=0;$i<count($autre);$i++) { ?>
                    <li class="list-group-item">
                        <div class="media align-items-lg-center flex-column flex-lg-row p-3">
                            <div class="media-body order-2 order-lg-1">
                            <h5 class="mt-0 font-weight-bold mb-2"><?php echo $autre[$i]['description'] ?></h5>
                            <p class="font-italic text-muted mb-0 small">
                                Description
                            </p>
                            <div class="d-flex align-items-center justify-content-between mt-1">
                                <h6 class="font-weight-bold my-2"><?php echo $autre[$i]['prix'] ?> Ar</h6>
                            </div>
                        </div>
                        <span>
                            <img src="" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
                            <label for="" class="etiquette">Choisir</label>
                            <input type="checkbox">
                        </span>
                    </div>
                </li>
                <?php } ?>
                
            </ul>
        </div>
        <!------------------ Autre objet --------------------------  -->    
        
        
        <div class="row" id="bouton">
        <button class="col-md-6" type="reset" id="reset">Reset</button>
        <button class="col-md-6" type="submit" id="submit">Proposer</button>
        </div>

    </form>
</div>

<!-- FOOTER -->
<?php $this->load->view('templates/footer') ?>
<!-- FOOTER -->

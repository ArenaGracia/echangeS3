<!-- HEADER -->
<?php $this->load->view('templates/header') ?>
<!-- HEADER -->

<!-- IMPORTATION -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/historiqueApp.css">
<!-- IMPORTATION -->

    <div class="container py-4 py-xl-5">
        <div class="row row-cols-1 row-cols-md-2 historique">
            <div class="col">
                <img src="<?php echo site_url('assets/img/Objet/'.$photo); ?>" class="rounded w-200 h-200 fit-cover">
            </div>

            <div class="col d-flex flex-column justify-content-center p-4">

                <div class="row text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                    <div class="col-md-12 centrer">
                        <h4>Title</h4>
                        <p>
                            Description
                        </p>
                        <p>Le nomre de proprietaires au fil des echanges est : <b><?php echo count($history); ?></b></p>
                    </div>
                </div>
                
                <div class="text-center text-md-start d-flex flex-column align-items-center align-items-md-start mb-5">
                    <div class="row centrer">
                        <h4>Historique d' appartenance</h4>
                        <p></p>
                        <div class="row" id="histoire">
                            <?php for($i = 0 ; $i < count($history) ; $i++){ ?>
                            <div class="col-md-12">
                                <i onclick="monter()" class="fas fa-long-arrow-alt-up"></i>
                                    <?php echo $history[$i]['daty']; ?>
                                <i onclick="descendre()" class="fas fa-long-arrow-alt-down"></i>
                            </div>
                            <div class="col-md-12"><?php echo $history[$i]['nom']." ".$history[$i]['prenom'] ?></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    
    <!-- IMPORTATION -->
<script src="<?php echo base_url(); ?>assets/js/historique.js"></script>
<!-- IMPORTATION -->

<!-- FOOTER -->
<?php $this->load->view('templates/footer') ?>
<!-- FOOTER -->
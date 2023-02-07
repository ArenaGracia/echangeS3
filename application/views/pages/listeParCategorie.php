<?php $this->load->view("templates/headerAdmin") ?>
    
    `<link rel="stylesheet" href="<?php echo site_url('assets/fonts/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/Articale-List-With-Image-Zoom.css')?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/listeParCategorie.css')?>">

    <div class="article-list">
        <div class="container">
            <div class="intro">
                <h2 class="text-center"><?php echo $nom ?></h2>
            </div>
            <div class="row articles">
                <?php for($i=0;$i<count($liste);$i++){ ?>
                <div class="col-sm-6 col-md-4 item">
                    <div class="zoomin frame" style="width: 100%;height: 236px;"><img style="width: 100%;height: 236px;" src="assets/img/desk.jpg"></div>
                    <h3 class="name"><?php echo $liste[$i]['description'] ?></h3>
                    <p class="description">
                        <?php echo $liste[$i]['prix'] ?> Ar
                    </p>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

<?php $this->load->view("templates/footer") ?>

<?php $this->load->view("templates/header") ?>
    
    <link rel="stylesheet" href="<?php echo site_url('assets/fonts/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/Articale-List-With-Image-Zoom.css')?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/listeParCategorie.css')?>">

    <div class="article-list">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Liste des objets recherchés </h2>
            </div>
            <div class="row articles">
                <?php for($i=0;$i<count($objet['nom']);$i++){ ?>
                <div class="col-sm-6 col-md-4 item">
                    <div class="zoomin frame" style="width: 100%;height: 236px;">
                        <img style="width: 100%;height: 236px;" src="<?php echo site_url('assets/img/Objet/'.$objet['nom'][$i]) ?>">
                    </div>
                    <h3 class="name"><?php echo $objet['objet'][$i]['description'] ?></h3>
                    <p class="description">
                        <?php echo $objet['objet'][$i]['prix'] ?> Ar
                    </p>
                    <?php if($objet['objet'][$i]['idU']==$this->session->userdata('id')) { ?>
                        <a href="<?php echo site_url('welcome/modifierObjet')?>">Modifier</a>
                        <a href="<?php echo site_url('welcome/suppObjet')?>">Supprimer</a>
                    <?php } ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

<?php $this->load->view("templates/footer") ?>

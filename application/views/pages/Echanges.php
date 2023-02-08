<?php $this->load->view("templates/header") ?>
    
    `<link rel="stylesheet" href="<?php echo site_url('assets/fonts/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/Articale-List-With-Image-Zoom.css')?>">
    <link rel="stylesheet" href="<?php echo site_url('assets/css/listeParCategorie.css')?>">

    <div class="article-list">
        <div class="container">
            <div class="intro">
                <h2 class="text-center">Liste des objets</h2>
                <form action="<?php echo site_url('welcome/search') ?>" id="myFoorm">
                    <input type="text" name="nomC" required>
                    <select name="idCat">
                        <option value="0">Tous</option>
                        <?php for($i=0;$i<count($cat);$i++){ ?>
                            <option value="<?php echo $cat[$i]['idC'] ?>"><?php echo $cat[$i]['nom'] ?></option>
                        <?php } ?>
                    </select>
                    <input type="submit" value="rechercher" required>
                </form>
            </div>
            <?php if(count($rep['objet'])>0){ ?>
                <div class="row articles">
                    <?php for($i=0;$i<count($rep['objet']);$i++){ ?>
                    <div class="col-sm-6 col-md-4 item">
                        <div class="zoomin frame" style="width: 100%;height: 236px;"><img style="width: 100%;height: 236px;" src="<?php echo site_url('assets/img/Objet/'.$rep['nom'][$i]) ?>"></div>
                        <h3 class="name"><?php echo $rep['objet'][$i]['description'] ?></h3>
                        <p class="description">
                            <?php echo $rep['objet'][$i]['prix'] ?> Ar
                        </p>
                        <p class="description">
                            <?php echo $rep['pourcentage'][$i] ?> %
                        </p>
                        <p class="description">
                            <form action="<?php echo site_url("welcome/insertPropo") ?>" method="get">
                                <input type="hidden" name="idE" value="<?php echo $this->session->userdata('id') ?>" />
                                <input type="hidden" name="idR" value="<?php echo $rep['objet'][$i]['idU'] ?>" />
                                <input type="hidden" name="idOe" value="<?php echo $idO ?>" />
                                <input type="hidden" name="idOr" value="<?php echo $rep['objet'][$i]['idO'] ?>" />
                                <input type="submit" value="Echanger" />
                            </form>
                        </p>
                    </div>
                    <?php } ?>
                </div>
            <?php } else {?>
                <h2>Aucun objet </h2>
            <?php } ?>
        </div>
    </div>

<?php $this->load->view("templates/footer") ?>

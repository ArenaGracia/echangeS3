<?php $this->load->view("templates/headerAdmin") ?>
    <link rel="stylesheet" href="<?php echo site_url('assets/fonts/fontawesome-all.min.css')?>">  
    <link rel="stylesheet" href="<?php echo site_url('assets/css/listeCategorie.css')?>">
    <div class="container-fluid contenue">
        <div class="intro">
            <h2 class="text-center">Liste des categories</h2>
            <p class="text-center">
                Vous pouvez ajoutez des categories ici
            </p>
        </div>
        <div class="card" id="TableSorterCard">
            <div class="card-header py-3">
                <div class="row table-topper align-items-center">
                    <div class="col-12 col-sm-5 col-md-6 text-start" style="margin: 0px;padding: 5px 15px;">
                        <p class="text-primary m-0 fw-bold">Nom de la nouvelle catégorie</p>
                    </div>
                    <div class="col-12 col-sm-7 col-md-6 text-end" style="margin: 0px;padding: 5px 15px;">
                        <form action="<?php echo site_url('welcomeAdmin/addCategorie')?>" method="post">
                            <input type="text" name="nomCat">
                            <button class="btn btn-primary btn-sm reset" type="submit" style="margin: 2px;">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-striped table tablesorter" id="ipi-table">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">Nom</th>
                                    <th class="text-center filter-false sorter-false">Reagir</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php for($i=0;$i<count($info);$i++) { ?>
                                    <tr>
                                        <td><?php echo $info[$i]['nom'] ?></td>
                                      
                                        <td class="text-center align-middle" style="max-height: 60px;height: 60px;"><a class="btn btnMaterial btn-flat primary semicircle" role="button" href="<?php echo site_url("welcomeAdmin/objetByCat/".$info[$i]['idC']) ?>"><i class="far fa-eye"></i></a><a class="btn btnMaterial btn-flat success semicircle" role="button" href="#"><i class="fas fa-pen"></i></a><a class="btn btnMaterial btn-flat accent btnNoBorders checkboxHover" role="button" style="margin-left: 5px;" data-bs-toggle="modal" data-bs-target="#delete-modal" href="#"><i class="fas fa-trash btnNoBorders" style="color: #DC3545;"></i></a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo site_url('assets/js/listeCategorie.js')?>"></script>
    <script src="<?php echo site_url('assets/js/listeCategorie2.js')?>"></script>
    <?php $this->load->view("templates/footer") ?>

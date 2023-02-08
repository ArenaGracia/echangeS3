<!-- HEADER -->
<?php $this->load->view('templates/header') ?>
<!-- HEADER -->

<!-- IMPORTATION -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/insertObjet.css">
<!-- IMPORTATION -->

    <div class="container profile profile-view" id="profile">
        <div class="intro">
            <h2 class="text-center">Ajouter un objet</h2>
            <p class="text-center">
                La description de l` objet est oblogatoire
            </p>
        </div>
        <!-- Tsy kitihana -->
        <div class="row">
            <div class="col-md-12 alert-col relative">
                <div class="alert alert-info alert-dismissible absolue center" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                    <span>Profile save with success</span>
                </div>
            </div>
        </div>
        <!-- Tsy kitihana -->
        <form action="<?php  echo site_url("welcome/addObjet"); ?>" method="post" enctype="multipart/form-data">
            <div class="row profile-row">
                <div class="col-md-5 relative">
                    <div class="avatar">
                        <div class="avatar-bg center" id="images">
                            <img src="#" alt="" id="image">
                        </div>
                    </div>
                    <input name="avatar-file" type="file" onchange="previewPicture(this)" class="form-control" required>
                </div>
                <div class="col-md-7">
                    <h3>Veuillez completez les informations</h3>
                    <hr>
                    <div class="row">
                        <div class="row">
                            <div class="form-group mb-3 col-md-6">
                                <h5 class="form-label">Firstname </h5>
                                <select name="idC" class="form-control">
                                    <?php echo "<h1>".count($categories)."</h1>"; ?>
                                    <?php for($i =0 ; $i < count($categories) ; $i++){ ?>
                                        <option value="<?php echo $categories[$i]['idC']; ?>">
                                            <?php echo $categories[$i]['nom']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group mb-3 col-md-6">
                                <h5 class="form-label">Prix estimer</h5>
                                <input name="prix" class="form-control" type="number" min="0">
                            </div> 
                        </div>
                        <div class="col-sm-12 col-md-6"></div>
                    </div>
                    <div class="form-group mb-3">
                        <h5 class="form-label">Description</h5>
                        <textarea name="description" class="form-control" cols="30" rows="5" maxlength="1000"></textarea>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 content-right">
                            <button class="btn btn-primary form-btn" type="submit">SAVE</button>
                            <button class="btn btn-danger form-btn" type="reset">CANCEL </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        // L` image img#image
        var image = document.getElementById("image");
        // La fonction previewPicture
        var previewPicture = function(e){
            // e.files contient un objet FileList
            const [picture] = e.files;
            // "picture" est un objet File
            if(picture){
                image.style.maxWidth = "100%";
                image.style.maxHeight = "100%";
                image.src = URL.createObjectURL(picture);
            }
        }
    </script>
    
<!-- IMPORTATION -->
<script src="assets/js/insertObjet.js"></script>
<!-- IMPORTATION -->

<!-- FOOTER -->
<?php $this->load->view('templates/footer') ?>
<!-- FOOTER -->
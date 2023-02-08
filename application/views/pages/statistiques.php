<?php $this->load->view("templates/headerAdmin"); ?>
    <title>EchangeObjet</title>
    <link rel="stylesheet" href="<?php echo site_url('assets/fonts/fontawesome-all.min.css')?>">   
    <link rel="stylesheet" href="<?php echo site_url('assets/css/statistiques.css')?>">

<div class="container-fluid contenue">
	<div class="intro">
		<h2 class="text-center">Statistiques</h2>
		<p class="text-center">
			Evolution du nombre d' utilisateur inscrit sur le site
		</p>
	</div>
	
	<div class="row" id="utilisateur">
		<table class="table">
			<tr>
				<th class="offset-md-1">I. Nombre d' utilisateur inscrit sur le site :</th> 
				<td><?php echo $user ?></td>		
			</tr>
			<tr>
				<th class="offset-md-1">II. Nombre d' echange effectue : </th>
				<td><?php echo $change ?></td>
			</tr>
		</table>
	</div>

	
	
</div>

<?php $this->load->view("templates/footer"); ?>


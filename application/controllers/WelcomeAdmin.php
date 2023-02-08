<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class WelcomeAdmin extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$v=$this->session->has_userdata('idAdmin');
		// var_dump($v);
		if($v==false){
			redirect("login/index");
		}
    }
	public function index()
	{			
        redirect("welcomeAdmin/categorie");
	}

	public function categorie(){
		$this->load->model('Categories_models');
		$data['info']=$this->Categories_models->getAll();
        $this->load->view("pages/listeCategorie",$data);
	}

    public function addCategorie(){
		$this->load->model('Categories_models');
        $nomCat=$this->input->post("nomCat");
        $nomcat=ltrim($nomCat);
        echo strlen($nomCat);
        if(strlen($nomCat)!=0){
            $this->Categories_models->insert($nomCat);
        }
        redirect("welcomeAdmin/categorie");
    }

    public function objetByCat($idC=''){
		$this->load->model('Categories_models');
		$this->load->model('objet_models');
        $data['nom']=$this->Categories_models->getnomCat($idC);
        $data['liste']=$this->objet_models->getByCat($idC);
        $this->load->view("pages/listeParCategorie",$data);
    }

    public function getStatistiques(){
		$this->load->model('echange_models');
		$this->load->model('login_models'); 
        $data['user']=$this->login_models->getTotalUser();
        $data['change']=$this->echange_models->getTotalEchange();
        $this->load->view("pages/statistiques",$data);
    }
}
?>
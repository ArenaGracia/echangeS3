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
		$this->load->model('categories_models');
		$data['info']=$this->categories_models->getAll();
        $this->load->view("pages/listeCategorie",$data);
	}

    public function addCategorie(){
		$this->load->model('categories_models');
        $nomCat=$this->input->post("nomCat");
        $nomcat=ltrim($nomCat);
        echo strlen($nomCat);
        if(strlen($nomCat)!=0){
            $this->categories_models->insert($nomCat);
        }
        redirect("welcomeAdmin/categorie");
    }

    public function objetByCat($idC=''){
		$this->load->model('categories_models');
		$this->load->model('objet_models');
        $data['nom']=$this->categories_models->getnomCat($idC);
        $data['liste']=$this->objet_models->getByCat($idC);
        $this->load->view("pages/listeParCategorie",$data);
    }
}
?>
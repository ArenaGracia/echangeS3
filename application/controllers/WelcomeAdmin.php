<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {

	public function __construct(){
        parent::__construct();
		$v=$this->session->has_userdata('id');
		// var_dump($v);
		if($v==false){
			redirect("login/index");
		}
    }
	public function index()
	{			
		// $this->load->model('objet_models');
		// $id=$this->session->userdata('id');
		// $data['user']=$this->objet_models->getByUser($id);
		// $this->load->view('templates/template',$data);
		redirect("welcome/objetUser");
	}

	public function categorie(){
		$this->load->model('categories_models');
		$data['info']=$this->categories_models->getAll();
		$this->load->view("pages/categories",$data);
	}
}
?>
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
	public function proposition(){
		$this->load->model('echange_models');
		$id=$this->session->userdata('id');
		$data['propo']=$this->echange_models->getProposition($id);
		$this->load->view("pages/listProposition",$data);
	}	
	public function objet($id='1'){
		$this->load->model('objet_models');
		$data['info']=$this->objet_models->getById($id);
		$this->load->view("pages/informations",$data);
	}
	public function objetUser(){
		$this->load->model('objet_models');
		$id=$this->session->userdata('id');
		$data=array();
		$data1['objet']=$this->objet_models->getByUser($id);
		$data1['autre']=$this->objet_models->getOther($id);
		$this->load->view("pages/proposer",$data1);
	}
	public function accept($id='1'){
		$this->load->model('echange_models');
		$this->echange_models->acceptChange($id);
		redirect('welcome/proposition');
	}
	public function refuse($id='1'){
		$this->load->model('echange_models');
		$this->echange_models->refuseChange($id);
		redirect('welcome/proposition');
	}
	public function insertPropo(){
		$idE=$this->input->get('idE');
		$idR=$this->input->get('idR');
		$idOe=$this->input->get('idOe');
		$idOr=$this->input->get('idOr');
		$this->load->model('echange_models');
		$this->echange_models->insert_proposition($idE,$idR,$idOe,$idOr);
		redirect('welcome/proposer');
	}
}
?>
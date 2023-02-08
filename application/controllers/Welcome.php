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
		$this->load->model('Echange_models');
		$id=$this->session->userdata('id');
		$data['propo']=$this->Echange_models->getProposition($id);
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
		$this->load->model('Echange_models');
		$this->Echange_models->acceptChange($id);
		redirect('welcome/proposition');
	}
	public function refuse($id='1'){
		$this->load->model('Echange_models');
		$this->Echange_models->refuseChange($id);
		redirect('welcome/proposition');
	}
	public function insertPropo(){
		$idE=$this->input->get('idE');
		$idR=$this->input->get('idR');
		$idOe=$this->input->get('idOe');
		$idOr=$this->input->get('idOr');
		$this->load->model('Echange_models');
		if($idE==null || $idE==0  || $idR==null || $idR==0 || $idOe==null || $idOe==0 || $idOr==null || $idE==0){
			redirect('welcome/objetUser');
		}
		$this->Echange_models->insert_proposition($idE,$idR,$idOe,$idOr);
		redirect('welcome/objetUser');
	}
	public function newObject(){
		$this->load->model('Categories_models');
		$data['categories']=$this->Categories_models->getALL();
		$this->load->view("pages/insertObjet",$data);	
	}
	public function addObjet(){
		$this->load->model('Objet_models');
		
        $idC=$this->input->post("idC");
        $prix=$this->input->post("prix");
        $description=$this->input->post("description");
		
		$idU=$this->session->userdata('id');
		$idC = trim($idC);
		$prix = trim($prix);
		$description = trim($description);
        if(strlen($idC)!=0 && strlen($prix)!=0 && strlen($description)!=0){
			$photo = $this->Objet_models->insert_upload("assets/img/categorie/",$_FILES['avatar-file']);
			$this->Objet_models->insert_object($idU,$idC,$description,$prix,$photo);
        }
        // redirect("welcomeAdmin/categorie");
	}
	// function upload_logo(){
	// 	$ex=$_FILES['avatar-file']['name'];
	// 	$epld=explode('.',$ex);
	// 	$filename=date("mdyHis").".".$epld[1];
	// 	$userfile_size=$_FILES['avatar-file']['size'];
	// 	$imggtype=$_FILES['avatar-file']['type'];
	// 	if(move_uploaded_file($_FILES['avatar-file']['tmp_name'],"assets/img/upload/TESTE.PNG"))
	// 		{   
	// 			echo $filename;
	// 		}
	// 	}
}
?>
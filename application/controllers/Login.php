<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
		$this->load->view('pages/login');
	}	

	public function inscription()
	{
		$this->load->view('pages/inscription');
	}	

    public function insert_verify(){
        $this->load->model('login_models');
        $this->load->helper('email_helper');
		$nom=$this->input->post('nom');
		$prenom=$this->input->post('prenom');
        $email=$this->input->post('email');
		$pwd=$this->input->post('pwd');
        if(valid_email($email)){
            $result=$this->login_models->insert_user($nom,$prenom,$email,$pwd);
            $result=$this->login_models->verify_Login($email,$pwd);
            if(valid_email($email) && $result!=null){
                $this->session->set_userdata('id', $result['idU']);
                redirect("welcome/index");
            }
            else{
                redirect("login/index");
            }
        }
        else{
            redirect("login/index");
        }
    }

	public function verify()
	{
        $this->load->model('login_models');
        $this->load->helper('email_helper');
		$email=$this->input->post('email');
		$pwd=$this->input->post('pwd');
        $result=$this->login_models->verify_Login($email,$pwd);

        if(valid_email($email) && $result!=null){
            $this->session->set_userdata('id', $result['idU']);
            echo $this->session->userdata('id');
            redirect("welcome/index");
        }
        else{
            redirect("login/index");
        }
	}	

    public function deconnect()
    {
        $this->session->unset_userdata('id');
        redirect("login/index");
    }		
}
?>

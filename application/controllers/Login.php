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

	public function admin()
	{
        $this->load->model('Admin_models');
        $data['admin']=$this->admin_models->getOneAdmin();
		$this->load->view('pages/loginAdmin',$data);
	}
    
    public function verify_admin(){
        $this->load->model('Admin_models');
        $this->load->helper('email_helper');
		$email=$this->input->post('email');
		$pwd=$this->input->post('pwd');
        $result=$this->admin_models->verify_Login($email,$pwd);

        if(valid_email($email) && $result!=null){
            $this->session->set_userdata('idAdmin', $result['idSu']);
            echo $this->session->userdata('idAdmin');
            redirect("welcomeAdmin/index");
        }
        else{
            redirect("login/index");
        }       
    }

    public function insert_verify(){
        $this->load->model('Login_models');
        $this->load->helper('email_helper');
		$nom=$this->input->post('nom');
		$prenom=$this->input->post('prenom');
        $email=$this->input->post('email');
		$pwd=$this->input->post('pwd');
        if(valid_email($email)){
            $result=$this->Login_models->insert_user($nom,$prenom,$email,$pwd);
            $result=$this->Login_models->verify_Login($email,$pwd);
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
        $this->load->model('Login_models');
        $this->load->helper('email_helper');
		$email=$this->input->post('email');
		$pwd=$this->input->post('pwd');
        $result=$this->Login_models->verify_Login($email,$pwd);

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

    public function deconnectAdmin()
    {
        $this->session->unset_userdata('idAdmin');
        redirect("login/index");
    }
		
}
?>

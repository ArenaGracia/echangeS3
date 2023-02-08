<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Admin_models extends CI_Model{
        public function getOneAdmin(){
            $sql="SELECT*FROM SuperUtilisateur Limit 1";
            $query=$this->db->query($sql);
            $result=$query->row_array();
            return $result;
        }

        public function verify_Login($email,$mdp){
            $sql="SELECT*FROM SuperUtilisateur WHERE email=%s AND mdp=%s";
            $sql=sprintf($sql,$this->db->escape($email),$this->db->escape($mdp));
            $query=$this->db->query($sql);
            $result=$query->row_array();
            echo $sql;
            return $result;
        }
        
    }
?>

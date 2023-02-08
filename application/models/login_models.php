<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Login_models extends CI_Model{
        public function insert_user($nom,$prenom,$email,$mdp){
            $sql="INSERT INTO Utilisateur VALUES(null,%s,%s,%s,%s)";
            $sql=sprintf($sql,$this->db->escape($nom),$this->db->escape($prenom),$this->db->escape($email),$this->db->escape($mdp));
            // echo $sql;
            $query=$this->db->query($sql);
        } 

        public function verify_Login($email,$mdp){
            $sql="SELECT*FROM Utilisateur WHERE email=%s AND mdp=%s";
            $sql=sprintf($sql,$this->db->escape($email),$this->db->escape($mdp));
            $query=$this->db->query($sql);
            $result=$query->row_array();
            // echo $sql;
            return $result;
        }

        public function getById($id){
            $sql="SELECT*FROM Utilisateur WHERE idU=%d";
            $sql=sprintf($sql,$id);
            $query=$this->db->query($sql);
            $result=$query->row_array();
            // echo $sql;
            return $result;
        }   
        
        public function getTotalUser(){
            $sql="SELECT count(*) isa FROM Utilisateur";
            $query=$this->db->query($sql);
            $result=$query->row_array();
            $nb=$result['isa'];
            return $nb;
        }
    }
?>

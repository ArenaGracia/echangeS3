<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Objet_models extends CI_Model{
        public function getAll(){
            $sql="SELECT * FROM Categories";
            $query=$this->db->query($sql);
            $result=array();
            foreach($query->result_array() as $row){
                $result[]=$row;
            }
            return $result;
        } 
        
        public function getById(){
            $sql="SELECT * FROM Categories";
            $query=$this->db->query($sql);
            $result=array();
            foreach($query->result_array() as $row){
                $result[]=$row;
            }
            return $result;
        } 
?>

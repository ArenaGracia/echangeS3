<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Categories_models extends CI_Model{
        public function getAll(){
            $sql="SELECT * FROM Categorie";
            $query=$this->db->query($sql);
            $result=array();
            foreach($query->result_array() as $row){
                $result[]=$row;
            }
            return $result;
        } 

        public function insert($nomCat)
        {
            $sql="INSERT INTO Categorie VALUES(null,%s)";
            $sql=sprintf($sql,$this->db->escape($nomCat));
            echo $sql;
            $query=$this->db->query($sql);      
        }

        public function getnomCat($idC){
            $sql="SELECT * FROM Categorie WHERE idC=%d";
            $sql=sprintf($sql,$idC);
            $query=$this->db->query($sql);
            $result=$query->row_array();
            $nom=$result['nom'];
            return $nom;
        }

    }
?>

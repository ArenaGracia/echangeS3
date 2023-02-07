<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Objet_models extends CI_Model{
        public function getByUser($idU){
            $sql="SELECT o.*,p.idU FROM Objet o JOIN Owners p ON p.idO=o.idO WHERE p.idU=%d";
            $sql=sprintf($sql,$idU);
            // echo $sql;

            $query=$this->db->query($sql);
            $result=array();
            foreach($query->result_array() as $row){
                $result[]=$row;
            }
            return $result;
        }  

        public function getOther($idU){
            $sql="SELECT o.*,p.idU FROM Objet o JOIN Owners p ON p.idO=o.idO WHERE p.idU!=%d";
            $sql=sprintf($sql,$idU);
            echo $sql;
            $query=$this->db->query($sql);
            $result=array();
            foreach($query->result_array() as $row){
                $result[]=$row;
            }
            return $result;
        }          

        public function getById($idO){
            $sql="SELECT * FROM Objet o WHERE idO=%d";
            $sql=sprintf($sql,$idO);
            $query=$this->db->query($sql);
            $result=$query->row_array();
            return $result;
        }

        public function insert_photo($id,$p){
            $sql="INSERT INTO Photo VALUES(%d,%s)";
            $sql=$sql=sprintf($sql,$this->db->escape($id),$this->db->escape($p));
            $query=$this->db->query($sql);
        }

        public function insert_owner($idU,$idP){
            $sql="INSERT INTO Owner VALUES(%d,%d)";
            $sql=$sql=sprintf($sql,$this->db->escape($idU),$this->db->escape($idO));
            $query=$this->db->query($sql);
        }

        public function insert_object($idU,$idC,$descri,$prix,$photo){
            $sql="INSERT INTO Objet VALUES(null,%d,%s,%d) returning idO";
            $sql=$sql=sprintf($sql,$this->$idC,$this->db->escape($descri),$this->db->escape($prix));
            $query=$this->db->query($sql);
            $id=$query->row_array();
            for($i=0;$i<count($photo);$i++){
                $this->objet_models->insert_photo($id,$photo[$i]);
            }
            $this->objet_models->insert_owner($id,$idU);
        }
    }
?>

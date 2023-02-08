<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    class Echange_models extends CI_Model{
        public function getPropositionByIdUser($idU){
            $sql="SELECT * FROM Proposition WHERE idR=%d AND idP NOT IN (SELECT*FROM Accepter) AND idP NOT IN (SELECT*FROM Refus) ";
            $sql=sprintf($sql,$idU);
            // echo $sql;
            $query=$this->db->query($sql);
            $result=array();
            foreach($query->result_array() as $row){
                $result[]=$row;
            }
            return $result;
        } 

        public function getPropositionById($idP){
            $sql="SELECT * FROM Proposition WHERE idP=%d";
            $sql=sprintf($sql,$idP);
            // echo $sql;
            $query=$this->db->query($sql);
            $result=array();
            $result=$query->row_array();
            return $result;
        } 

        public function getProposition($idU){
            $this->load->model('Login_models');
            $this->load->model('Objet_models');

            $data=$this->Echange_models->getPropositionByIdUser($idU);
            $result=array();
            $result['id']=array();
            $result['envoyeur']=array();
            $result['receveur']=array();
            $result['objet1']=array();
            $result['objet2']=array();

            for($i=0;$i<count($data);$i++){
                $result['id'][]=$data[$i]['idP'];
                $result['envoyeur'][]=$this->Login_models->getById($data[$i]['idE']);
                $result['receveur'][]=$this->Login_models->getById($data[$i]['idR']);
                $result['objet1'][]=$this->Objet_models->getById($data[$i]['idOe']);
                $result['objet2'][]=$this->Objet_models->getById($data[$i]['idOr']);
            }

            return $result;
        } 

        public function acceptChange($idP){
            $this->load->model('objet_models');
            $data=$this->Echange_models->getPropositionById($idP);
            $idE=$data['idE'];
            $idR=$data['idR'];
            $idO1=$data['idOe'];
            $idO2=$data['idOr'];
            $this->objet_models->insert_owner($idE,$idO2);
            $this->objet_models->insert_owner($idR,$idO1);
            $sql3="INSERT INTO Accepter VALUES(%d)";
            $sql3=sprintf($sql3,$idP);
            $query=$this->db->query($sql3);
        }

        public function refuseChange($idP){
            $data=$this->Echange_models->getPropositionById($idP);
            $sql3="INSERT INTO Refus VALUES(%d)";
            $sql3=sprintf($sql3,$idP);
            $query=$this->db->query($sql3);
        } 
        
        public function insert_proposition($idE,$idR,$idOe,$idOr){
            $sql="INSERT INTO Proposition VALUES(null,%d,%d,%d,%d)";
            $sql=sprintf($sql,$idE,$idR,$idOe,$idOr);
            echo $sql;
            $query=$this->db->query($sql);
        }

        public function getTotalEchange(){
            $sql="SELECT count(*) isa FROM accepter";
            $query=$this->db->query($sql);
            $result=$query->row_array();
            $nb=$result['isa'];
            return $nb;
        }
    }
?>

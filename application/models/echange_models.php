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
            $this->load->model('login_models');
            $this->load->model('objet_models');

            $data=$this->echange_models->getPropositionByIdUser($idU);
            $result=array();
            $result['id']=array();
            $result['envoyeur']=array();
            $result['receveur']=array();
            $result['objet1']=array();
            $result['objet2']=array();

            for($i=0;$i<count($data);$i++){
                $result['id'][]=$data[$i]['idP'];
                $result['envoyeur'][]=$this->login_models->getById($data[$i]['idE']);
                $result['receveur'][]=$this->login_models->getById($data[$i]['idR']);
                $result['objet1'][]=$this->objet_models->getById($data[$i]['idOe']);
                $result['objet2'][]=$this->objet_models->getById($data[$i]['idOr']);
            }

            return $result;
        } 

        public function acceptChange($idP){
            $data=$this->echange_models->getPropositionById($idP);
            $idE=$data['idE'];
            $idR=$data['idR'];
            $idObjet1=$data['idOe'];
            $idObjet2=$data['idOr'];

            $sql1="UPDATE Owners SET idU=%d WHERE idO=%d";
            $sql1=sprintf($sql1,$idE,$idObjet2);
            $query=$this->db->query($sql1);

            $sql2="UPDATE Owners SET idU=%d WHERE idO=%d";
            $sql2=sprintf($sql2,$idR,$idObjet1);    
            $query=$this->db->query($sql2);

            $sql3="INSERT INTO Accepter VALUES(%d)";
            $sql3=sprintf($sql3,$idP);
            $query=$this->db->query($sql3);
        }

        public function refuseChange($idP){
            $data=$this->echange_models->getPropositionById($idP);
            $sql3="INSERT INTO Refus VALUES(%d)";
            $sql3=sprintf($sql3,$idP);
            $query=$this->db->query($sql3);
        } 
        
        public function insert_proposition($idE,$idR,$idOe,$idOr){
            $sql="INSERT INTO Proposition VALUES(null,%d,%d,%d,%d)";
            $sql=sprintf($sql,$idE,$idR,$idOe,$idOr);
            $query=$this->db->query($sql);
        }
    }
?>

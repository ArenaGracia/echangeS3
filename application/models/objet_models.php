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

        public function getAll(){
            $sql="SELECT o.*,p.idU FROM Objet o JOIN Owners p ON p.idO=o.idO";

            $query=$this->db->query($sql);
            $result=array();
            $result['objet']=array();
            $result['nom']=array();
            foreach($query->result_array() as $row){
                $result['objet'][]=$row;
                $result['nom'][]=$this->objet_models->getOnePhoto($row['idO']);
            }
            return $result;
        }  

        public function getByCat($idC){
            $sql="SELECT o.* FROM Objet o WHERE idC=%d";
            $sql=sprintf($sql,$idC);
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
            // echo $sql;
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
            $sql=$sql=sprintf($sql,$id,$this->db->escape($p));
            $query=$this->db->query($sql);
        }

        public function insert_owner($idU,$idO){
            $sql="INSERT INTO Owners VALUES(%d,%d)";
            $sql=$sql=sprintf($sql,$idU,$idO);
            $query=$this->db->query($sql);
        }

        public function insert_object($idU,$idC,$descri,$prix,$photo){
            $sql="INSERT INTO Objet VALUES(null,%d,%s,%d)";
            $sql = sprintf($sql,$idC,$this->db->escape($descri),$prix);
            $query=$this->db->query($sql);
            $id=$this->db->insert_id();
            $this->Objet_models->insert_photo($id,$photo);
            $this->Objet_models->insert_owner($idU,$id);
        }

        public function getOnePhoto($id){
            $sql="SELECT*FROM Photo WHERE idO=%d LIMIT 1";
            $sql=sprintf($sql,$id);
            $query=$this->db->query($sql);
            $result=$query->row_array();
            $image=$result['nom'];
            return $result;            
        }

        public function research($descri,$idC){
            $sql="";
            if($idC==0){
                $sql="SELECT*FROM Objet WHERE description like '%.$descri.%'";
            }
            else{
                $sql="SELECT*FROM Objet WHERE description like '%.$descri.%' AND idC=%d";
                $sql=sprintf($sql,$idC);
            }           
            $query=$this->db->query($sql);
            $result=array();
            foreach($query->result_array() as $row){
                $result[]=$row;
            }
            return $result;
        }

        public function insererFichier(){
            $this->load->library('upload');
        }

        public function insert_upload($dossier,$img){
            $fichier = basename($img['name']);
            $taille_maxi = 1000000;
            $taille = filesize($img['tmp_name']);
            $extensions = array('.png', '.gif', '.jpg', '.jpeg'); 
            $extension = strrchr($img['name'], '.'); 
            //Début des vérifications de sécurité...
            if(!$this->is_in_array($extension, $extensions))$erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc';
            if($taille>$taille_maxi)$erreur = 'Le fichier est trop gros...';
        
            //S'il n'y a pas d'erreur, on upload
            if(!isset($erreur)){     //On formate le nom du fichier ici...  
                $fichier = strtr($fichier,'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');    
                $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
                if(move_uploaded_file($img['tmp_name'],$dossier.$fichier))echo 'Upload effectué avec succès !';   
                else echo 'Echec de l\'upload !';    
            } else {   
                echo $erreur; 
            } 
            return $fichier;
        }
        public function is_in_array($extension,$extensions){
            foreach($extensions as $temp){
                if(strcmp(strtolower($extension),$temp))return true;
            }
            return false;
        }
}
?>

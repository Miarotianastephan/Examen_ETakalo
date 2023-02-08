<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class GetProduct_model extends CI_Model{
        function getMembres(){
            $tab = array();
            $query = $this->db->query("select * from  member");
            foreach($query->result_array() as $base){
                array_push($tab, $base);
            }
            return $tab;
        }
        function addMember($nom , $email , $pwd){
            $request = "insert into member values(null,1,%s , %s, %s)";
            $request  = sprintf($request,$this->db->escape($nom),$this->db->escape($email),$this->db->escape($pwd));
            $this->db->query($request);
            return $request;
        }
        public function get_data_objet(){
            $tab = array();
            $request = $this->db->query('select * from objet');
            foreach( $request->result_array() as $row ){
                array_push($tab, $row);
            }
            return $tab;
        }
        public function get_data_categorie(){
            $tab = array();
            $request = $this->db->query('select * from categorie');
            foreach( $request->result_array() as $row ){
                array_push($tab, $row);
            }
            return $tab;
        }
        public function get_data_objetbyDiif($id){
            $tab = array();
            $request = $this->db->query('select * from objet where idMembre!='.$id);
            foreach( $request->result_array() as $row ){
                array_push($tab, $row);
            }
            return $tab;
        }
        public function get_data_objetbyId($id){
            $tab = array();
            $request = $this->db->query('select * from objet where idMembre='.$id);
            foreach( $request->result_array() as $row ){
                array_push($tab, $row);
            }
            return $tab;
        }
        public function get_data_detailobjet(){
            $tab[] = array();
            $i = 0;//chaque ligne du tableau
            $request = $this->db->query('select * from detailobjet');
            foreach( $request->result_array() as $row ){
                $tab[$i]['idObjet'] = $row['idObjet'];
                $tab[$i]['photo'] = $row['photo'];
                $i++;
            }
            return $tab;
        }

        public function insert_data_user($pwd,$nom,$email){
            $request = "insert into user(pwd,nom,email) values(%s , %s, %s)";
            $request  = sprintf($request,$this->db->escape($pwd),$this->db->escape($nom),$this->db->escape($email));
            $this->db->query($request);
        }
        public function insert_categorie($idcat,$idObj){
            $request = "insert into objetcategorie values(%s , %s)";
            $request  = sprintf($request,$this->db->escape($idcat),$this->db->escape($idObj));
            $this->db->query($request);
        }

          // insertion objet
          public function insert_objet($idM,$desc,$prix){
            $request = "insert into objet(idMembre,descri,prix) values(%s , %s, %s)";
            $request  = sprintf($request,$this->db->escape($idM),$this->db->escape($desc),$this->db->escape($prix));
            $status = $this->db->query($request);
            return $status;
        }

        public function get_lastIdObjet(){
            $request = $this->db->query('select * from objet order by id desc limit 1');
            $linedata = $request->row_array();
            return $linedata['id'];
        }


        // insertion detail_objet
        public function insert_datailobjet($detail){
            // alaina ny id maximum alohany insert detail objet
            $lastID = $this->get_lastIdObjet();
            $request = "insert into detailobjet values(%s , %s)";
            $request  = sprintf($request,$this->db->escape($lastID),$this->db->escape($detail));
            $status = $this->db->query($request);
            return $status;
        }

        
        // insertion detail_objet
        public function insert_proposition($idObjetA,$idObjetB){
            $request = "insert into propositionechange(idA_echanger,idB_echanger,estvalider) values(%s , %s, 0)";
            $request  = sprintf($request,$this->db->escape($idObjetA),$this->db->escape($idObjetB));
            $status = $this->db->query($request);
            return $status;
        }

        // insert objetDetailer
        public function insertMyObjet($idM,$desc,$prix,$imgsource){
            $this->insert_objet($idM,$desc,$prix);
            for($i = 0; $i < count($imgsource); $i++){
                $this->insert_datailobjet($imgsource[$i]);
            }
        }

        public function get_AllObjet(){
            $tab = array();
            $requete_vue = "select ob.id,ob.idMembre,ob.descri,ob.prix,dob.photo from objet ob
            join detailobjet dob on dob.idObjet=ob.id"; 
            $request = $this->db->query($requete_vue);
            // $request = $this->db->query('select * from listdetailobjet');
            foreach( $request->result_array() as $row ){
                array_push($tab,$row);
            }
            return $tab;
        }
        public function get_objetbycatego(){
            $tab = array();
            $request = $this->db->query('select * from objetcategorie');
            foreach( $request->result_array() as $row ){
                array_push($tab,$row);
            }
            return $tab;
        }
        public function get_AllProposition(){
            $tab = array();
            $request = $this->db->query('select * from propositionechange');
            foreach( $request->result_array() as $row ){
                array_push($tab,$row);
            }
            return $tab;
        }
        public function get_Idroposition(){
            $tab = array();
            $request = $this->db->query('select distinct(idA_echanger) from propositionechange');
            foreach( $request->result_array() as $row ){
                array_push($tab,$row);
            }
            return $tab;
        }
        public function verifPropostion($idMembre){
            $tab = $this->get_AllProposition();
            $arr = array();
            for ($i = 0; $i < count($tab); $i++) {
                $tempObj = $this->getObjet($tab[$i]['idA_echanger']);
                if( ($tempObj['idMembre'] == $idMembre) && ($tab[$i]['estvalider']==0) ){
                    array_push($arr, $tab[$i]);
                }
            } return $arr;
        }

        public function insert_ObjetDetail($idM,$desc,$prix){ 
            // File upload configuration 
            // $targetDir = "D:/UwAmp/www/S3/Mysql_frame/assets/images/upload/";
           $targetDir ="C:/IT_WORK/work_ITU/work_web/UwAmp/www/Mysql_frame/assets/images/upload/"; 
            $allowTypes = array('jpg','png','jpeg','gif','webp'); 
            
            $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
            $fileNames = array_filter($_FILES['files']['name']); 
            if(!empty($fileNames)){ 
                foreach($_FILES['files']['name'] as $key=>$val){ 
                    // File upload path 
                    $fileName = basename($_FILES['files']['name'][$key]); 
                    $targetFilePath = $targetDir . $fileName; 
                    
                    // Check whether file type is valid 
                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                    if(in_array($fileType, $allowTypes)){ 
                        // Upload file to server 
                        // argument ====> temp_name du fichier ::: dossier contenant les images
                        // var_dump($_FILES["files"]);
                        if(move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)){ 
                            // insertion objet+image
                            if($insertValuesSQL == ''){
                                $insertValuesSQL = $this->insert_objet($idM,$desc,$prix);
                            }
                            $this->insert_datailobjet($_FILES["files"]["name"][$key]);
                        }else{ 
                            $errorUpload .= $_FILES['files']['name'][$key].' | '; 
                        } 
                    }else{ 
                        $errorUploadType .= $_FILES['files']['name'][$key].' | '; 
                    } 
                } 
            }else{ 
                $statusMsg = 'Please select a file to upload.'; 
            }
        return $errorUpload;
        } 

        public function update_objet($idM,$idObA_echanger,$idObB_echanger){
            // maka ojbet roa ho permutena
            

            $ObjA = $this->getObjet($idObA_echanger);
            $idMembre_A = $idM;
            $ObjB = $this->getObjet($idObB_echanger);
            $idMembre_B = $ObjB['idMembre'];

            // atao takalo 14 sy 16>>>>> 14(3) de 16(2)
            $request = "update objet set idMembre=%s where id=%s";
            $request  = sprintf($request,$this->db->escape($idMembre_B),$this->db->escape($idObA_echanger));
            $status = $this->db->query($request);

            // atao takalo 14 sy 16>>>>> 14(3) de 16(2)
            $request2 = "update objet set idMembre=%s where id=%s";
            $request2 = sprintf($request2,$this->db->escape($idMembre_A),$this->db->escape($idObB_echanger));
            $status = $this->db->query($request2);

            // enregistrement des historiques objet 1
            $req_histo = "insert into historiqueproprio(idAncproprio,idObjet,dtappart) values(%s ,%s ,now())";
            $req_histo = sprintf($req_histo,$this->db->escape($ObjA['idMembre']),$this->db->escape($idObA_echanger));
            $status = $this->db->query($req_histo);
            // enregistrement des historiques objet 2
            $req_histo2 = "insert into historiqueproprio(idAncproprio,idObjet,dtappart) values(%s ,%s ,now())";
            $req_histo2 = sprintf($req_histo2,$this->db->escape($ObjB['idMembre']),$this->db->escape($idObB_echanger));
            $status = $this->db->query($req_histo2);

            // echange des proprio 
            $request3 = "update propositionechange set estvalider=1 , DateEchance = now() where idA_echanger=%s and idB_echanger=%s";
            $request3 = sprintf($request3,$this->db->escape($idObA_echanger),$this->db->escape($idObB_echanger));
            $status = $this->db->query($request3);

            return $status;
        }

        public function getObjet($idOb){
            $obj = $this->get_data_objet();
            for($i=0 ; $i < count($obj); $i++){
                if( $obj[$i]['id'] == $idOb ){
                    return $obj[$i];
                }
            }return null;
        }
        
        public function countMember(){
            $tab = array();
            $query = $this->db->query("select count(*) as n  from member where type!=0 ");
            $tab = $query->row_array() ;
            return $tab;
        }
        public function countEchance(){
            $tab = array();
            $query = $this->db->query("select count(distinct(dateEchance)) as n from propositionechange");
            $tab = $query->row_array() ;
            return $tab;
        }

        
        public function getObjetbyCle($cle){
            $tab = array();
            $sql = "select * from objet where descri like '%$cle%'";
            $request = $this->db->query($sql);
            foreach( $request->result_array() as $row ){
                array_push($tab,$row);
            }
            return $tab;
        }
        public function getObjetG(){
            $tab = array();
            $request = $this->db->query("select * from objetcategorie");
            foreach( $request->result_array() as $row ){
                array_push($tab,$row);
            }
            return $tab;
        }
        public function getObjetBygate($idcategorie , $cle){
            $tab = $this->getObjetbyCle($cle);
            // var_dump($tab) ;
            $tablo = $this->getObjetG() ;
            $answer = array();
                for ($i = 0; $i < count($tab); $i++) {
                    if($idcategorie == "all"){
                        array_push($answer, $tab[$i]);
                    }else{
                        if ($idcategorie == getIdcategorie($tablo, $tab[$i]['id'])) {
                            array_push($answer, $tab[$i]);
                    }
                    }
        }
            return $answer;
        }

        
        public function histo(){
            $tab = array();
            $request = $this->db->query("select * from historiqueproprio");
            foreach( $request->result_array() as $row ){
                array_push($tab,$row);
            }
            return $tab;
        }

    }
?>
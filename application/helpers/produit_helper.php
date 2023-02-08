<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    function Membres_Exists($tab , $email , $passd){
        for ($i=0; $i <count($tab) ; $i++) { 
           if(($tab[$i]['email'] == $email ) && ($tab[$i]['pwd'] == $passd)){
                return 'exists';
           }
        }
        return 'Noexists';
    }
    function GetId($tab , $email , $passd){
        for ($i=0; $i <count($tab) ; $i++) { 
            if(($tab[$i]['email'] == $email ) && ($tab[$i]['pwd'] == $passd)){
                 return $tab[$i]['id'];
            }
         }
         return 'Noexists';
    }
    function GetPhoto($tab,$id){
        for ($i=0; $i < count($tab) ; $i++) { 
            if(($tab[$i]['id'] == $id)){
                return $tab[$i]['photo'];
            }
        }
        return 'no photo';
    }
    function getTypebiid($tab,$id){
        for ($i=0; $i < count($tab) ; $i++) { 
            if(($tab[$i]['id'] == $id)){
                return $tab[$i]['type'];
            }
        }
        return 'no id';
    }
    function getNamebyId($tab,$id){
        for ($i=0; $i < count($tab) ; $i++) { 
            if(($tab[$i]['id'] == $id)){
                return $tab[$i]['nom'];
            }
        }
        return 'no id';
    }
    
    function getIdcategorie($tab , $id){
        for ($i=0; $i < count($tab) ; $i++) { 
            if($tab[$i]['idObjet'] == $id){
                return $tab[$i]['idCategorie'];
            }
        }
        return 'no'; 
    }
?>
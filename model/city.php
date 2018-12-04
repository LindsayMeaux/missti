<?php

class city extends database {
//déclaration des parametres de la classe
 public $id = 0;
 public $name = '';
 public $code = '';

     /* method permettant d'afficher la liste des villes et codes postaux et de les sélectionner par leur id
     */
     public function listCities(){
     $query = database::getInstance()->query('SELECT `id`, `name` , `code` FROM `JFRR11city`');
       return $query->fetchAll(PDO::FETCH_OBJ);
     }

}

 ?>

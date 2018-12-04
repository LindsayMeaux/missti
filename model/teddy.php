<?php
// création de la class teddy avec l'extends qui permet de faire le lien avec la database
class teddy extends database{
//déclaration des paramétres de la classe
public $id;
public $particular;
public $date;
public $description;


//méthode permettant d'ajouter une annonce avec inscription en bdd

    public function addTeddyAnnounce(){

      $query = 'INSERT INTO `LNDS12teddy`(`particular`, `date`,`description`, `idUsers`,`idColor`,`idType`,`idMaterial`, `idCity`) '
              . 'VALUES (:particular, :date, :description, :idUsers, :idColor, :idType, :idMaterial, :idCity)';
//appel de la méthode getInstance de la classe database
      $addTeddyAnnounce = database::getInstance()->prepare($query);
//bindvalue : associe une valeur à un paramêtre donc associe le bindvalue à ma colonne
      $addTeddyAnnounce->bindValue(':particular', $this->particular, PDO::PARAM_STR);
      $addTeddyAnnounce->bindValue(':date', $this->date, PDO::PARAM_STR);
      $addTeddyAnnounce->bindValue(':description', $this->description, PDO::PARAM_STR);
      $addTeddyAnnounce->bindValue(':idUsers', $this->idUsers, PDO::PARAM_INT);
      $addTeddyAnnounce->bindValue(':idColor', $this->idColor, PDO::PARAM_INT);
      $addTeddyAnnounce->bindValue(':idType', $this->idType, PDO::PARAM_INT);
      $addTeddyAnnounce->bindValue(':idMaterial', $this->idMaterial, PDO::PARAM_INT);
      $addTeddyAnnounce->bindValue(':idCity', $this->idCity, PDO::PARAM_INT);

      return $addTeddyAnnounce->execute();
    }

//méthode permettant de rechercher une annonce en selectionnant une couleur, un type, une matière, une ville
public function searchTeddyAnnounce(){
  $result = array();
  $teddyAnnounce = database::getInstance()->prepare('SELECT `LNDS12teddy`.`id`,`LNDS12teddy`.`particular`,`LNDS12teddy`.`description`,`JMP10color`.`name` AS `color`, `AYLN09type`.`type`,`idMaterial`,`JFRR11city`.`name`,`idUsers`,`CAL0209photo`.`name` AS `photo`
  FROM `LNDS12teddy`
  INNER JOIN `JMP10color` ON `JMP10color`.`id` = `LNDS12teddy`.`idColor`
  INNER JOIN `AYLN09type` ON `AYLN09type`.`id` = `LNDS12teddy`.`idType`
  INNER JOIN `DNA18material` ON `DNA18material`.`id` = `LNDS12teddy`.`idMaterial`
  INNER JOIN `JFRR11city` ON `JFRR11city`.`id` = `LNDS12teddy`.`idCity`
  INNER JOIN `CAL0209photo` ON `CAL0209photo`.`idTeddy` = `LNDS12teddy`.`id`
  WHERE `LNDS12teddy`.`idColor` LIKE :idColor AND `LNDS12teddy`.`idType` LIKE  :idType AND `LNDS12teddy`.`idMaterial` LIKE  :idMaterial AND `LNDS12teddy`.`idCity` LIKE :idCity');
  $teddyAnnounce->bindValue(':idColor' , '%'.$this->idColor.'%', PDO:: PARAM_STR);
    $teddyAnnounce->bindValue(':idMaterial' , '%'.$this->idMaterial.'%', PDO:: PARAM_STR);
      $teddyAnnounce->bindValue(':idType' , '%'.$this->idType.'%', PDO:: PARAM_STR);
      $teddyAnnounce->bindValue(':idCity' , '%'.$this->idCity.'%', PDO:: PARAM_STR);
  if ($teddyAnnounce->execute()) {
      $result = $teddyAnnounce->fetchAll(PDO::FETCH_OBJ);
  }
  return $result;
  }
  //méthode permettant de voir une annonce en particulier
 public function viewOneTeddy(){
   $result = array();
   $onlyAndOnceTeddy = database::getInstance()->prepare('SELECT `particular`,`description`, DATE_FORMAT(`date`,"%d/%m/%Y") AS `date`,`JMP10color`.`name` AS `color`,`JMP10color`.`id` AS `colorId`, `AYLN09type`.`type`, `AYLN09type`.`id` AS `typeId` , `DNA18material`.`name` AS `material`,`DNA18material`.`id` AS `materialId`,`JFRR11city`.`name`, `JFRR11city`.`id` AS `cityId`,`idUsers`,`CAL0209photo`.`name` AS `photo`
      FROM `LNDS12teddy`
      INNER JOIN `JMP10color` ON `JMP10color`.`id` = `LNDS12teddy`.`idColor`
      INNER JOIN `AYLN09type` ON `AYLN09type`.`id` = `LNDS12teddy`.`idType`
      INNER JOIN `DNA18material` ON `DNA18material`.`id` = `LNDS12teddy`.`idMaterial`
      INNER JOIN `JFRR11city` ON `JFRR11city`.`id` = `LNDS12teddy`.`idCity`
      INNER JOIN `CAL0209photo` ON `CAL0209photo`.`idTeddy` = `LNDS12teddy`.`id`
       WHERE `LNDS12teddy`.`id` = :id');
   $onlyAndOnceTeddy->bindValue(':id', $this->id, PDO::PARAM_INT);
   if($onlyAndOnceTeddy->execute()){
     $result = $onlyAndOnceTeddy->fetch(PDO::FETCH_OBJ);
   }
     return $result;
 }
 //méthode permettant à un utilisateur de voir ses annonces sur son profil
 public function teddyByUser(){
   $result = array();
   $addByUser = database::getInstance()->prepare('SELECT `LNDS12teddy`.`id`,`LNDS12teddy`.`idUsers`,`particular`,`description`, DATE_FORMAT(`date`,"%d/%m/%Y") AS `date`,`JMP10color`.`name` AS `color`, `AYLN09type`.`type`,`idMaterial`,`JFRR11city`.`name`,`idUsers`,`CAL0209photo`.`name` AS `photo`
      FROM `LNDS12teddy`
      INNER JOIN `JMP10color` ON `JMP10color`.`id` = `LNDS12teddy`.`idColor`
      INNER JOIN `AYLN09type` ON `AYLN09type`.`id` = `LNDS12teddy`.`idType`
      INNER JOIN `DNA18material` ON `DNA18material`.`id` = `LNDS12teddy`.`idMaterial`
      INNER JOIN `JFRR11city` ON `JFRR11city`.`id` = `LNDS12teddy`.`idCity`
      INNER JOIN `CAL0209photo` ON `CAL0209photo`.`idTeddy` = `LNDS12teddy`.`id`
      INNER JOIN `MTH29users` ON `MTH29users`.`id` = `LNDS12teddy`.`idUsers`
       WHERE `LNDS12teddy`.`idUsers` = :idUsers');

   $addByUser->bindValue(':idUsers', $this->idUsers, PDO::PARAM_INT);
   if($addByUser->execute()){
     $result = $addByUser->fetchAll(PDO::FETCH_OBJ);
   }
     return $result;

 }
 //méthode permettant de supprimer une annonce ainsi que la photo de l'annonce en cascade
 public function deletePhotoByTeddy(){

        $photoDeleteByTeddy = database::getInstance()->prepare('DELETE FROM `LNDS12teddy` WHERE `id`= :id');
        $photoDeleteByTeddy->bindValue(':id', $this->id, PDO:: PARAM_INT);
        return $photoDeleteByTeddy->execute();
    }
//méthode permettant à un utilisateur de modifier ses annonces
public function modifyAddByUser(){

$addModifiedByUser = database::getInstance()->prepare('UPDATE `LNDS12teddy` SET `date` = :modifDate ,`particular` = :particular, `description` = :description , `idType` = :idType, `idColor` = :idColor, `idMaterial` = :idMaterial, `idCity` = :idCity
WHERE `id` = :id');
$addModifiedByUser->bindValue(':id', $this->id, PDO::PARAM_INT);
$addModifiedByUser->bindValue(':particular', $this->particular, PDO::PARAM_STR);
$addModifiedByUser->bindValue(':description', $this->description, PDO::PARAM_STR);
$addModifiedByUser->bindValue(':idColor', $this->idColor, PDO::PARAM_INT);
$addModifiedByUser->bindValue(':idType', $this->idType, PDO::PARAM_INT);
$addModifiedByUser->bindValue(':idMaterial', $this->idMaterial, PDO::PARAM_INT);
$addModifiedByUser->bindValue(':idCity', $this->idCity, PDO::PARAM_INT);
$addModifiedByUser->bindValue(':modifDate', $this->date, PDO::PARAM_STR);

return $addModifiedByUser->execute();
}


}

<?php
class teddy extends database{

public $id;
public $particular;
public $date;
public $description;


  

    public function addTeddyAnnounce(){

      $query = 'INSERT INTO `LNDS12teddy`(`particular`, `date`,`description`, `idUsers`,`idColor`,`idType`,`idMaterial`, `idCity`) '
              . 'VALUES (:particular, :date, :description, :idUsers, :idColor, :idType, :idMaterial, :idCity)';
      $addTeddyAnnounce = database::getInstance()->prepare($query);

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

public function searchTeddyAnnounce(){
  $result = array();
  $teddyAnnounce = database::getInstance()->prepare('SELECT `particular`,`description`,`date`,`idColor`, `idType`,`idMaterial`,`idCity`,`idUsers`
  FROM `LNDS12teddy`
  INNER JOIN `JMP10color` ON `JMP10color`.`id` = `LNDS12teddy`.`idColor`
  INNER JOIN `AYLN09type` ON `AYLN09type`.`id` = `LNDS12teddy`.`idType`
  INNER JOIN `DNA18material` ON `DNA18material`.`id` = `LNDS12teddy`.`idMaterial`
  INNER JOIN `JFRR11city` ON `JFRR11city`.`id` = `LNDS12teddy`.`idCity`
  WHERE `LNDS12teddy`.`idColor` LIKE :idColor AND `LNDS12teddy`.`idType` LIKE  :idType AND `LNDS12teddy`.`idMaterial` LIKE  :idMaterial');
  $teddyAnnounce->bindValue(':idColor' , '%'.$this->idColor.'%', PDO:: PARAM_STR);
    $teddyAnnounce->bindValue(':idMaterial' , '%'.$this->idMaterial.'%', PDO:: PARAM_STR);
      $teddyAnnounce->bindValue(':idType' , '%'.$this->idType.'%', PDO:: PARAM_STR);
  if ($teddyAnnounce->execute()) {
      $result = $teddyAnnounce->fetchAll(PDO::FETCH_OBJ);
  }
  return $result;
  }


}

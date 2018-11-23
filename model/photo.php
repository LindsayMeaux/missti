<?php
class photo extends database {

    public $id = 0;
    public $name = '';

//méthode permettant de stocker en bdd le nom de la photo ainsi que la clé étrangère de l'annonce
public function uploadFile() {

        $query = 'INSERT INTO CAL0209photo (`name`,`idTeddy`) VALUES ( :name,:idTeddy)';

        $result = database::getInstance()->prepare($query);
        $result->bindValue(':name', $this->name, PDO::PARAM_STR);
        $result->bindValue(':idTeddy', $this->idTeddy, PDO::PARAM_INT);

        return $result->execute();
    }
public function modifiedFile(){

$photoModifiedByUser = database::getInstance()->prepare('UPDATE `CAL0209photo` SET `name` = :name WHERE `CAL0209photo`.`idTeddy` = :idTeddy');
$photoModifiedByUser->bindValue(':name', $this->name, PDO::PARAM_STR);
return $photoModifiedByUser->execute();
}
}

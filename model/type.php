<?php
class type extends database {

    public $id = 0;
    public $type = '';

//méthode permettant de selectionner un type par son id, dans une liste déroulante
public function getType() {
  $query = database::getInstance()->query('SELECT `id` ,`type` FROM `AYLN09type`');
    return $query->fetchAll(PDO::FETCH_OBJ);

}
}
?>

<?php
class type extends database {

    public $id = 0;
    public $name = '';

   
public function getType() {
  $query = database::getInstance()->query('SELECT `id` ,`name` FROM `AYLN09type`');
    return $query->fetchAll(PDO::FETCH_OBJ);

}
}
?>

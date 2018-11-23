<?php
class material extends database {

    public $id = 0;
    public $name = '';

   //méthode permettant de sélectionner une matiére par son id
public function getMaterial() {
  $query = database::getInstance()->query('SELECT `id` ,`name` FROM `DNA18material`');
    return $query->fetchAll(PDO::FETCH_OBJ);

}
}
?>

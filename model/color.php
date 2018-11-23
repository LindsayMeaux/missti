<?php
class color extends database {

    public $id = 0;
    public $name = '';
    public $code_hexa = '';

   //méthode permettant de sélectionner une couleur par son id
public function getColor() {
  $query = database::getInstance()->query('SELECT `id` ,`name`,`code_hexa` FROM `JMP10color`');
    return $query->fetchAll(PDO::FETCH_OBJ);

}
}
?>

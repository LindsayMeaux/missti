<?php
class color extends database {

    public $id = 0;
    public $name = '';
    public $code_hexa = '';

   
public function getColor() {
  $query = database::getInstance()->query('SELECT `id` ,`name`,`code_hexa` FROM `JMP10color`');
    return $query->fetchAll(PDO::FETCH_OBJ);

}
}
?>

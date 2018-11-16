<?php
class photo extends database {

    public $id = 0;
    public $name = '';
    public $source = '';



public function uploadFile() {
        $query = 'INSERT INTO CAL0209photo (`name`,`idTeddy`) VALUES ( :name,:idTeddy)';
        $result = database::getInstance()->prepare($query);
        $result->bindValue(':name', $this->name, PDO::PARAM_STR);
        $result->bindValue(':idTeddy', $this->idTeddy, PDO::PARAM_STR);

        return $result->execute();
    }
}

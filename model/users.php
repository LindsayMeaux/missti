<?php

class users extends database {

    public $id = 0;
    public $username = '';
    public $password = '';
    public $email = '';


    /**
     * Méthode permettant de faire la connexion de l'utilisateur
     * @return boolean
     */
    public function userConnection() {
        $state = false;
        $query = 'SELECT `id`,`username`,`password` FROM `MTH29users` WHERE `username` = :username';
        $result = database::getInstance()->prepare($query);
        $result->bindValue(':username', $this->username, PDO::PARAM_STR);
        if ($result->execute()) { //On vérifie que la requête s'est bien exécutée
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            if (is_object($selectResult)) { //On vérifie que l'on a bien trouvé un utilisateur
                // On hydrate
                $this->username = $selectResult->username;
                $this->password = $selectResult->password;
                $this->id = $selectResult->id;
                $state = true;
            }
        }
        return $state;
    }

    /**
     * Méthode permettant l'enregistrement d'un utilisateur
     * @return boolean
     */
    public function userRegister() {
        $query = 'INSERT INTO `MTH29users`(`username`, `email`, `password`) VALUES (:username, :email, :password)';
        $result = database::getInstance()->prepare($query);
        $result->bindValue(':username', $this->username, PDO::PARAM_STR);
        $result->bindValue(':email', $this->email, PDO::PARAM_STR);
        $result->bindValue(':password', $this->password, PDO::PARAM_STR);
        return $result->execute();
    }

    /**
     *
     * @return type
     */
    public function checkIfUserExist() {
        $state = false;
        $query = 'SELECT COUNT(`id`) AS `count` FROM `MTH29users` WHERE `username` = :username';
        $result = database::getInstance()->prepare($query);
        $result->bindValue(':username', $this->username, PDO::PARAM_STR);
        if ($result->execute()) {
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            $check = $selectResult->count;
        }
        return $check;
    }

    public function modifyPassword(){
      $updatePassword = database::getInstance()->prepare('UPDATE `MTH29users` SET `password` = :password WHERE `id` = :id');
      $updatePassword->bindValue(':id', $this->id, PDO::PARAM_INT);
      $updatePassword->bindValue(':password', $this->password, PDO::PARAM_STR);
      return $updatePassword->execute();
    }

}

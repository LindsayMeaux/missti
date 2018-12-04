<?php

class users extends database {

    public $id = 0;
    public $username = '';
    public $password = '';
    public $email = '';

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
     *
     * @return type
     */
     //méthode permettant de vérifier si le nom d'utilisateur est disponible
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
//méthode permettant à l'utilisateur de modifier son mot de passe avec enregistrement en bdd de son nouveau mot de passe
    public function modifyPassword(){
      $updatePassword = database::getInstance()->prepare('UPDATE `MTH29users` SET `password` = :password WHERE `id` = :id');
      $updatePassword->bindValue(':id', $this->id, PDO::PARAM_INT);
      $updatePassword->bindValue(':password', $this->password, PDO::PARAM_STR);
      return $updatePassword->execute();
    }
    //méthode permettant à d'afficher les informations de l'utilisateur
    public function viewOneUser(){
      $result = array();
      $informationsByUser = database::getInstance()->prepare('SELECT `id`,`username`,`email`
      FROM `MTH29users`
      WHERE `id` = :id ');
      $informationsByUser->bindValue(':id', $this->id, PDO::PARAM_INT);

      if($informationsByUser->execute()){
        $result = $informationsByUser->fetch(PDO::FETCH_OBJ);
      }
        return $result;
    }

    //méthode permettant à l'utilisateur de supprimer son compte ainsi que les annonces qu'il a posté
    public function deleteUser(){

           $deleteUser = database::getInstance()->prepare('DELETE FROM `MTH29users` WHERE `id`= :id');
           $deleteUser->bindValue(':id', $this->id, PDO:: PARAM_INT);
           return $deleteUser->execute();
       }
//méthode permettant à un utilisateur de contacter par mail un autre utilisateur
       public function selectMailForMessage(){
$mailingUser = database::getInstance()->prepare( 'SELECT `us`.`email` FROM `MTH29users` AS `us` LEFT JOIN `LNDS12teddy` AS `t` ON `t`.`idUsers` = `us`.`id` WHERE `t`.`id` = :id');
$mailingUser->bindValue(':id', $this->id,PDO::PARAM_INT);
if($mailingUser->execute()){
$mail = $mailingUser->fetch(PDO::FETCH_COLUMN);
}
return $mail ;

    }
}

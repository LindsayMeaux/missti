<?php

/**
 * Création de la class database permettant de se connecter à la bdd mysql
 */
class database {

    private static $db;

    /**
     * Méthode qui créer l'unique instance de la class si elle n'existe pas encore puis la retourne (utilisation du singleton)
     */
    public static function getInstance() {
      if(is_null(self::$db)){

        try {
          self::$db = new PDO('mysql:host=' .HOST. ';port=' .PORT. ';dbname=' .DBNAME. ';charset=' .CHARSET. ';', LOGIN, PASSWORD);
        self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //TODO REMOVE TO AVOID DISPLAYING SQL ERROR

        } catch (Exception $ex) {
            die($ex->getMessage());
        }
    }
    return self::$db;
  }
 /**
 * Méthode permettant de récupérer le dernier ID inseré dans la BDD
 */
  public function getLastInsertId() {
      $result = 0;
      $query = 'SELECT LAST_INSERT_ID() AS `id`';
      $result = self::getInstance()->prepare($query);
      if($result->execute()){
          if (is_object($result)) {
              $result = $result->fetch(PDO::FETCH_COLUMN);
          }
      }
      return $result;
  }


public function __destruct(){
  $db = NULL;
}
}

<?php

include_once path::getClassesPath() . 'database.php';

//
class users extends database {

    //déclaration des attributs
    public $id;
    public $lastname;
    public $firstname;
    public $username;
    public $password;
    public $phone;
    public $birthdate;
    public $idUserType;
    public $idCivility;
    public $createDate;

    /*
     * Méthode pour l'ajout d'un utilisateur
     */

    public function addUser() {
        //déclaration de la requete sql
        $request = 'INSERT INTO `p24oi86_users`(`lastname`,`firstname`,`birthdate`,`phone`,`mail`,`username`,`password`,`idUserType`,`idCivility`,`createDate`) '
                . 'VALUES (:lastname, :firstname, :birthdate, :phone, :mail, :username, :password, :idUserType, :idCivility ,:createDate)';
        $insertUser = $this->db->prepare($request);
//        blind value permet de mettre une valeur a notre marqueur nominatif, il nous protége un minimum des injection sql
//        on utilise un bind value pour chaque clé nominatif
        $insertUser->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $insertUser->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $insertUser->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $insertUser->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $insertUser->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $insertUser->bindValue(':username', $this->username, PDO::PARAM_STR);
        $insertUser->bindValue(':password', $this->password, PDO::PARAM_STR);
        $insertUser->bindValue(':idUserType', $this->idUserType, PDO::PARAM_INT);
        $insertUser->bindValue(':idCivility', $this->idCivility, PDO::PARAM_INT);
        $insertUser->bindValue(':createDate', $this->createDate, PDO::PARAM_STR);
        return $insertUser->execute();
    }

    public function checkIfUserExist() {
        //initialisation de la variable $exist avec FALSE
        $exist = FALSE;
        //déclaration de la requête sql
        $request = 'SELECT COUNT(`id`) AS `count` '
                . 'FROM `p24oi86_users` '
                . 'WHERE `username` = :username';
        //appel de la requête avec un prepare  que l'on stocke dans la variable $result
        $result = $this->db->prepare($request);
        //attribution de la valeur au marqueur nominatif avec bindValue (protection contre les injections de sql)
        $result->bindValue(':username', $this->username, PDO::PARAM_STR);
        //vérification que la requête s'est bien exécutée
        if ($result->execute()) {
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            //attribution du résultat du count (0 ou 1) à la variable $exist
            $exist = $selectResult->count;
        }
        return $exist;
    }

      public function userConnect() {
        $exist = false;
        $request = 'SELECT `id`, `lastname`, `firstname`, `password`, `username` FROM `p24oi86_users` WHERE `username` = :username';
        $result = $this->db->prepare($request);
        $result->bindValue(':username', $this->username, PDO::PARAM_STR);
        if ($result->execute()) { 
            $selectResult = $result->fetch(PDO::FETCH_OBJ);
            if (is_object($selectResult)) { //On vérifie que l'on a bien trouvé un utilisateur
                // On hydrate
                $this->lastname = $selectResult->lastname;
                $this->firstname = $selectResult->firstname;
                $this->password = $selectResult->password;
                $this->username = $selectResult->username;
                $this->id = $selectResult->id;
                $exist = true;
            }
        }
        return $exist;
    }
}
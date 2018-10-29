<?php

include_once path::getClassesPath().'database.php';

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

}

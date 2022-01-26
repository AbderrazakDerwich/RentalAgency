<?php

namespace App\Repository;

use Exception;
use PDO;

class RepositoryUser
{ // UserRepository

    public function __construct(PDO $db)
    {
        $this->_db = $db;
    }

    public function readById(int $id)
    {
        $query = "SELECT id , firstname , lastname , email , password , sex , role FROM  user WHERE id=:id ";
        $reponse = $this->_db->prepare($query);
        $reponse->bindValue(':id', $id);
        if (($reponse->execute()) === true) {
            $reponse->setFetchMode(PDO::FETCH_CLASS, 'App\Entitie\User');
            return $reponse->fetch();
        } else {
            return false;
        }
    }

    public function count()
    {
        $query = "SELECT COUNT(id) FROM user";
        $req = $this->_db->prepare($query);
        $req->execute();
        return $req->fetch();
    }

    public function select(int $limit, int  $offset)
    {
        $query = "SELECT id , firstname , lastname , email , sex  FROM  user  ";
        $query .= " LIMIT " . $limit;
        $query .= " OFFSET " . $offset;
        $req = $this->_db->prepare($query);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, 'App\Entitie\user');
        return $req->fetchall();
    }


    public function selectByEmail(string $email)
    {
        $query = "SELECT id , firstname , lastname , email , password , sex , role FROM  user WHERE email=:email ";
        $reponse = $this->_db->prepare($query);
        $reponse->bindValue(':email', $email);
        if (($reponse->execute()) === true) {
            $reponse->setFetchMode(PDO::FETCH_CLASS, 'App\Entitie\User');
            return $reponse->fetch();
        } else {
            return false;
        }
    }

    public function read()
    {
        $query = "SELECT id , firstname , lastname , email , password , sex , role FROM  user ";
        $reponse = $this->_db->prepare($query);
        if (($reponse->execute()) === true) {
            $reponse->setFetchMode(PDO::FETCH_CLASS, 'App\Entitie\User');
            return $reponse->fetchall();
        } else {
            return false;
        }
    }


    public function checkAuthentication(string $email, string $password)
    {
        $query = "SELECT id ,role , password  FROM user WHERE email = :email ";
        $req = $this->_db->prepare($query);
        $req->bindValue(':email', $email);
        $req->execute();
        $data = $req->fetch();
        print_r($password);
        echo "<pre>";
        print_r($data['id']);
        echo "<pre>";
        var_dump(password_hash($password, PASSWORD_BCRYPT));
        var_dump(password_hash($password, PASSWORD_BCRYPT));
        print_r($data['password']);
        echo "<pre>";
        var_dump(password_verify($password, $data['password']));
        die;
        if (password_verify($password, $data['password'])) {
            return $data;
        } else {
            return false;
        }
    }
    //$2y$10$Tifqodrh8kDH2i/PWYDvgevjHukN0bx5invJrhpkX137yriElDIVe
    //$2y$10$Tifqodrh8kDH2i/PWYDvgevjHukN0bx5invJrhpkX137yriElDIVe
    //$2y$10$Tifqodrh8kDH2i/PWYDvgevjHukN0bx5invJrhpkX137yriElDIVe
    public function update(int $id, string  $firstname, string $lastname, string  $email, string $password, string $sex, string $role)
    {
        $query = "UPDATE user
                SET  firstname = :firstname , lastname = :lastname , email = :email , password = :password , sex = :sex , role = :role
                WHERE id = :id";
        $reponse = $this->_db->prepare($query);
        $reponse->bindValue(':id', $id);
        $reponse->bindValue(':firstname', $firstname);
        $reponse->bindValue(':lastname', $lastname);
        $reponse->bindValue(':email', $email);
        $reponse->bindValue(':password', $password);
        $reponse->bindValue(':sex', $sex);
        $reponse->bindValue(':role', $role);
        $reponse->execute();
    }

    public function insert(string  $firstname, string $lastname, string  $email, string $password, string $sex, string $role)
    {
        $query = "INSERT INTO user (firstname , lastname , email , password , sex , role )
        VALUES (:firstname , :lastname , :email , :password , :sex , :role)";
        $reponse = $this->_db->prepare($query);
        $reponse->bindValue(':firstname', $firstname);
        $reponse->bindValue(':lastname', $lastname);
        $reponse->bindValue(':email', $email);
        $reponse->bindValue(':password', $password);
        $reponse->bindValue(':sex', $sex);
        $reponse->bindValue(':role', $role);
        $reponse->execute();
    }

    public function delete(int $id)
    {
        $query = "DELETE FROM user WHERE id=:id";
        $reponse = $this->_db->prepare($query);
        $reponse->bindValue('id', $id);
        $reponse->execute();
    }
}

//vehicle id brand maxMileage price

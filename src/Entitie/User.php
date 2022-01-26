<?php 
declare(strict_types=1);
namespace App\Entitie;
use Exception;
class User{

    //Entities

    private int $id;
    private string $firstname;
    private string $lastname;
    private string $email;
    private string $password;
    private string $sex;
    private string $role;
    

    //Setter
    public function setid(int $id)
    {
        $this->id=$id;
    }

    public function setFirstName(string $firstname)
    {
        $this->firstname=$firstname;
    }
    
    public function setLastName(string $lastname)
    {
        $this->lastname=$lastname;
    }

    public function setEmail(string $email)
    {    
        $this->email=$email;
    }

    public function setPassword(string $password)
    {
        $this->password=password_hash($password,PASSWORD_BCRYPT);
    }
    
    public function setSex(string $sex )
    {
        $this->sex=$sex;
    }

    public function setRole($role)
    {
        $this->role=$role;
    }

    //Getter
    
    public function getid()
    {
        return $this->id;
    }

    public function getFirstName()
    {
        return $this->firstname;
    }
    
    public function getLastName()
    {
        return $this->lastname;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getSex()
    {
        return $this->sex;
    }

    public function getRole()
    {
        return $this->role;
    }
}

<?php 
declare(strict_types=1);
namespace App\Faker;
use PDO;
use Faker\Generator;
class FillUser {

    private PDO  $_db;
    private $_faker;
  
    public function __construct(Generator $faker, PDO $db)
    {
        $this->_db=$db ; //new PDO('mysql:host=localhost;dbname=projetagence;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));;
        $this->_faker=$faker;
    }

    public function fill()
    {
        $query="INSERT INTO user SET 
        firstname=:firstname , lastname=:lastname , email=:email , password=:password , sex=:sex , role=:role";
        $request=$this->_db->prepare($query);  
        $request->bindValue(':firstname',$this->_faker->name());
        $request->bindValue(':lastname',$this->_faker->lastName());
        $request->bindValue(':email',$this->_faker->email());
        $pass = "demodemo";
        $request->bindValue(':password', password_hash($pass, 'md5'));
        $request->bindValue(':sex',$this->_faker->randomElement($array = array ('male','feminine')));
        $request->bindValue(':role',$this->_faker->randomElement($array = array ('User','Admin')));
        $request->execute();
    }
}

?>
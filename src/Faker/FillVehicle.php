<?php 
//declare(strict_types=1);
namespace App\Faker;
use PDO;
class FillVehicle {

    private  $_db;
    private $_faker;
  
    public function __construct( $faker)
    {
        $this->_db=new PDO('mysql:host=localhost;dbname=projetagence;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));;
        $this->_faker=$faker;
    }
	
    public function fill($id)
    {
        $query="INSERT INTO vehicle SET 
        id=:id , brand=:brand , maxMileage=:maxMileage , price=:price ,availability=:availability";
        $request=$this->_db->prepare($query);  
        $request->bindValue(':id',$id);
        $request->bindValue(':brand',$this->_faker->randomElement($array = array ('Audi','BMW','Chery','Chevrolet','Dacia','Fiat','Ford','Geely','Hyundai','Mazda','Kia','Toyota','Opel','Renault','Seat','Volkswagen')));
        $request->bindValue(':maxMileage',$this->_faker->biasedNumberBetween($min = 0, $max = 500));
        $request->bindValue(':price',$this->_faker->biasedNumberBetween($min = 50, $max = 300));
        $request->bindValue(':availability',$this->_faker->randomElement($array = array ('oui','non')));
        $request->execute();
    }
}

?>
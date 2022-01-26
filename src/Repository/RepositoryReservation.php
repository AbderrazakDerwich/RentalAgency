<?php 
namespace App\Repository;
use Exception;
use PDO ;
class RepositoryReservation {

    public function __construct(PDO $db)
    {
        $this->_db=$db;
    }
//id vehicle_id user_id startOfReservation endOfReservation approve

    public function selectAllById(int $id)
    {
        $query="SELECT id , vehicle_id , user_id , startOfReservation , endOfReservation , approve FROM reservation WHERE vehicle_id = :vehicle_id ";
        $reponse=$this->_db->prepare($query);
        $reponse->bindValue(':vehicle_id',$id);
        if (($reponse->execute())===true)
        {
            $reponse->setFetchMode(PDO::FETCH_CLASS, 'App\Entitie\Reservation');
            return $reponse->fetchall();
        }
        else
        {
            return false;
        }
    }


    public function selectByJoin()
    {
        $query = "SELECT  u.lastname , u.firstname , r.id , r.vehicle_id , r.startOfReservation , r.endOfReservation , r.approve
        FROM reservation r
        Left JOIN  user u
        ON  r.user_id LIKE u.id  ";
        $rep = $this->_db->prepare($query);
        $rep->execute();
        return $rep->fetchall();
    }


    public function selectById(int $id)
    {
        $query = "SELECT user_id , vehicle_id , startOfReservation , endOfReservation  FROM  reservation WHERE id = :id ";
        $reponse = $this->_db->prepare($query);
        $reponse->bindValue(':id', $id);
        if (($reponse->execute()) === true) {
            return $reponse->fetch();
        }
    }
    

    public function insert (int $vehicle_id , int $user_id , string  $startOfReservation , string $endOfReservation , string $approve)
    {
        $query="INSERT INTO reservation (vehicle_id , user_id , startOfReservation , endOfReservation , approve )
        VALUES (:vehicle_id , :user_id , :startOfReservation , :endOfReservation , :approve)";
        $reponse=$this->_db->prepare($query);
        $reponse->bindValue(':vehicle_id',$vehicle_id);
        $reponse->bindValue(':user_id',$user_id);
        $reponse->bindValue(':startOfReservation',$startOfReservation);
        $reponse->bindValue(':endOfReservation',$endOfReservation);
        $reponse->bindValue(':approve',$approve);
        $reponse->execute();
    }

    public function update(int $id)
    {
        $query = "UPDATE reservation
                SET  approve = :approve
                WHERE id=:id";
        $reponse = $this->_db->prepare($query);
        $reponse->bindValue(':id', $id);
        $reponse->bindValue(':approve','oui');
        $reponse->execute();
    }

    public function delete(int $id)
    {
        $query = "DELETE FROM reservation WHERE id=:id";
        $reponse = $this->_db->prepare($query);
        $reponse->bindValue('id', $id);
        $reponse->execute();
    }
    
}
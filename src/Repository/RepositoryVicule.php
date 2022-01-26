<?php 
namespace App\Repository;
use Exception;
use PDO ;
class RepositoryVicule {

    public function __construct(PDO $db)
    {
        $this->_db=$db;
    }

    public function count()
    {
        $query="SELECT COUNT(id) FROM vehicle";
        $req=$this->_db->prepare($query);
        $req->execute();
        return $req->fetch();
    }

    public function select(int $limit , int  $offset )
    {
        $query="SELECT id , brand , model , maxMileage , price , availability FROM  vehicle ";
        $query.=" LIMIT ".$limit;
        $query.=" OFFSET ".$offset;
        $req=$this->_db->prepare($query);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, 'App\Entitie\Vehicle');
        return $req->fetchall();
    }
    
    public function readByBrand(string $brand)
    {
        $query="SELECT id , brand , maxMileage , price , availability FROM  vehicle WHERE brand=:brand ";
        $reponse=$this->_db->prepare($query);
        $reponse->bindValue(':brand',$brand);
        if (($reponse->execute())===true)
        {
            $reponse->setFetchMode(PDO::FETCH_CLASS, 'App\Entitie\Vehicle');
            return $reponse->fetchall();
        }
        else
        {
            return false;
        }
    }

    public function readById(int $id)
    {
        $query="SELECT id , brand , model , maxMileage , price , availability FROM  vehicle WHERE id = :id ";
        $reponse=$this->_db->prepare($query);
        $reponse->bindValue(':id',$id);
        if (($reponse->execute())===true)
        {
            $reponse->setFetchMode(PDO::FETCH_CLASS, 'App\Entitie\Vehicle');
            return $reponse->fetch();
        }
    }

    public function readByIdTable(int $id)
    {
        $query="SELECT  model FROM  vehicle WHERE id = :id ";
        $reponse=$this->_db->prepare($query);
        $reponse->bindValue(':id',$id);
        if (($reponse->execute())===true)
        {
            return $reponse->fetch();
        }
    }

    public function read()
    {
        $query="SELECT id , brand , model , maxMileage , price , availability FROM  vehicle ";
        $reponse=$this->_db->prepare($query);
        if (($reponse->execute())===true)
        {
            $reponse->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'App\Entitie\Vehicle');
            return $reponse->fetchall();

        }
        else
        {
            return false;
        }
    }


    public function update(int $id, string $brand , string $model , int $maxMileage ,int $price )
    {
        $query="UPDATE vehicle
                SET  brand=:brand, model= :model ,maxMileage=:maxMileage , price=:price
                WHERE id=:id"; 
        $reponse=$this->_db->prepare($query);
        $reponse->bindValue(':id',$id);
        $reponse->bindValue(':brand',$brand);
        $reponse->bindValue(':model',$model);
        $reponse->bindValue(':maxMileage',$maxMileage);
        $reponse->bindValue('price',$price);
        $reponse->execute();
    }

    public function insert ( string $brand , string $model , int $maxMileage ,int $price)
    {
        $query="INSERT INTO vehicle (brand , model , maxMileage , price  )
        VALUES (:brand , :model , :maxMileage , :price )";
        $reponse=$this->_db->prepare($query);
        $reponse->bindValue(':brand',$brand);
        $reponse->bindValue(':model',$model);
        $reponse->bindValue(':maxMileage',$maxMileage);
        $reponse->bindValue('price',$price);
        $reponse->execute();
    }

    public function delete  (int $id)
    {
        $query="DELETE FROM vehicle WHERE id=:id";
        $reponse=$this->_db->prepare($query);
        $reponse->bindValue('id',$id);
        $reponse->execute();
    }
}

//vehicle id brand maxMileage price
?>
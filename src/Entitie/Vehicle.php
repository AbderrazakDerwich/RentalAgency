<?php

declare(strict_types=1);

namespace App\Entitie;

use Exception;

class Vehicle
{

    //Entities
    private int    $id;
    private string $brand;
    private string $model;
    private int    $maxMileage;
    private int    $price;
    private string $availability;


    //Setter

    public function setid(int $id)
    {
        if (is_int($id)) {
            $this->id = $id;
        } else {
            throw new Exception('Invalid first name ');
        }
    }

    public function setBrand(string $brand)
    {
        if (filter_var($brand, FILTER_SANITIZE_STRING) === $brand) {
            $this->brand = $brand;
        } else {
            throw new Exception('Invalid first name ');
        }
    }

    public function setmodel(string $model)
    {
        if (filter_var($model, FILTER_SANITIZE_STRING) === $model) {
            $this->model = $model;
        } else {
            throw new Exception('Invalid first name ');
        }
    }

    public function setMaxMileage(int $maxMileage)
    {
        if (($maxMileage >= 0) && ($maxMileage < 300)) {
            $this->maxMileage = $maxMileage;
        } else {
            throw new Exception('Invalid kilometrage ');
        }
    }

    public function setPrice(int $price)
    {
        if (is_int($price)) {
            $this->price = $price;
        } else {
            throw new Exception('Invalid prix ');
        }
    }

    public function setavAilability(string $availability)
    {
        if (in_array($availability, ['oui', 'non'])) {
            $this->availability = $availability;
        } else {
            throw new Exception('Invalid');
        }
    }

    //Getter 

    public function getid()
    {
        return $this->id;
    }
    
    public function getBrand()
    {
        return $this->brand;
    }

    public function getmodel()
    {
        return $this->model;
    }

    public function getMaxMileage()
    {
        return $this->maxMileage;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getavAilability()
    {
        return $this->availability;
    }
}

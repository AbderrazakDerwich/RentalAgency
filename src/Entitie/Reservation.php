<?php

declare(strict_types=1);

namespace App\Entitie;

use Exception;

class Reservation
{

    //Attributes
    private int $id;
    private int $vehicle_id; // camelCase
    private int $user_id;
    private string $startOfReservation;
    private string $endOfReservation;
    private string $approve;

    //Setter

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function setVehicleId(int $vehicle_id)
    {
        $this->vehicle_id = $vehicle_id;
    }

    public function setUserId(int $user_id)
    {
        $this->user_id = $user_id;
    }

    public function setStartOfReservation(string $startOfReservation)
    {
        $this->startOfReservation = $startOfReservation;
    }

    public function setEndOfReservation(string $endOfReservation)
    {
        $this->endOfReservation = $endOfReservation;
    }

    public function setApprove(string $approve)
    {
        $this->approve = $approve;
    }

    //Getter

    public function getId()
    {
        return  $this->id;
    }

    public function getVehicleId()
    {
        return  $this->vehicle_id;
    }

    public function getUserId()
    {
        return  $this->user_id;
    }

    public function getStartOfReservation()
    {
        return  $this->startOfReservation;
    }

    public function getEndOfReservation()
    {
        return $this->endOfReservation;
    }

    public function getApprove()
    {
        return $this->approve;
    }
}

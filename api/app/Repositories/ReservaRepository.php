<?php

// app/Repositories/ReservaRepository.php
namespace App\Repositories;

use App\Interfaces\ReservaRepositoryInterface;
use App\Models\Reserva;

class ReservaRepository implements ReservaRepositoryInterface
{
    public function saveReserva(array $data): Reserva
    {
        return Reserva::create($data);
    }
}
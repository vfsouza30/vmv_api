<?php

// app/Interfaces/ReservaRepositoryInterface.php
namespace App\Interfaces;

use App\Models\Reserva;

interface ReservaRepositoryInterface
{
    public function saveReserva(array $data): Reserva;
}
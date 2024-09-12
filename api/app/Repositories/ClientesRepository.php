<?php

// app/Repositories/ClientsRepository.php
namespace App\Repositories;

use App\Interfaces\ClientesRepositoryInterface;
use App\Models\Clientes;

class ClientesRepository implements ClientesRepositoryInterface
{
    public function getClients(): Clientes
    {
        return Clientes::all();
    }
}
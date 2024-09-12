<?php

// app/Interfaces/ClientesRepositoryInterface.php
namespace App\Interfaces;

use App\Models\Clientes;

interface ClientesRepositoryInterface
{
    public function getClients(): Clientes;
}
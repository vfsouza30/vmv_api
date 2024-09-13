<?php

// app/Interfaces/ClientesRepositoryInterface.php
namespace App\Interfaces;

use App\Models\Clientes;
use Illuminate\Support\Collection;

interface ClientesRepositoryInterface
{
    /**
     * @return Collection|Clientes[]
     */

    public function getClients(): Collection;
}
<?php

// app/Repositories/ClientsRepository.php
namespace App\Repositories;

use App\Interfaces\ClientesRepositoryInterface;
use App\Models\Clientes;
use Illuminate\Support\Collection;

class ClientesRepository implements ClientesRepositoryInterface
{
    /**
     * @return Collection|Clientes[]
     */
    public function getClients(): Collection
    {
        return Clientes::where('ativo', 'ativo')->get();
    }
}
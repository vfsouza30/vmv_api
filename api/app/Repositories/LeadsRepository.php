<?php

// app/Repositories/LeadsRepository.php
namespace App\Repositories;

use App\Interfaces\LeadsRepositoryInterface;
use App\Models\Leads;

class LeadsRepository implements LeadsRepositoryInterface
{
    public function saveLeads(array $data): Leads
    {
        return Leads::create($data);
    }
}
<?php

// app/Interfaces/LeadsRepositoryInterface.php
namespace App\Interfaces;

use App\Models\Leads;

interface LeadsRepositoryInterface
{
    public function saveLeads(array $data): Leads;
}
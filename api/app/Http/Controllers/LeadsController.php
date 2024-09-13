<?php

namespace App\Http\Controllers;

use App\Models\Leads;
use App\Models\Clientes;
use App\Services\LeadsService;
use Illuminate\Http\JsonResponse;

class LeadsController extends Controller
{
    protected $leadsService;

    public function __construct(LeadsService $leadsService)
    {
        $this->leadsService = $leadsService;
    }

    public function fetchAndSave(): JsonResponse
    {
            try {
                $this->leadsService->fetchAndStoreLead();
                return response()->json(['message' => 'Lead saved successfully'], 200);
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
    }
}

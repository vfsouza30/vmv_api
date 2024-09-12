<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Clientes;
use App\Services\ReservaService;
use Illuminate\Http\JsonResponse;

class LeadsController extends Controller
{
    protected $reservaService;

    public function __construct(ReservaService $reservaService)
    {
        $this->reservaService = $reservaService;
    }

    public function fetchAndSave(): JsonResponse
    {

        $clientes = Clientes::where('ativo', 'ativo')->get();

        foreach ($clientes as $cliente) {
            try {
                $this->reservaService->fetchAndStoreReserva($cliente->id, $cliente->email_cliente, $cliente->token_cliente, '/reservas');
                return response()->json(['message' => 'Reserva saved successfully'], 200);
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        
    }
}

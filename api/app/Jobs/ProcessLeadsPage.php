<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\LeadsService;
use Illuminate\Support\Facades\Log;

class ProcessLeadsPage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 5; // Número de tentativas
    protected $cliente;
    protected $urlCompleted;
    protected $page;

    /**
     * Create a new job instance.
     */
    public function __construct($cliente, $urlCompleted, $page)
    {
        $this->cliente = $cliente;
        $this->urlCompleted = $urlCompleted;
        $this->page = $page;
    }

    /**
     * Execute the job.
     */
    public function handle(LeadsService $leadsService): void
    {
        // Processa a página específica da API
        try {
            $leadsService->processSinglePage($this->cliente, $this->urlCompleted, $this->page);
        } catch (\Exception $e) {
            Log::error('Erro no processamento do cliente: ' . $this->cliente->id, ['erro' => $e->getMessage()]);
        }
    }
    
}

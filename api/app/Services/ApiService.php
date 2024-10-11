<?php

// app/Services/LeadsService.php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Exceptions\ApiRequestException;
use Carbon\Carbon;
use DateTime;

class ApiService
{
    protected $requestsPerMinute = 200; // Limite de requisições
    protected $requestCount = 0; // Contador de requisições
    protected $startTime; // Hora do início do lote de requisições

    public function __construct()
    {
        $this->startTime = Carbon::now(); // Inicia o timestamp
    }

    public function makeApiRequest( string $email_cliente, string $token_cliente, int $page, string $url, int $cvio = 0)
    {   
        $this->throttleRequest(); // Verifica e aplica o throttling
        // Fazer a requisição com a página específica
        $this->requestCount++; // Incrementa o contador de requisições

        $startOfYesterday = (new DateTime('yesterday'))->setTime(0, 0, 1);
        $endOfToday = new DateTime('today');

        $starOfYesterdayFormat = $startOfYesterday->format('Y-m-d H:i:s'); // Exemplo de saída: 2023-10-04 00:00:01
        $endOfTodayFormat = $endOfToday->format('Y-m-d H:i:s');  

        if($cvio == 0) {
            return Http::withHeaders([
                'Content-Type' => 'application/json',
                'email' => $email_cliente,
                'token' => $token_cliente,
            ])->timeout(90)->get($url, [
                'pagina' => $page,
                'a_partir_data_referencia' => $starOfYesterdayFormat,
                'ate_data_referencia' => $endOfTodayFormat
            ]);
        }else{
            return Http::withHeaders([
                'Content-Type' => 'application/json',
                'email' => $email_cliente,
                'token' => $token_cliente,
            ])->timeout(90)->get($url);
        }
       

    }

    protected function throttleRequest()
    {
        // Calcular o tempo decorrido desde o início do lote de requisições
        $elapsedTime = Carbon::now()->diffInSeconds($this->startTime);

        // Se o tempo decorrido for menor que 60 segundos, aguarde o tempo restante
        if($elapsedTime < 60) {

            $waitTime = 60 - $elapsedTime;
            // Usar uma solução de espera não bloqueante com enventos ou filas
            sleep($waitTime); // Aqui usamos sleep para simular o tempo de espera
        }

        // Resetar o contador de requisições e o timestamp
        $this->requestCount = 0;
        $this->startTime = Carbon::now(); // Inicia o timestamp novamente

    }
}
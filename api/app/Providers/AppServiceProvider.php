<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\LeadsRepositoryInterface;
use App\Repositories\LeadsRepository;

use App\Interfaces\AssistenciasRepositoryInterface;
use App\Repositories\AssistenciasRepository;
use App\Interfaces\AtendimentosRepositoryInterface;
use App\Repositories\AtendimentosRepository;
use App\Interfaces\CamposAdicionaisRepositoryInterface;
use App\Repositories\CamposAdicionaisRepository;
use App\Interfaces\ClientesRepositoryInterface;
use App\Repositories\ClientesRepository;
use App\Interfaces\ComissoesRepositoryInterface;
use App\Repositories\ComissoesRepository;
use App\Interfaces\CorretoresRepositoryInterface;
use App\Repositories\CorretoresRepository;
use App\Interfaces\DistratosRepositoryInterface;
use App\Repositories\DistratosRepository;
use App\Interfaces\ImobiliariasRepositoryInterface;
use App\Repositories\ImobiliariasRepository;
use App\Interfaces\LeadsConversoesRepositoryInterface;
use App\Repositories\LeadsConversoesRepository;
use App\Interfaces\LeadsHistoricoSituacoesRepositoryInterface;
use App\Repositories\LeadsHistoricoSituacoesRepository;
use App\Interfaces\LeadsInteracoesRepositoryInterface;
use App\Repositories\LeadsInteracoesRepository;
use App\Interfaces\LeadsTarefasRepositoryInterface;
use App\Repositories\LeadsTarefasRepository;
use App\Interfaces\LeadsVisitaRepositoryInterface;
use App\Repositories\LeadsVisitaRepository;
use App\Interfaces\PessoasRepositoryInterface;
use App\Repositories\PessoasRepository;
use App\Interfaces\PreCadastroRepositoryInterface;
use App\Repositories\PreCadastroRepository;
use App\Interfaces\RepasseRepositoryInterface;
use App\Repositories\RepasseRepository;
use App\Interfaces\ReservaRepositoryInterface;
use App\Repositories\ReservaRepository;
use App\Interfaces\ReservasFlagsRepositoryInterface;
use App\Repositories\ReservasFlagsRepository;
use App\Interfaces\UnidadesRepositoryInterface;
use App\Repositories\UnidadesRepository;
use App\Interfaces\VendasRepositoryInterface;
use App\Repositories\VendasRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AssistenciasRepositoryInterface::class, AssistenciasRepository::class);
        $this->app->bind(AtendimentosRepositoryInterface::class, AtendimentosRepository::class);
        $this->app->bind(CamposAdicionaisRepositoryInterface::class, CamposAdicionaisRepository::class);
        $this->app->bind(ClientesRepositoryInterface::class, ClientesRepository::class);
        $this->app->bind(ComissoesRepositoryInterface::class, ComissoesRepository::class);
        $this->app->bind(CorretoresRepositoryInterface::class, CorretoresRepository::class);
        $this->app->bind(DistratosRepositoryInterface::class, DistratosRepository::class);
        $this->app->bind(ImobiliariasRepositoryInterface::class, ImobiliariasRepository::class);
        $this->app->bind(LeadsConversoesRepositoryInterface::class, LeadsConversoesRepository::class);
        $this->app->bind(LeadsHistoricoSituacoesRepositoryInterface::class, LeadsHistoricoSituacoesRepository::class);
        $this->app->bind(LeadsInteracoesRepositoryInterface::class, LeadsInteracoesRepository::class);
        $this->app->bind(LeadsRepositoryInterface::class, LeadsRepository::class);
        $this->app->bind(LeadsTarefasRepositoryInterface::class, LeadsTarefasRepository::class);
        $this->app->bind(LeadsVisitaRepositoryInterface::class, LeadsVisitaRepository::class);
        $this->app->bind(PessoasRepositoryInterface::class, PessoasRepository::class);
        $this->app->bind(PreCadastroRepositoryInterface::class, PreCadastroRepository::class);
        $this->app->bind(RepasseRepositoryInterface::class, RepasseRepository::class);
        $this->app->bind(ReservaRepositoryInterface::class, ReservaRepository::class);
        $this->app->bind(ReservasFlagsRepositoryInterface::class, ReservasFlagsRepository::class);
        $this->app->bind(UnidadesRepositoryInterface::class, UnidadesRepository::class);
        $this->app->bind(VendasRepositoryInterface::class, VendasRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

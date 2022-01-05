<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class EvaluacionDesempenoDashboard extends Component
{
    use WithPagination;

    public $search,$resultados,$empresa;
    public $evaDesColaborador;
    
    public $buscarOcultar = true;

    public $abriModal = false;
    
    public function render()
    {
        return view('livewire.evaluacion-desempeno-dashboard',['resultados2'=>$this->buscar($this->search)]);
    }


    public function updatingSearch()
    {
        $this->reset(['search']);
        $this->resetPage();
    }

    public function buscar($busca)
    {

        if ($this->empresa == "" || $this->empresa == null) {
            return [];
        }elseif ($this->empresa == 0) {
            
            if ($busca == null) {
                return [];
            }else{

                $int = (int) filter_var($busca,FILTER_SANITIZE_NUMBER_INT);

                if ($int == 0) {
                    return DB::table('infocolaborador')
                    ->where('nombre_completo','LIKE','%'.$busca.'%')
                    ->paginate(5);
                }else{
                    return DB::table('infocolaborador')
                    ->where('no_colaborador','LIKE','%'.$busca.'%')
                    ->where('tipo_colaborador',2)
                    ->paginate(5);
                }

            }
        }elseif($this->empresa == 1){
            if ($busca == null) {
                return [];
            }else{

                $int = (int) filter_var($busca,FILTER_SANITIZE_NUMBER_INT);

                if ($int == 0) {
                    
                    if (strpos($busca, " ")) {

                        $busca = explode(' ',$busca);

                        return DB::table('colaborador_sapi_spv3')
                        ->where('nombre','LIKE','%'.$busca[0].'%')
                        ->orWhere('ap_paterno','LIKE', '%'.$busca[1].'%')
                        ->where('tipo_colaborador',2)
                        ->paginate(5);
                        
                    }else{
                        return DB::table('colaborador_sapi_spv3')
                        ->where('nombre','LIKE','%'.$busca.'%')
                        ->where('tipo_colaborador',2)
                        ->paginate(5);
                    }

                }else{
                    return DB::table('colaborador_sapi_spv3')
                    ->where('no_colaborador','LIKE','%'.$busca.'%')
                    ->where('tipo_colaborador',2)
                    ->paginate(5);
                }

            }
        }
    }

    public function abrirModalInfo($valor,$no_colaborador)
    {
        $this->reset(['evaDesColaborador']);

        if($valor == 0){
            $this->abriModal = true;
            $this->buscarOcultar = false;
            $this->evaDesColaborador = $no_colaborador;
        }elseif($valor == 1 && $no_colaborador == 0) {
            $this->abriModal = false;
            $this->buscarOcultar = true;
            $this->evaDesColaborador = '';
        }
    }


}

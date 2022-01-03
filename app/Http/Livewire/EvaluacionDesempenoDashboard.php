<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class EvaluacionDesempenoDashboard extends Component
{
    use WithPagination;

    public $search,$resultados;
    public $evaDesColaborador;
    
    public $buscarOcultar = true;

    public $abriModal = false;
    
    public function render()
    {
        return view('livewire.evaluacion-desempeno-dashboard',['resultados2'=>$this->buscar($this->search)]);
    }


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function buscar($busca)
    {

        if ($busca == null) {
            return [];
        }else{

            $int = (int) filter_var($busca,FILTER_SANITIZE_NUMBER_INT);

            dd($int);

            /* select('SELECT * FROM colaborador WHERE CONCAT(nombre_1,nombre_2,ap_paterno,ap_materno) LIKE "%'.$busca.'%"') */
            $busca = DB::table('colaborador')
                ->orWhere('no_colaborador','LIKE','%'.$busca.'%')
                
                /* ->where('concat(no_colaborador,nombre_1,nombre_2,ap_paterno,ap_materno)', 'LIKE', '"%'.$busca.'%"') */
                ->paginate(5);

            if ($busca == []) {
                $busca = DB::table('colaborador_sapi_spv3')->where('no_colaborador',$busca)->get();
            }else{
                $busca = $busca;
            }

            return $busca;

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

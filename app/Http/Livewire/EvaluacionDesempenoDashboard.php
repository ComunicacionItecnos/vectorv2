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
        $this->resetPage();
    }

    public function buscar($busca)
    {

        if ($this->empresa == 0) {
            return [];
        }elseif ($this->empresa == 1) {
            # code...
        }

        if ($busca == null) {
            return [];
        }else{

            $int = (int) filter_var($busca,FILTER_SANITIZE_NUMBER_INT);

            if ($int == 0) {
                
                if (strpos($busca, " ")) {

                    $busca = explode(' ',$busca);

                    return dd(DB::table('colaborador')
                    ->where('nombre_1','LIKE','%'.$busca[0].'%')
                    ->where('ap_paterno','LIKE', '%'.$busca[1].'%')
                    ->paginate(5));
                    
                }else{
                    return DB::table('colaborador')
                    ->where('nombre_1','LIKE','%'.$busca.'%')
                    ->paginate(5);
                }

            }else{
                return DB::table('colaborador')
                ->where('no_colaborador','LIKE','%'.$busca.'%')
                ->paginate(5);
            }

            /* if ($busca == []) {
                $busca = DB::table('colaborador_sapi_spv3')->where('no_colaborador',$busca)->get();
            }else{
                $busca = $busca;
            }

            return $busca; */

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

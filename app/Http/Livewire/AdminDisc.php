<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class AdminDisc extends Component
{
    use WithPagination;
    
    protected $queryString = [
        'search' => ['except' => '']
    ];
    public $search;
    public $candidatoshow = false,$colaboradorShow = false;

    public $candidato, $colaborador;

    public function render()
    {

        if ( auth()->user()->role_id == 5 ) {

            return view('livewire.Admin-disc'
                ,['resultados'=> DB::table('disc_view_candidato')
                ->where('nombre_completo','LIKE','%'.$this->search.'%')
                ->orWhere('personalidad','LIKE','%'.$this->search.'%')
                ->orWhere('created_at','LIKE','%'.$this->search.'%')
                ->paginate(5)]);

        } else {

            $contador = DB::table('disc_view_colaborador')->get();
            
            return view('livewire.Admin-disc'
                ,['resultados'=> DB::table('disc_view_colaborador')
                ->where('nombre_completo','LIKE','%'.$this->search.'%')
                ->orWhere('personalidad','LIKE','%'.$this->search.'%')
                ->orWhere('created_at','LIKE','%'.$this->search.'%')
                ->paginate(5), 'contador'=>count($contador)]);

        }

    }

    public function updatingSearch()
    {
        $this->reset(['search']);
        $this->resetPage();
    }

}

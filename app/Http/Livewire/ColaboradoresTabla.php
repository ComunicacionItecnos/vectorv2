<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class ColaboradoresTabla extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];

    public $search, $perPage = '5';
    public $no_colaborador;

    public $sortBy = 'no_colaborador';
    public $sortAsc = true;

    // ? No eliminar esta variable $j_f ya que sirve para traer el nombre del jefe directo en la vista de seguridad patrimonial
    public $j_f;

    public function render()
    {
        if (auth()->user()->role_id == 9 && auth()->user()->colaborador_no_colaborador == 110899) {
            return view('livewire.colaboradores-tabla', [
                'colaboradores' => DB::table('unriflecolaborador')
                    ->where('no_colaborador', 'LIKE', "%{$this->search}%")
                    ->orWhere('nombre_completo', 'LIKE', "%{$this->search}%")
                    ->orWhere('puesto', 'LIKE', "%{$this->search}%")
                    ->orWhere('area', 'LIKE', "%{$this->search}%")
                    ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
                    ->paginate($this->perPage)
            ]);
        } elseif (auth()->user()->role_id == 9 && auth()->user()->colaborador_no_colaborador == 102050) {
            return view('livewire.colaboradores-tabla', [
                'colaboradores' => DB::table('unpistolacolaborador')
                    ->where('no_colaborador', 'LIKE', "%{$this->search}%")
                    ->orWhere('nombre_completo', 'LIKE', "%{$this->search}%")
                    ->orWhere('puesto', 'LIKE', "%{$this->search}%")
                    ->orWhere('area', 'LIKE', "%{$this->search}%")
                    ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
                    ->paginate($this->perPage)
            ]);
        } elseif (auth()->user()->role_id == 9 && auth()->user()->colaborador_no_colaborador == 137355) {
            return view('livewire.colaboradores-tabla', [
                'colaboradores' => DB::table('unmisccolaborador')
                    ->where('no_colaborador', 'LIKE', "%{$this->search}%")
                    ->orWhere('nombre_completo', 'LIKE', "%{$this->search}%")
                    ->orWhere('puesto', 'LIKE', "%{$this->search}%")
                    ->orWhere('area', 'LIKE', "%{$this->search}%")
                    ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
                    ->paginate($this->perPage)
            ]);
        } elseif (auth()->user()->role_id == 9 && auth()->user()->colaborador_no_colaborador == 135870) {
            return view('livewire.colaboradores-tabla', [
                'colaboradores' => DB::table('unl22colaborador')
                    ->where('no_colaborador', 'LIKE', "%{$this->search}%")
                    ->orWhere('nombre_completo', 'LIKE', "%{$this->search}%")
                    ->orWhere('puesto', 'LIKE', "%{$this->search}%")
                    ->orWhere('area', 'LIKE', "%{$this->search}%")
                    ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
                    ->paginate($this->perPage)
            ]);
        } else {
            return view('livewire.colaboradores-tabla', [
                'colaboradores' => DB::table('infocolaborador')->where('no_colaborador', 'LIKE', "%{$this->search}%")
                    ->orWhere('nombre_completo', 'LIKE', "%{$this->search}%")
                    ->orWhere('puesto', 'LIKE', "%{$this->search}%")
                    ->orWhere('area', 'LIKE', "%{$this->search}%")
                    ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
                    ->paginate($this->perPage)
            ]);
        }
    }

    public function sortBy($field)
    {
        if ($field == $this->sortBy) {
            $this->sortAsc = !$this->sortAsc;
        }
        $this->sortBy = $field;
    }

    public function baja($no_colaborador)
    {
        DB::transaction(function () use ($no_colaborador) {


            DB::table('colaborador')->where('no_colaborador', $no_colaborador)
                ->update([
                    'estado_colaborador' => 0
                ]);
        });

        $this->flash('success', 'Dado de baja correctamente', [
            'position' =>  'top-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false,
        ]);

        return redirect()->route("dashboard");
    }

    public function alta($no_colaborador)
    {
        DB::transaction(function () use ($no_colaborador) {
            DB::table('colaborador')->where('no_colaborador', $no_colaborador)
                ->update([
                    'estado_colaborador' => 1
                ]);
        });

        $this->flash('success', 'Dado de alta correctamente', [
            'position' =>  'top-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false,
        ]);

        return redirect()->route("dashboard");
    }
}

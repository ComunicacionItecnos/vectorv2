<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use App\Exports\DirectorioExport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class Directorio extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];

    public $search, $perPage = '5';
    public $no_colaborador;

    public $sortBy = 'area';
    public $sortAsc = true;
    public $directorio;

    public function render()
    {
        return view(
            'livewire.directorio',
            [
                'colaboradores' => DB::table('directorio')->where('nombre', 'LIKE', "%{$this->search}%")
                    ->orWhere('puesto', 'LIKE', "%{$this->search}%")
                    ->orWhere('area', 'LIKE', "%{$this->search}%")
                    ->orWhere('correo', 'LIKE', "%{$this->search}%")
                    ->orWhere('extension', 'LIKE', "%{$this->search}%")
                    ->orWhere('clave', 'LIKE', "%{$this->search}%")
                    ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
                    ->paginate($this->perPage)
            ]
        );
    }
    public function sortBy($field)
    {
        if ($field == $this->sortBy) {
            $this->sortAsc = !$this->sortAsc;
        }
        $this->sortBy = $field;
    }

    public function export()
    {
        $this->fecha_actual = Carbon::now();
        $this->directorio = DB::table('directorio')->get();
        return Excel::download(new DirectorioExport($this->directorio), 'Directorio-Aguila(' . $this->fecha_actual . ').xlsx');
    }

}

<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

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
    public $j_f;

    public function render()
    {
        return view(
            'livewire.directorio',
            [
                'colaboradores' => DB::table('directorio')->where('nombre', 'LIKE', "%{$this->search}%")
                    ->orWhere('puesto', 'LIKE', "%{$this->search}%")
                    ->orWhere('area', 'LIKE', "%{$this->search}%")
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

}

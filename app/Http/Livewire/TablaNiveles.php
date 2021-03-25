<?php

namespace App\Http\Livewire;

use App\Models\Nivel;
use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class TablaNiveles extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];

    public $search, $perPage = '5';
    public $nivel_id;
    public $nombre_nivel;

    public $sortBy = 'id';
    public $sortAsc = true;

    protected $rules = [
        'nombre_nivel' => 'required|max:100',
    ];

    protected $messages = [
        'nombre_nivel.required' => 'Este campo no puede estar vacío',
        'nombre_nivel.max' => 'Este campo no puede exceder los 100 caracteres'
    ];

    public $confirmNivelAdd = false;
    public $confirmNivelEdit = false;

    protected $listeners = [
        'eliminar',
        'cancelled',
    ];

    public function cancelled()
    {
        $this->alert('error', 'Se canceló la eliminación', [
            'position' =>  'top-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false,
        ]);
    }

    public function triggerConfirm($nivel_id)
    {
        $this->nivel_id = $nivel_id;

        $this->confirm('¿Quieres eliminar este nivel?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' =>  'Si',
            'cancelButtonText' => 'No',
            'onConfirmed' => 'eliminar',
            'onCancelled' => 'cancelled'
        ]);
    }
    public function eliminar()
    {
        Nivel::destroy($this->nivel_id);

        $this->flash('success', 'Eliminado correctamente', [
            'position' =>  'top-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false,
        ]);

        return redirect()->route("tabla-niveles");
    }

    public function render()
    {
        return view('livewire.tabla-niveles', [
            'niveles' => DB::table('nivel')->where('nombre_nivel', 'LIKE', "%{$this->search}%")
                ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
                ->paginate($this->perPage),
        ]);
    }

    public function registrar()
    {
        $this->validate();

        try {
            Nivel::updateOrInsert([
                'nombre_nivel' => $this->nombre_nivel
            ]);

            $this->flash('success', $this->nombre_nivel . ' fue registrado correctamente', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);

            $this->nombre_nivel = null;

            return redirect()->route("tabla-niveles");
        } catch (Exception $ex) {
            $this->alert('error', 'Ha ocurrido un error', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);
        }
    }

    public function confirmNivelEdit($nivel_id)
    {
        $area = Nivel::find($nivel_id);

        $this->nivel_id = $area->id;
        $this->nombre_nivel = $area->nombre_nivel;

        $this->confirmNivelEdit = true;
    }

    public function guardar()
    {

        $this->validate();

        try {
            Nivel::where('id', $this->nivel_id)
                ->update([
                    'nombre_nivel' => $this->nombre_nivel,
                ]);

            $this->flash('success', 'Actualizado correctamente', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);

            $this->nivel_id = null;
            $this->nombre_nivel = null;

            return redirect()->route("tabla-niveles");
            
        } catch (Exception $ex) {
            $this->flash('error', 'Ha ocurrido un error!!', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);
        }
    }

    public function setNull(){
        $this->confirmNivelAdd = false;
        $this->confirmNivelEdit = false;
        $this->nombre_nivel = '';
    }

    public function sortBy($field)
    {
        if ($field == $this->sortBy) {
            $this->sortAsc = !$this->sortAsc;
        }
        $this->sortBy = $field;
    }

    public function confirmNivelAdd()
    {
        $this->confirmNivelAdd = true;
    }
}

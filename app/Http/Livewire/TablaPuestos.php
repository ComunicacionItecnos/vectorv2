<?php

namespace App\Http\Livewire;

use App\Models\Nivel;
use App\Models\Puesto;
use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class TablaPuestos extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];

    public $search, $perPage = '5';

    public $puesto_id;
    public $nivel_id;
    public $especialidad_puesto;

    public $sortBy = 'id';
    public $sortAsc = true;

    protected $rules = [
        'nivel_id' => 'required',
        'especialidad_puesto' => 'required|max:100',
    ];

    protected $messages = [
        'nivel_id.required' => 'Este campo no puede estar vacío',
        'especialidad_puesto.required' => 'Este campo no puede estar vacío',
        'especialidad_puesto.max' => 'Este campo no puede exceder los 100 caracteres'
    ];

    public $confirmPuestoAdd = false;
    public $confirmPuestoEdit = false;

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

    public function triggerConfirm($puesto_id)
    {
        $this->puesto_id = $puesto_id;

        $this->confirm('¿Quieres eliminar este puesto?', [
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
        Puesto::destroy($this->puesto_id);

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

        return redirect()->route("tabla-puestos");
    }

    public function render()
    {

        return view('livewire.tabla-puestos', [
            'puestos' => Puesto::join('nivel', 'nivel.id', 'puesto.nivel_id')
            ->select('puesto.id', 'puesto.especialidad_puesto', 'nivel.id AS nivel_id', 'nivel.nombre_nivel')
            ->where('nombre_nivel' , 'LIKE', "%{$this->search}%")
            ->OrWhere('especialidad_puesto' , 'LIKE', "%{$this->search}%")
            ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate($this->perPage),

            'niveles' => Nivel::All(),
        ]);
    }

    public function registrar()
    {
        $this->validate();

        try {
            Puesto::updateOrInsert([
                'nivel_id' => $this->nivel_id,
                'especialidad_puesto' => $this->especialidad_puesto
            ]);

            $this->flash('success', $this->especialidad_puesto . ' fue registrado correctamente', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);

            $this->especialidad_puesto = null;

            return redirect()->route("tabla-puestos");
        } catch (Exception $ex) {
            dd($ex);
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

    public function confirmPuestoEdit($puesto_id)
    {
        $puesto = Puesto::find($puesto_id);

        $this->puesto_id = $puesto->id;
        $this->nivel_id = $puesto->nivel_id;
        $this->especialidad_puesto = $puesto->especialidad_puesto;

        $this->confirmPuestoEdit = true;
    }

    public function guardar()
    {

        $this->validate();

        try {
            Puesto::where('id', $this->puesto_id)
                ->update([
                    'nivel_id' => $this->nivel_id,
                    'especialidad_puesto' => $this->especialidad_puesto,
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

            $this->puesto_id = null;
            $this->nivel_id = null;
            $this->especialidad_puesto = null;

            return redirect()->route("tabla-puestos");
            
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
        $this->confirmPuestoAdd = false;
        $this->confirmPuestoEdit = false;
        $this->nivel_id = null;
        $this->especialidad_puesto = '';
    }

    public function sortBy($field)
    {
        if ($field == $this->sortBy) {
            $this->sortAsc = !$this->sortAsc;
        }
        $this->sortBy = $field;
    }

    public function confirmPuestoAdd()
    {
        $this->confirmPuestoAdd = true;
    }
}

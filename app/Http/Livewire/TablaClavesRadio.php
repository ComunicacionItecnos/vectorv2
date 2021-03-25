<?php

namespace App\Http\Livewire;

use App\Models\Area;
use App\Models\Clave_radio;
use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class TablaClavesRadio extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];

    public $search, $perPage = '5';

    public $claveRadio_id;
    public $nombreClaveRadio;
    public $compartida;
    public $disponibilidad;

    public $sortBy = 'id';
    public $sortAsc = true;

    protected $rules = [
        'nombreClaveRadio' => 'required|max:50',
        'compartida' => 'required',
        'disponibilidad' => 'required',
    ];

    protected $messages = [
        'nombreClaveRadio.required' => 'Este campo no puede estar vacío',
        'nombreClaveRadio.max' => 'Este campo no puede exceder los 50 caracteres',
        'compartida.required' => 'Este campo no puede estar vacío',
        'disponibilidad.required' => 'Este campo no puede estar vacío',
    ];

    public $confirmClaveRadioAdd = false;
    public $confirmClaveRadioEdit = false;

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

    public function triggerConfirm($claveRadio_id)
    {
        $this->claveRadio_id = $claveRadio_id;

        $this->confirm('¿Quieres eliminar esta Clave?', [
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
        Clave_radio::destroy($this->claveRadio_id);

        $this->flash('success', 'Eliminada correctamente', [
            'position' =>  'top-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false,
        ]);

        return redirect()->route("tabla-claves-radio");
    }

    public function render()
    {
        return view('livewire.tabla-claves-radio', [
            'clavesRadio' => DB::table('clave_radio')->where('clave', 'LIKE', "%{$this->search}%")
                ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
                ->paginate($this->perPage),
        ]);
    }

    public function registrar()
    {
        $this->validate();

        try {
            Clave_radio::updateOrInsert([
                'clave' => $this->nombreClaveRadio,
                'compartida' => $this->compartida,
                'disponibilidad' => $this->disponibilidad,
            ]);

            $this->flash('success', 'La clave: ' . $this->nombreClaveRadio . ' fue registrada correctamente', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);

            $this->nombreClaveRadio = null;
            $this->compartida = null;
            $this->disponibilidad = null;

            return redirect()->route("tabla-claves-radio");
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

    public function confirmClaveRadioEdit($claveRadio_id)
    {
        $claveRadio = Clave_radio::find($claveRadio_id);

        $this->claveRadio_id = $claveRadio->id;
        $this->nombreClaveRadio = $claveRadio->clave;
        $this->compartida = $claveRadio->compartida;
        $this->disponibilidad = $claveRadio->disponibilidad;

        $this->confirmClaveRadioEdit = true;
    }

    public function guardar()
    {

        $this->validate();

        try {
            Clave_radio::where('id', $this->claveRadio_id)
                ->update([
                    'clave' => $this->nombreClaveRadio,
                    'compartida' => $this->compartida,
                    'disponibilidad' => $this->disponibilidad,
                ]);

            $this->flash('success', 'Actualizada correctamente', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);

            $this->claveRadio_id = null;
            $this->nombreClaveRadio = null;
            $this->compartida = null;
            $this->disponibilidad = null;

            return redirect()->route("tabla-claves-radio");
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

    public function sortBy($field)
    {
        if ($field == $this->sortBy) {
            $this->sortAsc = !$this->sortAsc;
        }
        $this->sortBy = $field;
    }

    public function confirmClaveRadioAdd()
    {
        $this->confirmClaveRadioAdd = true;
    }
}

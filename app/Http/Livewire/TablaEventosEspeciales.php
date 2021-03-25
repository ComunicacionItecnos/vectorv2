<?php

namespace App\Http\Livewire;

use App\Models\Eventos_especiales;
use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class TablaEventosEspeciales extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];

    public $search, $perPage = '5';
    public $evento_id;
    public $nombre_evento;

    public $sortBy = 'id';
    public $sortAsc = true;

    protected $rules = [
        'nombre_evento' => 'required|max:50',
    ];

    protected $messages = [
        'nombre_evento.required' => 'Este campo no puede estar vacío',
        'nombre_evento.max' => 'Este campo no puede exceder los 50 caracteres'
    ];

    public $confirmEventoAdd = false;
    public $confirmEventoEdit = false;

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

    public function triggerConfirm($evento_id)
    {
        $this->evento_id = $evento_id;

        $this->confirm('¿Quieres eliminar este evento?', [
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
        Eventos_especiales::destroy($this->evento_id);

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

        return redirect()->route("tabla-eventos-especiales");
    }

    public function render()
    {
        return view('livewire.tabla-eventos-especiales', [
            'eventos' => DB::table('eventos_especiales')->where('nombre_evento', 'LIKE', "%{$this->search}%")
                ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
                ->paginate($this->perPage),
        ]);
    }

    public function registrar()
    {
        $this->validate();

        try {
            Eventos_especiales::updateOrInsert([
                'nombre_evento' => $this->nombre_evento
            ]);

            $this->flash('success', $this->nombre_evento . ' fue registrada correctamente', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);

            $this->nombre_evento = null;

            return redirect()->route("tabla-eventos-especiales");
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

    public function confirmEventoEdit($evento_id)
    {
        $evento = Eventos_especiales::find($evento_id);

        $this->evento_id = $evento->id;
        $this->nombre_evento = $evento->nombre_evento;

        $this->confirmEventoEdit = true;
    }

    public function guardar()
    {

        $this->validate();

        try {
            Eventos_especiales::where('id', $this->evento_id)
                ->update([
                    'nombre_evento' => $this->nombre_evento,
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

            $this->evento_id = null;
            $this->nombre_evento = null;

            return redirect()->route("tabla-eventos-especiales");
            
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

    public function confirmEventoAdd()
    {
        $this->confirmEventoAdd = true;
    }
}

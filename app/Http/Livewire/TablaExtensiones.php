<?php

namespace App\Http\Livewire;

use App\Models\Extension;
use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class TablaExtensiones extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];

    public $search, $perPage = '5';
    public $extension_id;
    public $numero_extension;

    public $sortBy = 'id';
    public $sortAsc = true;

    protected $rules = [
        'numero_extension' => 'required|max:7',
    ];

    protected $messages = [
        'numero_extension.required' => 'Este campo no puede estar vacío',
        'numero_extension.max' => 'Este campo no puede exceder los 7 caracteres'
    ];

    public $confirmExtensionAdd = false;
    public $confirmExtensionEdit = false;

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

    public function triggerConfirm($extension_id)
    {
        $this->extension_id = $extension_id;

        $this->confirm('¿Quieres eliminar esta extensión?', [
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
        Extension::destroy($this->extension_id);

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

        return redirect()->route("tabla-extensiones");
    }

    public function render()
    {
        return view('livewire.tabla-extensiones', [
            'extensiones' => DB::table('extension')->where('numero_extension', 'LIKE', "%{$this->search}%")
                ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
                ->paginate($this->perPage),
        ]);
    }

    public function registrar()
    {
        $this->validate();

        try {
            Extension::updateOrInsert([
                'numero_extension' => $this->numero_extension
            ]);

            $this->flash('success', $this->numero_extension . ' fue registrada correctamente', [
                'position' =>  'top-end',
                'timer' =>  3000,
                'toast' =>  true,
                'text' =>  '',
                'confirmButtonText' =>  'Ok',
                'cancelButtonText' =>  'Cancel',
                'showCancelButton' =>  false,
                'showConfirmButton' =>  false,
            ]);

            $this->numero_extension = null;

            return redirect()->route("tabla-extensiones");
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

    public function confirmExtensionEdit($extension_id)
    {
        $extension = Extension::find($extension_id);

        $this->extension_id = $extension->id;
        $this->numero_extension = $extension->numero_extension;

        $this->confirmExtensionEdit = true;
    }

    public function guardar()
    {

        $this->validate();

        try {
            Extension::where('id', $this->extension_id)
                ->update([
                    'numero_extension' => $this->numero_extension,
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

            $this->extension_id = null;
            $this->numero_extension = null;

            return redirect()->route("tabla-extensiones");
            
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

    public function confirmExtensionAdd()
    {
        $this->confirmExtensionAdd = true;
    }
}

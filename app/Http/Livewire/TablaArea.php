<?php

namespace App\Http\Livewire;

use App\Models\Area;
use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class TablaArea extends Component
{
    use WithPagination;

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];

    public $search, $perPage = '5';
    public $area_id;
    public $nombre_area;

    public $sortBy = 'id';
    public $sortAsc = true;

    protected $rules = [
        'nombre_area' => 'required|max:50',
    ];

    protected $messages = [
        'nombre_area.required' => 'Este campo no puede estar vacío',
        'nombre_area.max' => 'Este campo no puede exceder los 50 caracteres'
    ];

    public $confirmAreaAdd = false;
    public $confirmAreaEdit = false;

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

    public function triggerConfirm($area_id)
    {
        $this->area_id = $area_id;

        $this->confirm('¿Quieres eliminar esta área?', [
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
        DB::transaction(function () {
            Area::destroy($this->area_id);
        });


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

        return redirect()->route("tabla-area");
    }

    public function render()
    {
        return view('livewire.tabla-area', [
            'areas' => DB::table('area')->where('nombre_area', 'LIKE', "%{$this->search}%")
                ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
                ->paginate($this->perPage),
        ]);
    }

    public function registrar()
    {
        $this->validate();

        try {

            DB::transaction(function () {

                $nombre_area_c = ucwords(strtolower($this->nombre_area));

                Area::updateOrInsert([
                    'nombre_area' => $nombre_area_c
                ]);

                $this->flash('success', $nombre_area_c . ' fue registrada correctamente', [
                    'position' =>  'top-end',
                    'timer' =>  3000,
                    'toast' =>  true,
                    'text' =>  '',
                    'confirmButtonText' =>  'Ok',
                    'cancelButtonText' =>  'Cancel',
                    'showCancelButton' =>  false,
                    'showConfirmButton' =>  false,
                ]);

                $this->nombre_area = null;
            });

            return redirect()->route("tabla-area");
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

    public function confirmAreaEdit($area_id)
    {
        $area = Area::find($area_id);

        $this->area_id = $area->id;
        $this->nombre_area = $area->nombre_area;

        $this->confirmAreaEdit = true;
    }

    public function guardar()
    {

        $this->validate();

        try {

            DB::transaction(function () {

                $nombre_area_c = ucwords(strtolower($this->nombre_area));

                Area::where('id', $this->area_id)
                    ->update([
                        'nombre_area' => $nombre_area_c,
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

                $this->area_id = null;
                $this->nombre_area = null;
            });

            return redirect()->route("tabla-area");
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

    public function setNull()
    {
        $this->confirmAreaAdd = false;
        $this->confirmAreaEdit = false;
        $this->nombre_area = '';
    }

    public function confirmAreaAdd()
    {
        $this->confirmAreaAdd = true;
    }
}

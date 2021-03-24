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
    public $bandera_boton = 0;

    public function render()
    {
        return view('livewire.tabla-area',[
            'areas' => DB::table('area')->where('nombre_area', 'LIKE', "%{$this->search}%")
            ->paginate($this->perPage),
        ]);
    }

    public function registrar(){
        try{
            Area::updateOrInsert([
                'nombre_area' => $this->nombre_area
            ]);

            $this->flash('success', $this->nombre_area . ' fue registrado(a) correctamente', [
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
        catch(Exception $ex){
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

    public function editar($area_id){
       $area = Area::find($area_id);

        $this->area_id = $area->id;
        $this->nombre_area = $area->nombre_area;
        $this->bandera_boton = 1;

    }

    public function guardar(){

        Area::where('id', $this->area_id)
        ->update([
            'nombre_area' => $this->nombre_area,
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

        return redirect()->route("tabla-area");
    }

    public function eliminar($area_id){
        Area::destroy($area_id);
        
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
}

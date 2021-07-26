<?php

namespace App\Http\Livewire;

use App\Models\Colaborador;
use App\Models\utilesEscolares as ModelsUtilesEscolares;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UtilesEscolares extends Component
{

    public $colaborador, $utiles;
    public $escolaridad_id1, $escolaridad_id2, $escolaridad;
    public $no_kits;

    public $popupRegistro = false;

    public function mount($no_colaborador)
    {
        $this->colaborador = Colaborador::find($no_colaborador);
        $this->utiles = DB::table('utiles_escolares')->where('colaborador_no_colaborador', $this->colaborador->no_colaborador)->get();
    }

    public function render()
    {
        $this->escolaridad = DB::select('SELECT * FROM escolaridad WHERE escolaridad.id=2 || escolaridad.id=3');
        return view('livewire.utiles-escolares')->layout('layouts.guest');
    }

    public function triggerConfirm()
    {
        if ($this->no_kits == '' || empty($this->no_kits)) {
            $validateData = $this->validate(
                [
                    'no_kits' => 'required'
                ],
                [
                    'no_kits.required' => 'Este campo no puede permanecer vacio'
                ]
            );
        }

        // ? Insert para un kit

        if ($this->no_kits == 1) {
            $validateData = $this->validate(
                [
                    'escolaridad_id1' => 'required'
                ],
                [
                    'escolaridad_id1.required' => 'Este campo no puede permanecer vacio',
                ]
            );

            $comprobar = ModelsUtilesEscolares::create([
                'colaborador_no_colaborador' => $this->colaborador->no_colaborador,
                'escolaridad_id' => $validateData['escolaridad_id1'],
            ]);

            if ($comprobar) {
                $this->no_kits = '';
                $this->escolaridad_id1 = '';
                if (count($this->utiles) >= 0 || count($this->utiles) <= 1) {
                    return redirect()->to('/utiles-escolares/' . $this->colaborador->no_colaborador);
                }
            }
        }

        // ? Insert para dos kits

        if ($this->no_kits == 2) {
            $validateData = $this->validate(
                [
                    'escolaridad_id1' => 'required',
                    'escolaridad_id2' => 'required'
                ],
                [
                    'escolaridad_id1.required' => 'Este campo no puede permanecer vacio',
                    'escolaridad_id2.required' => 'Este campo no puede permanecer vacio'
                ]
            );

            $comprobar = ModelsUtilesEscolares::upsert(
                [
                    [
                        'colaborador_no_colaborador' => $this->colaborador->no_colaborador,
                        'escolaridad_id' => $validateData['escolaridad_id1']
                    ],
                    [
                        'colaborador_no_colaborador' => $this->colaborador->no_colaborador,
                        'escolaridad_id' => $validateData['escolaridad_id2']
                    ]
                ],
                ['colaborador_no_colaborador', 'escolaridad_id']
            );

            if ($comprobar) {
                $this->no_kits = '';
                $this->escolaridad_id1 = '';
                $this->escolaridad_id2 = '';

                return redirect()->to('/utiles-escolares/' . $this->colaborador->no_colaborador);
            }
        }
    }

    public function setNull()
    {
        $this->popupRegistro = false;
    }

    public function setTrue()
    {
        $this->popupRegistro = true;
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Colaborador;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UtilesEscolares extends Component
{

    public $no_colaborador,$utiles;
    public $escolaridad_id1,$escolaridad_id2,$escolaridad;
    public $no_kits;

    public function mount($no_colaborador){
        $this->no_colaborador= Colaborador::find($no_colaborador);
        $this->utiles = DB::select('SELECT colaborador_no_colaborador FROM utiles_escolares WHERE colaborador_no_colaborador ='.$this->no_colaborador->no_colaborador);
    }

    public function render(){
        $this->escolaridad= DB::select('SELECT * FROM escolaridad WHERE escolaridad.id=2 || escolaridad.id=3');
        return view('livewire.utiles-escolares')->layout('layouts.guest');
    }

    public function triggerConfirm(){ 
        if ($this->no_kits=='' || empty($this->no_kits)) {
            $validateData= $this->validate(
                [
                    'no_kits'=>'required'
                ],
                [
                    'no_kits.required'=>'Este campo no puede permanecer vacio'
                ]
            );
        }

        if ($this->no_kits == 1) {
            $validateData= $this->validate(
                [
                    'escolaridad_id1'=>'required'
                ],
                [
                    'escolaridad_id1.required'=>'Este campo no puede permanecer vacio',
                ]
            );

            $comprobar=DB::table('utiles_escolares')->insert([
                'colaborador_no_colaborador'=>$this->no_colaborador->no_colaborador,
                'escolaridad_id'=>$validateData['escolaridad_id1']
            ]);
            if ($comprobar) {
                $this->no_kits='';
                $this->escolaridad_id1='';
                if (count($this->utiles) >=0 || count($this->utiles) <=1 ) {
                    return redirect()->to('/utiles-escolares/'.$this->no_colaborador->no_colaborador);
                }
            }
        }

        if ($this->no_kits ==2 ) {        
            $validateData= $this->validate(
                [
                    'escolaridad_id1'=>'required',
                    'escolaridad_id2'=>'required'
                ],
                [
                    'escolaridad_id1.required'=>'Este campo no puede permanecer vacio',
                    'escolaridad_id2.required'=>'Este campo no puede permanecer vacio'
                ]
            );
            
            $comprobar=DB::table('utiles_escolares')->insert([
                [ 'colaborador_no_colaborador'=>$this->no_colaborador->no_colaborador, 'escolaridad_id'=>$validateData['escolaridad_id1'] ],
                [ 'colaborador_no_colaborador'=>$this->no_colaborador->no_colaborador, 'escolaridad_id'=>$validateData['escolaridad_id2'] ],
            ]);

            if ($comprobar) {
                // dd('Se inserto');
                $this->no_kits='';
                $this->escolaridad_id1='';
                $this->escolaridad_id2='';
                
                return redirect()->to('/utiles-escolares/'.$this->no_colaborador->no_colaborador);
            }
        } 

    }

}
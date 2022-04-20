<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Colaborador;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class DiaNinoRegistro extends Component
{
    use LivewireAlert;

    public $colaborador,$no_colaborador,$dianinoRegistro;
    public $no_kids,$conteoRegistros,$kidsValor1,$kidsValor2,$kidsValor3,$kidsValor4,$kidsValor5;
    public $banderaCupo,$bandera,$popupRegistro;

    protected $listeners = [
        'registro',
        'cancelled',
    ];

    public function cancelled()
    {
        $this->alert('info', 'Se canceló el registro', [
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

    public function triggerConfirm()
    {
        $this->confirm('¿Quieres terminar tu registro?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' =>  'Si',
            'cancelButtonText' => 'No',
            'onConfirmed' => 'registro',
            'onCancelled' => 'cancelled'
        ]);
    }


    public function mount($no_colaborador)
    {
        $this->revisarCupo();
        $this->no_colaborador = $no_colaborador;
        $this->colaborador = Colaborador::find($no_colaborador);
        $this->dianinoRegistro = DB::table('dianinoregistro')->where('colaborador_no_colaborador', $this->colaborador->no_colaborador)->get();
    }

    public function render()
    {
        return view('livewire.dia-nino-registro')->layout('layouts.guest');
    }

    public function revisarCupo()
    {
        $conteo = DB::table('dianinoregistro')->get()->count();
        ($conteo == 600) ? $this->banderaCupo = true : $this->banderaCupo = false;
    }

    public function setNull()
    {
        $this->popupRegistro = false;
    }

    public function setTrue()
    {
        $this->popupRegistro = true;
    }

    public function registro()
    {
        if ($this->no_kids == 1) {
            $validateData = $this->validate(
                [
                    'kidsValor1' => 'required'
                ],
                [
                    'kidsValor1.required' => 'Este campo no puede permanecer vacio',
                ]
            );

            $comprobar = DB::insert('INSERT INTO dianinoregistro(colaborador_no_colaborador,edadHijo,created_at,updated_at) values(?,?,?,?)',
            [$this->colaborador->no_colaborador,$validateData['kidsValor1'],Carbon::now(),Carbon::now()]);

            if ($comprobar) {
                $this->reset(['no_kids','kidsValor1']);

                return redirect()->to('/dia-nino/' . $this->colaborador->no_colaborador);
            }
        }

        if ($this->no_kids == 2) {
            $validateData = $this->validate(
                [
                    'kidsValor1' => 'required',
                    'kidsValor2' => 'required'
                ],
                [
                    'kidsValor1.required' => 'Este campo no puede permanecer vacio',
                    'kidsValor2.required' => 'Este campo no puede permanecer vacio',
                ]
            );

            $comprobar = DB::table('dianinoregistro')->upsert(
                [
                    [
                        'colaborador_no_colaborador'=>$this->colaborador->no_colaborador,
                        'edadHijo'=>$validateData['kidsValor1'],
                        'created_at'=>Carbon::now(),
                        'updated_at'=>Carbon::now()
                    ],
                    [
                        'colaborador_no_colaborador'=>$this->colaborador->no_colaborador,
                        'edadHijo'=>$validateData['kidsValor2'],
                        'created_at'=>Carbon::now(),
                        'updated_at'=>Carbon::now()
                    ]
                ],['colaborador_no_colaborador','edadHijo','created_at','updated_at']
            );

            if ($comprobar) {
                $this->reset(['no_kids','kidsValor1','kidsValor2']);

                return redirect()->to('/dia-nino/' . $this->colaborador->no_colaborador);
            }
        }

        if ($this->no_kids == 3) {
            $validateData = $this->validate(
                [
                    'kidsValor1' => 'required',
                    'kidsValor2' => 'required',
                    'kidsValor3' => 'required'
                ],
                [
                    'kidsValor1.required' => 'Este campo no puede permanecer vacio',
                    'kidsValor2.required' => 'Este campo no puede permanecer vacio',
                    'kidsValor3.required' => 'Este campo no puede permanecer vacio',
                ]
            );

            $comprobar = DB::table('dianinoregistro')->upsert(
                [
                    [
                        'colaborador_no_colaborador'=>$this->colaborador->no_colaborador,
                        'edadHijo'=>$validateData['kidsValor1'],
                        'created_at'=>Carbon::now(),
                        'updated_at'=>Carbon::now()
                    ],
                    [
                        'colaborador_no_colaborador'=>$this->colaborador->no_colaborador,
                        'edadHijo'=>$validateData['kidsValor2'],
                        'created_at'=>Carbon::now(),
                        'updated_at'=>Carbon::now()
                    ],
                    [
                        'colaborador_no_colaborador'=>$this->colaborador->no_colaborador,
                        'edadHijo'=>$validateData['kidsValor3'],
                        'created_at'=>Carbon::now(),
                        'updated_at'=>Carbon::now()
                    ]
                ],['colaborador_no_colaborador','edadHijo','created_at','updated_at']
            );

            if ($comprobar) {
                $this->reset(['no_kids','kidsValor1','kidsValor2','kidsValor3']);

                return redirect()->to('/dia-nino/' . $this->colaborador->no_colaborador);
            }
        }

        if ($this->no_kids == 4) {
            $validateData = $this->validate(
                [
                    'kidsValor1' => 'required',
                    'kidsValor2' => 'required',
                    'kidsValor3' => 'required',
                    'kidsValor4' => 'required'
                ],
                [
                    'kidsValor1.required' => 'Este campo no puede permanecer vacio',
                    'kidsValor2.required' => 'Este campo no puede permanecer vacio',
                    'kidsValor3.required' => 'Este campo no puede permanecer vacio',
                    'kidsValor4.required' => 'Este campo no puede permanecer vacio'
                ]
            );

            $comprobar = DB::table('dianinoregistro')->upsert(
                [
                    [
                        'colaborador_no_colaborador'=>$this->colaborador->no_colaborador,
                        'edadHijo'=>$validateData['kidsValor1'],
                        'created_at'=>Carbon::now(),
                        'updated_at'=>Carbon::now()
                    ],
                    [
                        'colaborador_no_colaborador'=>$this->colaborador->no_colaborador,
                        'edadHijo'=>$validateData['kidsValor2'],
                        'created_at'=>Carbon::now(),
                        'updated_at'=>Carbon::now()
                    ],
                    [
                        'colaborador_no_colaborador'=>$this->colaborador->no_colaborador,
                        'edadHijo'=>$validateData['kidsValor3'],
                        'created_at'=>Carbon::now(),
                        'updated_at'=>Carbon::now()
                    ],
                    [
                        'colaborador_no_colaborador'=>$this->colaborador->no_colaborador,
                        'edadHijo'=>$validateData['kidsValor4'],
                        'created_at'=>Carbon::now(),
                        'updated_at'=>Carbon::now()
                    ]
                ],['colaborador_no_colaborador','edadHijo','created_at','updated_at']
            );

            if ($comprobar) {
                $this->reset(['no_kids','kidsValor1','kidsValor2','kidsValor3','kidsValor4']);

                return redirect()->to('/dia-nino/' . $this->colaborador->no_colaborador);
            }
        }

        if ($this->no_kids == 5) {
            $validateData = $this->validate(
                [
                    'kidsValor1' => 'required',
                    'kidsValor2' => 'required',
                    'kidsValor3' => 'required',
                    'kidsValor4' => 'required',
                    'kidsValor5' => 'required'
                ],
                [
                    'kidsValor1.required' => 'Este campo no puede permanecer vacio',
                    'kidsValor2.required' => 'Este campo no puede permanecer vacio',
                    'kidsValor3.required' => 'Este campo no puede permanecer vacio',
                    'kidsValor4.required' => 'Este campo no puede permanecer vacio',
                    'kidsValor5.required' => 'Este campo no puede permanecer vacio'
                ]
            );

            $comprobar = DB::table('dianinoregistro')->upsert(
                [
                    [
                        'colaborador_no_colaborador'=>$this->colaborador->no_colaborador,
                        'edadHijo'=>$validateData['kidsValor1'],
                        'created_at'=>Carbon::now(),
                        'updated_at'=>Carbon::now()
                    ],
                    [
                        'colaborador_no_colaborador'=>$this->colaborador->no_colaborador,
                        'edadHijo'=>$validateData['kidsValor2'],
                        'created_at'=>Carbon::now(),
                        'updated_at'=>Carbon::now()
                    ],
                    [
                        'colaborador_no_colaborador'=>$this->colaborador->no_colaborador,
                        'edadHijo'=>$validateData['kidsValor3'],
                        'created_at'=>Carbon::now(),
                        'updated_at'=>Carbon::now()
                    ],
                    [
                        'colaborador_no_colaborador'=>$this->colaborador->no_colaborador,
                        'edadHijo'=>$validateData['kidsValor4'],
                        'created_at'=>Carbon::now(),
                        'updated_at'=>Carbon::now()
                    ],
                    [
                        'colaborador_no_colaborador'=>$this->colaborador->no_colaborador,
                        'edadHijo'=>$validateData['kidsValor5'],
                        'created_at'=>Carbon::now(),
                        'updated_at'=>Carbon::now()
                    ]
                ],['colaborador_no_colaborador','edadHijo','created_at','updated_at']
            );

            if ($comprobar) {
                $this->reset(['no_kids','kidsValor1','kidsValor2','kidsValor3','kidsValor4','kidsValor5']);

                return redirect()->to('/dia-nino/' . $this->colaborador->no_colaborador);
            }
        }

    }

}

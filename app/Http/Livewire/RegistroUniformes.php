<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Colaborador;
use App\Models\Uniformes_talla;
use App\Models\Uniformes_prenda;
use App\Models\Uniformes_paquete;
use Illuminate\Support\Facades\DB;

class RegistroUniformes extends Component
{

    public $colaborador;

    public $paquetes, $prendas, $tallas;

    public $banderaPrueba = false;
    public $totalSteps = 0;
    public $tope = 0;
    public $currentStep = 0;
    public $paqueteId = 3;
    public $nombrePaquete;
    public $nombrePrenda;
    public $playera60;
    public $genero_id;

    public function mount($no_colaborador)
    {
        $this->colaborador = Colaborador::find($no_colaborador);
        $this->genero_id = $this->colaborador->genero_id;
        $this->paquetes = DB::table('vu_paquete_prenda')->where('paquete_id', $this->paqueteId)->get();
        $this->totalSteps = count($this->paquetes) - 1;
        $this->nombrePaquete = $this->paquetes[0]->nombre_paquete;
        $this->prendas = Uniformes_prenda::find(1);
        $this->checkPaquete();
        $this->tallaMethod();
    }

    public function render()
    {
        return view('livewire.registro-uniformes')->layout('layouts.guest');
    }

    public function checkPaquete()
    {
        if ($this->paqueteId == 5 || $this->paqueteId == 6) {
            $this->totalSteps = $this->totalSteps - 1;
        }
    }

    public function tallaMethod()
    {
        if ($this->paqueteId == 1) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 15)->get();
            }
        }
        if ($this->paqueteId == 2) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 13)->get();
            }
            if ($this->currentStep == 1) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 2)->get();
            }
            if ($this->currentStep == 2) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 3)->get();
            }
            if ($this->currentStep == 3) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 8)->get();
            }
        }
        if ($this->paqueteId == 3) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 14)->get();
            }
            if ($this->currentStep == 1) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 3)->get();
            }
            if ($this->currentStep == 2) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 16)->get();
            }
        }
        if ($this->paqueteId == 4) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 13)->get();
            }
            if ($this->currentStep == 1) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 17)->get();
            }
            if ($this->currentStep == 2) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 11)->get();
            }
            if ($this->currentStep == 3) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 21)->get();
            }
            if ($this->currentStep == 4) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 19)->get();
            }
            if ($this->currentStep == 5) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 6)->get();
            }
            if ($this->currentStep == 6) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 7)->get();
            }
            if ($this->currentStep == 7) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 3)->get();
            }
            if ($this->currentStep == 8) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 20)->get();
            }
            if ($this->currentStep == 9) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 12)->get();
            }
            if ($this->currentStep == 10) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 18)->get();
            }
        }
        if ($this->paqueteId == 5) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 14)->get();
            }
            if ($this->currentStep == 1) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 16)->get();
            }
            if ($this->currentStep == 2) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 11)->get();
            }
            if ($this->currentStep == 3) {
                if ($this->genero_id == 1) {
                    $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 19)->get();
                } elseif ($this->genero_id == 2) {
                    $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 21)->get();
                }
            }
            if ($this->currentStep == 4) {
                if ($this->genero_id == 1) {
                    $this->increaseStep();
                } elseif ($this->genero_id == 2) {
                    $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 6)->get();
                }
            }
            if ($this->currentStep == 5) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 3)->get();
            }
            if ($this->currentStep == 6) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 7)->get();
            }
        }
        if ($this->paqueteId == 6) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 14)->get();
            }
            if ($this->currentStep == 1) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 16)->get();
            }
            if ($this->currentStep == 2) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 11)->get();
            }
            if ($this->currentStep == 3) {
                if ($this->genero_id == 1) {
                    $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 19)->get();
                } elseif ($this->genero_id == 2) {
                    $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 21)->get();
                }
            }
            if ($this->currentStep == 4) {
                if ($this->genero_id == 1) {
                    $this->increaseStep();
                } elseif ($this->genero_id == 2) {
                    $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 6)->get();
                }
            }
            if ($this->currentStep == 5) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 20)->get();
            }
            if ($this->currentStep == 6) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 3)->get();
            }
            if ($this->currentStep == 7) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 7)->get();
            }
        }
        if ($this->paqueteId == 7) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 14)->get();
            }
            if ($this->currentStep == 1) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 9)->get();
            }
            if ($this->currentStep == 2) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 11)->get();
            }
            if ($this->currentStep == 3) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 3)->get();
            }
            if ($this->currentStep == 4) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 19)->get();
            }
            if ($this->currentStep == 5) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 7)->get();
            }
        }
        if ($this->paqueteId == 8) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 15)->get();
            }
            if ($this->currentStep == 1) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 3)->get();
            }
            if ($this->currentStep == 2) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 10)->get();
            }
        }
        if ($this->paqueteId == 9) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 14)->get();
            }
            if ($this->currentStep == 1) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 3)->get();
            }
            if ($this->currentStep == 2) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 9)->get();
            }
        }
        if ($this->paqueteId == 10) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 14)->get();
            }
            if ($this->currentStep == 1) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 3)->get();
            }
            if ($this->currentStep == 2) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 9)->get();
            }
            if ($this->currentStep == 3) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 16)->get();
            }
        }
        if ($this->paqueteId == 11) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 14)->get();
            }
            if ($this->currentStep == 1) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 3)->get();
            }
            if ($this->currentStep == 2) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 16)->get();
            }
        }
        if ($this->paqueteId == 12) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 14)->get();
            }
            if ($this->currentStep == 1) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 10)->get();
            }
            if ($this->currentStep == 2) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 16)->get();
            }
            if ($this->currentStep == 3) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 15)->get();
            }
            if ($this->currentStep == 4) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 3)->get();
            }
            if ($this->currentStep == 5) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 7)->get();
            }
        }
        if ($this->paqueteId == 13) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 14)->get();
            }
            if ($this->currentStep == 1) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 2)->get();
            }
            if ($this->currentStep == 2) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 8)->get();
            }
        }
        if ($this->paqueteId == 14) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 14)->get();
            }
            if ($this->currentStep == 1) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 5)->get();
            }
            if ($this->currentStep == 2) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 9)->get();
            }
        }
        if ($this->paqueteId == 15) {
            if ($this->currentStep == 0) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 14)->get();
            }
            if ($this->currentStep == 1) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 3)->get();
            }
            if ($this->currentStep == 2) {
                $this->tallas = Uniformes_talla::where('uniformes_prenda_id', 9)->get();
            }
        }
    }

    public function increaseStep()
    {
        /* $this->resetErrorBag(); */
        /* $this->validateData(); */

        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
        $this->tallaMethod();
    }

    public function decreaseStep()
    {
        /* $this->resetErrorBag(); */

        $this->currentStep--;
        if ($this->currentStep < 0) {
            $this->currentStep = 0;
        }
        $this->tallaMethod();
    }

    public function doubleDecreaseStep()
    {
        /* $this->resetErrorBag(); */

        $this->currentStep--;
        $this->currentStep--;
        if ($this->currentStep < 0) {
            $this->currentStep = 0;
        }
        $this->tallaMethod();
    }

    public function registro()
    {
        dd("Registro");
    }

    public function tallasPaquetes()
    {
    }
}

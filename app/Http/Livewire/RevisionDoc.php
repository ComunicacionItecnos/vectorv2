<?php

namespace App\Http\Livewire;

use ZipArchive;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class RevisionDoc extends Component
{
    use WithPagination;

    /* Variables */
    public $search, $perPage = '8', $mostrarStatus = '';
    protected $queryString = [
        'search' => ['except' => ''],
    ];

    protected $listeners = [
        'registro',
        'cancelled',
    ];

    public $nuevoIngreso;

    public $idRev;
    public $curp;
    public $curpDoc;
    public $nombre1;
    public $nombre2;
    public $ap_paterno;
    public $ap_materno;
    public $fecha_nacimiento;
    public $actaNacimiento;
    public $escolaridad_id;
    public $escolaridad;
    public $constanciaEstudios;
    public $especialidadEstudios;
    public $genero;
    public $estado_civil;
    public $actaMatrimonio;
    public $rfc;
    public $rfcDocumento;
    public $no_seguro_social;
    public $altaImssDoc;
    public $calle;
    public $colonia;
    public $municipio;
    public $estado;
    public $pais;
    public $nacionalidad;
    public $codigo_postal;
    public $comprobanteDomicilio;
    public $paternidad;
    public $actasHijo;
    public $cartasRecomendacion;
    public $cartillaMilitar;
    public $cartaNoPenales;
    public $credencialIFE;
    public $buroCredito;
    public $foto;
    public $correo;
    public $tel_fijo;
    public $tel_movil;
    public $cvOsolicitudEmpleo;
    public $tallaPantalon;
    public $tallaPlayera;
    public $tallaZapatos;
    public $numExt;
    public $numInt;

    public $r_obscredencial;
    public $r_obsfecNac;
    public $r_obscurp;
    public $r_obsrfc;
    public $r_obsimss;
    public $r_obsdomicilio;
    public $r_obsNivelEstudios;
    public $r_obsExtra;

    public $a_obscredencial;
    public $a_obsfecNac;
    public $a_obscurp;
    public $a_obsrfc;
    public $a_obsimss;
    public $a_obsdomicilio;
    public $a_obsNivelEstudios;
    public $a_obsExtra;
    public $status;
    public $r_userId;
    public $a_userId;

    public $mostrarCandidato = false;
    public $mostrarTodos = true;

    public $candidatoDoc;

    public $credencialValue = true;
    public $observacionCredencial;

    public $actaNacValue = true;
    public $observacionActaNac;

    public $dirValue = true;
    public $observacionDir;

    public $curpDocValue = true;
    public $observacionCurpDoc;

    public $rfcValue = true;
    public $observacionrfc;

    public $imssValue = true;
    public $observacionimss;

    public $escolaridadValue = true;
    public $observacionescolaridad;

    public $obsExtValue = false;
    public $observacionobsExt;

    public $userLogin;

    public function mount()
    {
        $this->candidatoDoc = [];
        $this->userLogin = auth()->user()->role_id;
        if ($this->userLogin == 1) {
            $this->userLogin = NULL;
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.revision-doc', [
            'nuevosIngresos' =>
            DB::table('v_nuevo_ingresos')
                ->when($this->userLogin, function ($query) {

                    if ($this->mostrarStatus == '') {
                        $query->where('areaRd', $this->userLogin)
                            ->where('curp', 'LIKE', "%{$this->search}%");
                    } elseif ($this->mostrarStatus != '') {
                        $query->where('areaRd', $this->userLogin)
                            ->where('status', $this->mostrarStatus)
                            ->where('curp', 'LIKE', "%{$this->search}%");
                    }
                })
                ->orderBy('updated_at', 'DESC')
                ->paginate($this->perPage)
        ]);
    }

    public function descargarZip($id)
    {
        $descarga = DB::table('v_nuevo_ingresos')->where('id', $id)->get();

        $zip = new ZipArchive();
        if (!File::isDirectory(storage_path("app/public/zip/"))) {
            Storage::makeDirectory("public/zip");
        }

        $zip->open(storage_path("app/public/zip/" . $descarga[0]->curp . ".zip"), ZipArchive::CREATE);

        foreach ($descarga as $key => $value) {
            $zip->addFile(storage_path("app/" . $value->curpDoc), '01.-CURP.pdf');
            $zip->addFile(storage_path("app/" . $value->actaNacimiento), '02.-actaNacimiento.pdf');
            $zip->addFile(storage_path("app/" . $value->constanciaEstudios), '03.-constanciaEstudios.pdf');
            if ($value->actaMatrimonio != NULL) {
                $zip->addFile(storage_path("app/" . $value->actaMatrimonio), '04.-actaMatrimonio.pdf');
            } else {
            }

            $zip->addFile(storage_path("app/" . $value->rfcDocumento), '05.-rfcDocumento.pdf');
            $zip->addFile(storage_path("app/" . $value->altaImssDoc), '06.-altaImssDoc.pdf');
            $zip->addFile(storage_path("app/" . $value->comprobanteDomicilio), '07.-comprobanteDomicilio.pdf');

            if ($value->actasHijo != NULL) {
                foreach (json_decode($value->actasHijo) as $aH) {
                    $zip->addFile(storage_path("app/" . $aH), '08.-actasHijos/' . basename($aH));
                }
            }

            if ($value->cartasRecomendacion != NULL) {
                foreach (json_decode($value->cartasRecomendacion) as $cR) {
                    $zip->addFile(storage_path("app/" . $cR), '09.-cartasRecomendacion/' . basename($cR));
                }
            }

            if ($value->cartillaMilitar != NULL) {
                $zip->addFile(storage_path("app/" . $value->cartillaMilitar), '10.-cartillaMilitar.pdf');
            } else {
            }

            if ($value->cartaNoPenales != NULL) {
                $zip->addFile(storage_path("app/" . $value->cartaNoPenales), '11.-cartaNoPenales.pdf');
            } else {
            }

            $zip->addFile(storage_path("app/" . $value->credencialIFE), '12.-credencialIFE.pdf');

            if ($value->buroCredito != NULL) {
                $zip->addFile(storage_path("app/" . $value->buroCredito), '13.-buroCredito.pdf');
            } else {
            }

            $zip->addFile(storage_path("app/" . $value->foto), '14.-foto.png');
            $zip->addFile(storage_path("app/" . $value->cvOsolicitudEmpleo), '15.-cvOsolicitudEmpleo.pdf');
        }

        $zip->close();

        return response()->download(storage_path("app/public/zip/" . $descarga[0]->curp . ".zip"))->deleteFileAfterSend(true);
    }

    public function showInfo($id)
    {
        if ($this->mostrarCandidato == false) {
            $this->mostrarCandidato = true;
            $this->mostrarTodos = false;

            $this->idRev = $id;

            $this->candidatoDoc = DB::table('v_nuevo_ingresos')->where('id', $id)->get();

            if ($this->candidatoDoc[0]->R_userId == NULL) {
                $this->r_userId = NUll;
            } else {
                $this->r_userId = User::where('id', $this->candidatoDoc[0]->R_userId)->first();
                $this->r_userId = $this->r_userId->name;
            }

            if ($this->candidatoDoc[0]->A_userId == NULL) {
                $this->a_userId = NUll;
            } else {
                $this->a_userId = User::where('id', $this->candidatoDoc[0]->A_userId)->first();
                $this->a_userId = $this->a_userId->name;
            }

            $this->curp = $this->candidatoDoc[0]->curp;
            $this->curpDoc = $this->candidatoDoc[0]->curpDoc;
            $this->nombre1 = $this->candidatoDoc[0]->nombre_1;
            $this->nombre2 = $this->candidatoDoc[0]->nombre_2;
            $this->ap_paterno = $this->candidatoDoc[0]->ap_paterno;
            $this->ap_materno = $this->candidatoDoc[0]->ap_materno;
            $this->fecha_nacimiento = $this->candidatoDoc[0]->fecha_nacimiento;
            $this->actaNacimiento = $this->candidatoDoc[0]->actaNacimiento;
            $this->escolaridad_id = $this->candidatoDoc[0]->escolaridad_id;
            $this->escolaridad = $this->candidatoDoc[0]->escolaridad;
            $this->constanciaEstudios = $this->candidatoDoc[0]->constanciaEstudios;
            $this->especialidadEstudios = $this->candidatoDoc[0]->especialidadEstudios;
            $this->genero = $this->candidatoDoc[0]->genero;
            $this->estado_civil = $this->candidatoDoc[0]->estado_civil;
            $this->actaMatrimonio = $this->candidatoDoc[0]->actaMatrimonio;
            $this->rfc = $this->candidatoDoc[0]->rfc;
            $this->rfcDocumento = $this->candidatoDoc[0]->rfcDocumento;
            $this->no_seguro_social = $this->candidatoDoc[0]->no_seguro_social;
            $this->altaImssDoc = $this->candidatoDoc[0]->altaImssDoc;
            $this->calle = $this->candidatoDoc[0]->calle;
            $this->colonia = $this->candidatoDoc[0]->colonia;
            $this->municipio = $this->candidatoDoc[0]->municipio;
            $this->estado = $this->candidatoDoc[0]->estado;
            $this->pais = $this->candidatoDoc[0]->pais;
            $this->nacionalidad = $this->candidatoDoc[0]->nacionalidad;
            $this->codigo_postal = $this->candidatoDoc[0]->codigo_postal;
            $this->comprobanteDomicilio = $this->candidatoDoc[0]->comprobanteDomicilio;
            $this->paternidad = $this->candidatoDoc[0]->paternidad;
            $this->actasHijo = $this->candidatoDoc[0]->actasHijo;
            $this->cartasRecomendacion = $this->candidatoDoc[0]->cartasRecomendacion;
            $this->cartillaMilitar = $this->candidatoDoc[0]->cartillaMilitar;
            $this->cartaNoPenales = $this->candidatoDoc[0]->cartaNoPenales;
            $this->credencialIFE = $this->candidatoDoc[0]->credencialIFE;
            $this->buroCredito = $this->candidatoDoc[0]->buroCredito;
            $this->foto = $this->candidatoDoc[0]->foto;
            $this->correo = $this->candidatoDoc[0]->correo;
            $this->tel_fijo = $this->candidatoDoc[0]->tel_fijo;
            $this->tel_movil = $this->candidatoDoc[0]->tel_movil;
            $this->cvOsolicitudEmpleo = $this->candidatoDoc[0]->cvOsolicitudEmpleo;
            $this->tallaPantalon = $this->candidatoDoc[0]->tallaPantalon;
            $this->tallaPlayera = $this->candidatoDoc[0]->tallaPlayera;
            $this->tallaZapatos = $this->candidatoDoc[0]->tallaZapatos;
            $this->numExt = $this->candidatoDoc[0]->numExt;
            $this->numInt = $this->candidatoDoc[0]->numInt;

            $this->r_obscredencial = $this->candidatoDoc[0]->R_obscredencial;
            $this->a_obscredencial = $this->candidatoDoc[0]->A_obscredencial;
            if ($this->r_obscredencial != NUll || $this->a_obscredencial != NUll) {
                $this->credencialValue = false;
            } else {
                $this->credencialValue = true;
            }

            $this->r_obsfecNac = $this->candidatoDoc[0]->R_obsfecNac;
            $this->a_obsfecNac = $this->candidatoDoc[0]->A_obsfecNac;
            if ($this->r_obsfecNac != NULL || $this->a_obsfecNac != NULL) {
                $this->actaNacValue = false;
            } else {
                $this->actaNacValue = true;
            }

            $this->r_obsdomicilio = $this->candidatoDoc[0]->R_obsdomicilio;
            $this->a_obsdomicilio = $this->candidatoDoc[0]->A_obsdomicilio;
            if ($this->r_obsdomicilio != NULL || $this->a_obsdomicilio != NULL) {
                $this->dirValue = false;
            } else {
                $this->dirValue = true;
            }

            $this->r_obscurp = $this->candidatoDoc[0]->R_obscurp;
            $this->a_obscurp = $this->candidatoDoc[0]->A_obscurp;
            if ($this->r_obscurp != NULL || $this->a_obscurp != NULL) {
                $this->curpDocValue = false;
            } else {
                $this->curpDocValue = true;
            }

            $this->r_obsrfc = $this->candidatoDoc[0]->R_obsrfc;
            $this->a_obsrfc = $this->candidatoDoc[0]->A_obsrfc;
            if ($this->r_obsrfc != NULL || $this->a_obsrfc != NULL) {
                $this->rfcValue = false;
            } else {
                $this->rfcValue = true;
            }

            $this->r_obsimss = $this->candidatoDoc[0]->R_obsimss;
            $this->a_obsimss = $this->candidatoDoc[0]->A_obsimss;
            if ($this->r_obsimss != NULL || $this->a_obsimss != NULL) {
                $this->imssValue = false;
            } else {
                $this->imssValue = true;
            }

            $this->r_obsNivelEstudios = $this->candidatoDoc[0]->R_obsNivelEstudios;
            $this->a_obsNivelEstudios = $this->candidatoDoc[0]->A_obsNivelEstudios;
            if ($this->r_obsNivelEstudios != NULL || $this->a_obsNivelEstudios != NULL) {
                $this->escolaridadValue = false;
            } else {
                $this->escolaridadValue = true;
            }

            $this->r_obsExtra = $this->candidatoDoc[0]->R_obsExtra;
            $this->a_obsExtra = $this->candidatoDoc[0]->A_obsExtra;
            $this->status = $this->candidatoDoc[0]->status;
        }
    }

    public function showMore()
    {
        if ($this->mostrarTodos == false) {

            $this->mostrarTodos = true;
            $this->mostrarCandidato = false;
            $this->candidatoDoc = [];

            $this->observacionCredencial = NULL;
            $this->observacionActaNac = NULL;
            $this->observacionCurpDoc = NULL;
            $this->observacionrfc = NULL;
            $this->observacionimss = NULL;
            $this->observacionDir = NULL;
            $this->observacionescolaridad = NULL;
            $this->observacionobsExt = NULL;

            $this->credencialValue = true;
            $this->actaNacValue = true;
            $this->dirValue = true;
            $this->curpDocValue = true;
            $this->rfcValue = true;
            $this->imssValue = true;
            $this->escolaridadValue = true;
            $this->obsExtValue = false;
        }
    }

    public function credencialToogle()
    {
        ($this->credencialValue) ? $this->observacionCredencial = '' : $this->credencialValue = false;
    }

    public function actaNacToogle()
    {
        ($this->actaNacValue) ? $this->observacionActaNac = '' : $this->actaNacValue = false;
    }

    public function direccionToggle()
    {
        ($this->dirValue) ? $this->observacionDir = '' : $this->dirValue = false;
    }

    public function curpDocToogle()
    {
        ($this->curpDocValue) ? $this->observacionCurpDoc = '' : $this->curpDocValue = false;
    }

    public function rfcToogle()
    {
        ($this->rfcValue) ? $this->observacionrfc = '' : $this->rfcValue = false;
    }

    public function imssToogle()
    {
        ($this->imssValue) ? $this->observacionimss = '' : $this->imssValue = false;
    }

    public function escolaridadToogle()
    {
        ($this->escolaridadValue) ? $this->observacionescolaridad = '' : $this->escolaridadValue = false;
    }

    public function obsExToogle()
    {
        ($this->obsExtValue) ? $this->observacionobsExt = '' : $this->obsExtValue = false;
    }

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
        $this->confirm('¿Deseas terminar el registro?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'confirmButtonText' =>  'Si',
            'cancelButtonText' => 'No',
            'onConfirmed' => 'registro',
            'onCancelled' => 'cancelled'
        ]);
    }

    public function registro()
    {
        DB::transaction(function () {
            $contar = [
                $this->credencialValue, $this->actaNacValue, $this->dirValue, $this->curpDocValue,
                $this->rfcValue, $this->imssValue, $this->escolaridadValue
            ];

            $totalFalsos = $this->revisarVerdadero($contar);

            if ($this->userLogin == 5) {

                if ($this->status == 3) {

                    DB::table('revision_docs')->where('id', $this->idRev)->update([
                        'areaRd' => 3,
                        'R_obscredencial' => NULL,
                        'R_obsfecNac' => NULL,
                        'R_obscurp' => NULL,
                        'R_obsrfc' => NULL,
                        'R_obsimss' => NULL,
                        'R_obsdomicilio' => NULL,
                        'R_obsNivelEstudios' => NULL,
                        'R_obsExtra' => NULL,
                        'A_obscredencial' => NULL,
                        'A_obsfecNac' => NULL,
                        'A_obscurp' => NULL,
                        'A_obsrfc' => NULL,
                        'A_obsimss' => NULL,
                        'A_obsdomicilio' => NULL,
                        'A_obsNivelEstudios' => NULL,
                        'A_obsExtra' => NULL,
                        'status' => 0,
                        'R_userId' => auth()->user()->id
                    ]);
                    $this->flash('success', 'Se ha guardado correctamente', [
                        'position' =>  'top-end',
                        'timer' =>  3500,
                        'toast' =>  true,
                        'text' =>  '',
                        'confirmButtonText' =>  'Ok',
                        'cancelButtonText' =>  'Cancel',
                        'showCancelButton' =>  false,
                        'showConfirmButton' =>  false,
                    ]);
                    return redirect()->to('/revision-documentacion/');
                } else {
                    if ($totalFalsos != 0) {
                        DB::table('revision_docs')->where('id', $this->idRev)->update([
                            'R_obscredencial' => $this->observacionCredencial,
                            'R_obsfecNac' => $this->observacionActaNac,
                            'R_obscurp' => $this->observacionCurpDoc,
                            'R_obsrfc' => $this->observacionrfc,
                            'R_obsimss' => $this->observacionimss,
                            'R_obsdomicilio' => $this->observacionDir,
                            'R_obsNivelEstudios' => $this->observacionescolaridad,
                            'R_obsExtra' => $this->observacionobsExt,
                            'status' => 1,
                            'R_userId' => auth()->user()->id
                        ]);

                        $this->flash('success', 'Se ha guardado correctamente', [
                            'position' =>  'top-end',
                            'timer' =>  3500,
                            'toast' =>  true,
                            'text' =>  '',
                            'confirmButtonText' =>  'Ok',
                            'cancelButtonText' =>  'Cancel',
                            'showCancelButton' =>  false,
                            'showConfirmButton' =>  false,
                        ]);
                        return redirect()->to('/revision-documentacion/');
                    } else {
                        DB::table('revision_docs')->where('id', $this->idRev)->update([
                            'areaRd' => 3,
                            'R_obscredencial' => NULL,
                            'R_obsfecNac' => NULL,
                            'R_obscurp' => NULL,
                            'R_obsrfc' => NULL,
                            'R_obsimss' => NULL,
                            'R_obsdomicilio' => NULL,
                            'R_obsNivelEstudios' => NULL,
                            'R_obsExtra' => NULL,
                            'status' => 0,
                            'R_userId' => auth()->user()->id
                        ]);

                        $this->flash('success', 'Se ha guardado correctamente', [
                            'position' =>  'top-end',
                            'timer' =>  3500,
                            'toast' =>  true,
                            'text' =>  '',
                            'confirmButtonText' =>  'Ok',
                            'cancelButtonText' =>  'Cancel',
                            'showCancelButton' =>  false,
                            'showConfirmButton' =>  false,
                        ]);
                        return redirect()->to('/revision-documentacion/');
                    }
                }
            } elseif ($this->userLogin == 3) {
                /* Retorna a reclutamiento si hay observaciones  */
                if ($totalFalsos != 0) {
                    DB::table('revision_docs')->where('id', $this->idRev)->update([
                        'areaRd' => 5,
                        'R_obscredencial' => NULL,
                        'R_obsfecNac' => NULL,
                        'R_obscurp' => NULL,
                        'R_obsrfc' => NULL,
                        'R_obsimss' => NULL,
                        'R_obsdomicilio' => NULL,
                        'R_obsNivelEstudios' => NULL,
                        'A_obscredencial' => $this->observacionCredencial,
                        'A_obsfecNac' => $this->observacionActaNac,
                        'A_obscurp' => $this->observacionCurpDoc,
                        'A_obsrfc' => $this->observacionrfc,
                        'A_obsimss' => $this->observacionimss,
                        'A_obsdomicilio' => $this->observacionDir,
                        'A_obsNivelEstudios' => $this->observacionescolaridad,
                        'A_obsExtra' => $this->observacionobsExt,
                        'status' => 3,
                        'A_userId' => auth()->user()->id
                    ]);

                    $this->flash('success', 'Se ha guardado correctamente', [
                        'position' =>  'top-end',
                        'timer' =>  3500,
                        'toast' =>  true,
                        'text' =>  '',
                        'confirmButtonText' =>  'Ok',
                        'cancelButtonText' =>  'Cancel',
                        'showCancelButton' =>  false,
                        'showConfirmButton' =>  false,
                    ]);
                    return redirect()->to('/revision-documentacion/');
                } else {
                    DB::table('revision_docs')->where('id', $this->idRev)->update([
                        'R_obscredencial' => NULL,
                        'R_obsfecNac' => NULL,
                        'R_obscurp' => NULL,
                        'R_obsrfc' => NULL,
                        'R_obsimss' => NULL,
                        'R_obsdomicilio' => NULL,
                        'R_obsNivelEstudios' => NULL,
                        'R_obsExtra' => NULL,
                        'A_obscredencial' => NULL,
                        'A_obsfecNac' => NULL,
                        'A_obscurp' => NULL,
                        'A_obsrfc' => NULL,
                        'A_obsimss' => NULL,
                        'A_obsdomicilio' => NULL,
                        'A_obsNivelEstudios' => NULL,
                        'A_obsExtra' => NULL,
                        'status' => 2,
                        'A_userId' => auth()->user()->id
                    ]);

                    $this->flash('success', 'Se ha guardado correctamente', [
                        'position' =>  'top-end',
                        'timer' =>  3500,
                        'toast' =>  true,
                        'text' =>  '',
                        'confirmButtonText' =>  'Ok',
                        'cancelButtonText' =>  'Cancel',
                        'showCancelButton' =>  false,
                        'showConfirmButton' =>  false,
                    ]);
                    return redirect()->to('/revision-documentacion/');
                }
            }
        });
    }

    /* revisar cuantos checkbox son verdaderos */
    public function revisarVerdadero($arrayCb)
    {
        $contador = 0;
        $Cb = count($arrayCb);
        for ($i = 0; $i < $Cb; $i++) {
            if ($arrayCb[$i] != True) {
                $contador = $contador + 1;
            }
        }
        return $contador;
    }
}

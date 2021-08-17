<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReporteIUNExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    protected $reporte;

    public function __construct($reporte)
    {
        $this->reporte = $reporte;
    }

    public function headings(): array
    {
        return [
            'id',
            'No. Colaborador premiado',
            'Nombre colaborador premiado',
            'Insignia',
            'Fecha asignacion',
            'No. Colaborador asignador',
            'Nombre asignador',
            'Mensaje asignador'
        ];
    }

    public function collection()
    {
        return $this->reporte;
    }
}

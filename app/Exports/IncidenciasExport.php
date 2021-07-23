<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class IncidenciasExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;

    protected $incidencia;

    public function __construct($incidencia)
    {
        $this->incidencia = $incidencia;
    }

    public function headings(): array
    {
        return [
            'ID',
            'No. Colaborador',
            'Nombre',
            'Puesto',
            'Area',
            'Tipo de incidencia',
            'Fecha de incidencia'
        ];
    }

    public function collection()
    {
        return $this->incidencia;
    }
}

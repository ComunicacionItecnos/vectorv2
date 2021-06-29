<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class VehiculosExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    use Exportable;

    protected $lista;

    public function __construct($lista)
    {
        $this->lista = $lista;
    }

    public function headings(): array
    {
        return [
            'No. Colaborador',
            'Placa',
            'Marca',
            'Modelo',
            'Año',
            'Color',
            'Tipo de vehiculo',
            'No. Marbete'
        ];
    }

    public function collection()
    {
        return $this->lista;
    }
}

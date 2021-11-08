<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class UniformesExport implements FromCollection, WithHeadings
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
            'Primer Nombre',
            'Segundo Nombre',
            'Apellido Paterno',
            'Apellido Materno',
            'Nonbre del Paquete',
            'Prenda',
            'Talla'
        ];
    }

    public function collection()
    {
        return $this->lista;
    }
}

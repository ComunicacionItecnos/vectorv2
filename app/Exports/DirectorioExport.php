<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class DirectorioExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    protected $directorio;

    public function __construct($directorio)
    {
        $this->directorio = $directorio;
    }

    public function headings(): array
    {
        return [
            'Nombre',
            'Puesto',
            'Area',
            'Correo',
            'Extensión',
            'Clave de Radio'
        ];
    }

    public function collection()
    {
        return $this->directorio;
    }
}

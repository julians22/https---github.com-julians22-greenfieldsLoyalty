<?php

namespace App\Exports\Backend;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TopUpsExport implements FromCollection, WithMapping, WithHeadings
{
    protected $_query;


    public function __construct($query) {
        $this->_query = $query;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $topups = $this->_query->get();
        return $topups;
    }

    public function map($topup): array
    {

        return [
            $topup->transaction_code,
            $topup->user->name,
            $topup->user->phone,
            $topup->user->email,
            $topup->status,
            $topup->point,
            $topup->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            'Transaction Code',
            'Customer Name',
            'Phone',
            'Email',
            'Status',
            'Point',
            'Upload Date'
        ];
    }
}

<?php

namespace App\Exports\Backend;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CustomerExport implements FromCollection, WithMapping, WithHeadings
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
        $customers = $this->_query->get();
        return $customers;
    }

    public function map($customer): array
    {

        return [
            $customer->name,
            $customer->phone,
            $customer->email,
            $customer->topups_count,
            $customer->success_topups_count,
            $customer->failed_topups_count,
            $customer->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            'Name',
            'Phone',
            'Email',
            'Topup Total',
            'Success Topup',
            'Failed Topup',
            'Register Date',
        ];
    }
}

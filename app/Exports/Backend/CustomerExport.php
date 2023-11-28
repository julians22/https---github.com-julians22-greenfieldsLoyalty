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

        $category = $customer->detail ? $customer->detail->surveyCategory : null;
        $product = $customer->detail ? $customer->detail->surveyProduct : null;
        $packsize = $customer->detail ? $customer->detail->surveyPacksize : null;

        return [
            $customer->name,
            $customer->phone,
            $customer->email,
            $customer->point,
            $customer->topups_count,
            $customer->success_topups_count,
            $customer->failed_topups_count,
            $customer->register_channel ?? "",
            $category,
            $product,
            $packsize,
            $customer->created_at,
        ];
    }

    public function headings(): array
    {
        return [
            'Name',
            'Phone',
            'Email',
            'Points',
            'Topup Total',
            'Success Topup',
            'Failed Topup',
            'Daftar Channel',
            'Survey (Kategori Susu)',
            'Survey (Brand Susu Susu)',
            'Survey (Ukuran Kemasan)',
            'Register Date',
        ];
    }
}

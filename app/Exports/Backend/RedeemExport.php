<?php

namespace App\Exports\Backend;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class RedeemExport implements FromCollection, WithMapping, WithHeadings
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
        $redeems = $this->_query->get();
        return $redeems;
    }

    public function map($redeem): array
    {

        return [
            $redeem->transaction_code,
            $redeem->user->name,
            $redeem->user->phone,
            $redeem->user->email,
            $redeem->status,
            $redeem->reward->name,
            $redeem->point,
            $redeem->address->address,
            $redeem->address->rel_province->name,
            $redeem->address->rel_city->name,
            $redeem->address->rel_district->name,
            $redeem->address->postal_code,
            $redeem->created_at,
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
            'Reward',
            'Point',
            'Address',
            'Province',
            'City',
            'District',
            'Postal',
            'Redeem Date'
        ];
    }
}

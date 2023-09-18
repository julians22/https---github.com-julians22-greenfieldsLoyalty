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

        $province = "";
        $city = "";
        $district = "";
        $domicile = "";

        $province = $redeem->address_data->hasProvince() ? $redeem->address->rel_province->name : "";
        $city = $redeem->address_data->hasCity() ? $redeem->address->rel_city->name : "";
        $district = $redeem->address_data->hasDistrict() ? $redeem->address->rel_district->name : "";
        $domicile = ($redeem->address_data->domicile) ? $redeem->address->domicile : "";

        return [
            $redeem->created_at,
            $redeem->transaction_code,
            $redeem->user->name,
            $redeem->user->phone,
            $redeem->user->email,
            $redeem->reward->name,
            $redeem->point,
            $redeem->channel,
            $redeem->address->address,
            $domicile,
            $province,
            $city,
            $district,
            $redeem->address->postal_code,
            $redeem->status,
        ];
    }

    public function headings(): array
    {
        return [
            'Redeem Date',
            'Transaction Code',
            'Customer Name',
            'Phone',
            'Email',
            'Reward',
            'Point',
            'Address',
            'Domicile',
            'Province',
            'City',
            'District',
            'Postal',
            'Status',
        ];
    }
}

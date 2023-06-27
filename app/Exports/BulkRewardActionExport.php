<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class BulkRewardActionExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
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
            $redeem->created_at,
            $redeem->transaction_code,
            $redeem->user->name,
            $redeem->user->phone,
            $redeem->user->email,
            $redeem->reward->name,
            $redeem->address->address,
            $redeem->address->rel_province->name,
            $redeem->address->rel_city->name,
            $redeem->address->rel_district->name,
            $redeem->address->postal_code,
            $redeem->status . '(Change it to: send / delay)',
            null,
            "If status set to delay, fill the reason"
        ];
    }

    public function headings(): array
    {
        return [
            'redeem_date',
            'transaction_code',
            'customer_name',
            'phone',
            'email',
            'reward',
            'address',
            'province',
            'city',
            'district',
            'postal_code',
            'status',
            'airwaybill_number',
            'delay_reason'
        ];
    }
}

<?php

namespace App\Exports\Backend;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class TopUpsExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize
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
        $note = "";
        if ($topup->isCompleted()) {
            $note = $topup->note;
        }elseif ($topup->isFailed()) {
            $note = $topup->failed_reason;
        }

        $detailCategories = [];
        $packsizes = [];
        $flavours = [];
        $quantities = [];
        $prices = [];
        $discounts = [];
        $totals = [];

        if ($topup->has('details')) {
            foreach ($topup->details as $key => $value) {
                array_push($detailCategories, $value->product);
                array_push($packsizes, $value->packsize);
                array_push($flavours, $value->flavour);
                array_push($quantities, $value->qty);
                array_push($prices, $value->price);
                array_push($discounts, $value->dicount_price);
                array_push($totals, $value->total);
            }
        }

        return [
            $topup->transaction_code,
            $topup->user->name,
            $topup->user->phone,
            $topup->user->email,
            $topup->status,
            $topup->point,
            $topup->channel,
            $topup->receipt_number,
            $topup->receipt_channel,
            $topup->receipt_subchannel,
            $topup->receipt_area,
            $topup->receipt_storename,
            implode("|", $detailCategories),
            implode("|", $packsizes),
            implode("|", $flavours),
            implode("|", $quantities),
            implode("|", $prices),
            implode("|", $discounts),
            implode("|", $totals),
            $note,
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
            'Channel',
            'Point',
            'Nomor Struk',
            'Channel',
            'Sub-Channel',
            'Region',
            'Nama Toko',
            'Kategori',
            'Packsize',
            'Flavor',
            'Qty Purchase',
            'Normal Price',
            'Discount Price',
            'Total Price',
            'Notes',
            'Upload Date'
        ];
    }
}

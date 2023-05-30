<?php

namespace App\Imports;

use App\Models\Voucher;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class VouchersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $created_time = Date::excelToDateTimeObject($row['create_time']);
        $expired_time = Date::excelToDateTimeObject($row['expiry_time']);

        return new Voucher([
            'promo_code_id' => $row['promocode_id'],
            'promo_id' => $row['promoid'],
            'code' => $row['code'],
            'generated_at' => $created_time,
            'expired_at' => $expired_time
        ]);
    }
}

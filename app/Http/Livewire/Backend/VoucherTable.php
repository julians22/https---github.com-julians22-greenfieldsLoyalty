<?php

namespace App\Http\Livewire\Backend;

use App\Models\Voucher;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class VoucherTable extends DataTableComponent
{

    public bool $showSearch = FALSE;

    public function columns(): array
    {
        return [
            Column::make(__('Code'), 'code'),
            Column::make(__('Generated Date'), 'generated_at'),
            Column::make(__('Expiry Date'), 'expired_at'),
            Column::make(__('Created Date'), 'created_at'),
            Column::make(__('Used?'), 'given_at')
                ->format(function($value) {
                    if ($value) {
                        return '<strong>'.$value.'</strong>';
                    }
                    return '<span class="badge badge-success">Available</span>';
                })
                ->asHtml(),
        ];
    }

    public function query(): Builder
    {
        return Voucher::with('user');
    }
}

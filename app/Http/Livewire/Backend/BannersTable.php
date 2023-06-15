<?php

namespace App\Http\Livewire\Backend;

use App\Models\Banner;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class BannersTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('Image Desktop'),
            Column::make('Image Mobile'),
            Column::make('Dibuat pada', 'created_at')
            ->sortable(),
            Column::make('Actions')
        ];
    }

    public function query(): Builder
    {
        return Banner::query();
    }

    /**
     * @return string
     */
    public function rowView(): string
    {
        return 'backend.banners.includes.row';
    }
}

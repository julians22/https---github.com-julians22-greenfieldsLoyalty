<?php

namespace App\Http\Livewire\Backend;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ActivitiesTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make(__('Title'), 'title'),
            Column::make(__('Status')),
            Column::make(__('Last Updated')),
            Column::make(__('Actions')),
        ];
    }

    public function query(): Builder
    {
        return Activity::query();
    }

    /**
     * @return string
     */
    public function rowView(): string
    {
        return 'backend.activities.includes.row';
    }
}

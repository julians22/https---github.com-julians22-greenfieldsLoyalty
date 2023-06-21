<?php

namespace App\Http\Livewire\Backend;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class FaqsTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make(__('Question'), 'question'),
            Column::make(__('Last Updated'), 'updated_at'),
            Column::make(__('Actions'))
        ];
    }

    public function query(): Builder
    {
        return Faq::query();
    }

    /**
     * @return string
     */
    public function rowView(): string
    {
        return 'backend.faqs.includes.row';
    }
}

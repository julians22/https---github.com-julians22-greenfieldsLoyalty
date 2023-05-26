<?php

namespace App\Http\Livewire\Backend;

use App\Models\TopUp;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class TopupTable extends DataTableComponent
{

    public array $perPageAccepted = [5, 10, 50, 100];

    /**
     * @return array
     */
    public function filters(): array
    {
        return [
            'status' => Filter::make('Status')
                ->select([
                    '' => 'Any',
                    TopUp::STATUS_CREATED => 'Unprocessed',
                    TopUp::STATUS_PROCESS => 'Processed',
                    TopUp::STATUS_SUCCESS => 'Finished',
                    TopUp::STATUS_FAILED => 'Canceled',
                ])
        ];
    }

    public function columns(): array
    {
        return [
            Column::make(__('Transaction Code'), 'transaction_code')
                ->searchable()
                ->sortable(),
            Column::make(__('Name'), 'user.name')
                ->searchable()
                ->sortable(),
            Column::make(__('Status'), 'status')
                ->sortable(),
            Column::make(__('Created Date'), 'created_at')
                ->sortable(),
            Column::make(__('Actions')),
        ];
    }

    public function query(): Builder
    {
        $query = TopUp::with('user');

        return $query
            ->when($this->getFilter('status'), fn ($query, $status) => $query->where('status', $status));
    }

    /**
     * @return string
     */
    public function rowView(): string
    {
        return 'backend.topups.includes.row';
    }
}

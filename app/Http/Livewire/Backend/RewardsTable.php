<?php

namespace App\Http\Livewire\Backend;

use App\Models\Reward;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class RewardsTable extends DataTableComponent
{

    public array $perPageAccepted = [5, 10, 50, 100];

    public string $defaultSortColumn = 'updated_at';
    public string $defaultSortDirection = 'desc';

    public function query(): Builder
    {
        $query = Reward::with('redeems')->withCount('redeems');

        return $query
            ->when($this->getFilter('search'), fn ($query, $term) => $query->search($term))
            ->when($this->getFilter('active'), fn ($query, $active) => $query->where('status', $active === 'yes'));
    }

    /**
     * @return array
     */
    public function filters(): array
    {
        return [
            'active' => Filter::make('Publish Status')
                ->select([
                    '' => 'Any',
                    'yes' => 'Published',
                    'no' => 'Draft',
                ])
        ];
    }

    /**
     * @return array
     */
    public function columns(): array
    {
        return [
            Column::make(__('Name'), 'name')
                ->sortable(),
            Column::make(__('Point'), 'point')
                ->sortable(),
            Column::make(__('Initial Stock'), 'initial_stock')
                ->sortable(),
            Column::make(__('Current Stock'), 'current_stock')
                ->sortable(),
            Column::make(__('Used Stock'))
                ->sortable(),
            Column::make(__('Status'), 'status')
                ->sortable(),
            Column::make(__('Created Date'), 'created_at')
                ->sortable(),
            Column::make(__('Actions')),
        ];
    }

    /**
     * @return string
     */
    public function rowView(): string
    {
        return 'backend.rewards.includes.row';
    }
}

<?php

namespace App\Http\Livewire\Backend;

use App\Models\Reward;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
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
        $startDate = $this->getFilter('stock_date_from');
        $endDate = $this->getFilter('stock_date_to');

        $query = Reward::with('redeems')->withCount('redeems');

        if (is_null($startDate) && is_null($endDate)) {

        }else{
            if (is_null($startDate) && !is_null($endDate)) {
                $query = $query->withCount(['redeems' => function(Builder $query) use ($endDate){
                    $query->whereDate('created_at', $endDate);
                }]);
            }

            if (is_null($endDate) && !is_null($startDate)) {
                $query = $query->withCount(['redeems' => function(Builder $query) use ($startDate){
                    $query->whereDate('created_at', $startDate);
                }]);
            }

            if (!is_null($startDate) && !is_null($endDate)) {
                if ($startDate > $endDate) {
                    $this->dispatchBrowserEvent('swalError', [
                        'message' => 'Start date must be less than end date'
                    ]);
                    // throw new \Exception("Start date must be less than end date");
                    exit();
                }
                $query = $query->withCount(['redeems' => function(Builder $query) use ($startDate, $endDate){
                    $query->whereBetween(DB::raw('DATE(created_at)'), [$startDate, $endDate]);
                }]);
            }
        }


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
                ]),
            'stock_date_from' => Filter::make('Tanggal Penggunaan')
                ->date(),
            // 'stock_date_to' => Filter::make('End Date')
            //     ->date()
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
            Column::make(__('Sisa Stok'), 'current_stock')
                ->sortable(),
            Column::make(__('Stok Terpakai')),
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

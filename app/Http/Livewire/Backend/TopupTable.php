<?php

namespace App\Http\Livewire\Backend;

use App\Domains\Auth\Models\User;
use App\Exports\Backend\TopUpsExport;
use App\Models\TopUp;
use Excel;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class TopupTable extends DataTableComponent
{

    public array $perPageAccepted = [5, 10, 50, 100];

    public string $defaultSortColumn = 'created_at';
    public string $defaultSortDirection = 'desc';

    protected $listeners = ['exportTopUpTable'];

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
                ->sortable(function(Builder $query, $direction) {
                    return $query->orderBy(User::select('name')->whereColumn('users.id', 'top_ups.user_id'), $direction);
                }),
            Column::make(__('Status'), 'status')
                ->sortable(),
            Column::make(__('Point'), 'point')
                ->sortable(),
            Column::make(__('Note'), 'note'),
            Column::make(__('Upload Date'), 'created_at')
                ->sortable(),
            Column::make(__('Actions')),
        ];
    }

    public function query(): Builder
    {
        $query = TopUp::with('user')->whereHas('user');

        return $query
            ->when($this->getFilter('status'), fn ($query, $status) => $query->where('status', $status));
    }

    public function exportTopUpTable() {
        $query = $this->rowsQuery();
        return Excel::download(new TopUpsExport($query), 'GreenFieldsKlubIbuExtra-Topups.xlsx');
    }

    /**
     * @return string
     */
    public function rowView(): string
    {
        return 'backend.topups.includes.row';
    }
}

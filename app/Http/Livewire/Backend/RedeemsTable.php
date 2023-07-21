<?php

namespace App\Http\Livewire\Backend;

use App\Domains\Auth\Models\User;
use App\Exports\Backend\RedeemExport;
use App\Models\Redeem;
use Excel;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class RedeemsTable extends DataTableComponent
{

    public array $perPageAccepted = [5, 10, 50, 100];

    public string $defaultSortColumn = 'created_at';
    public string $defaultSortDirection = 'desc';

    protected $listeners = ['exportRedeemsTable'];

    /**
     * @return array
     */
    public function filters(): array
    {
        return [
            'status' => Filter::make('Status')
                ->select([
                    '' => 'Any',
                    Redeem::STATUS_CREATED => 'Unprocessed',
                    Redeem::STATUS_PROCESS => 'Processed',
                    Redeem::STATUS_SUCCESS => 'Finished',
                    Redeem::STATUS_FAILED => 'Delayed',
                ]),
            'redeem_date' => Filter::make('Redeem Date')
                ->date(),
            'created_from' => Filter::make('Created From')->date(),
            'created_to' => Filter::make('Created To')->date()
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
                    return $query->orderBy(User::select('name')->whereColumn('users.id', 'redeems.user_id'), $direction);
                }),
            Column::make(__('Reward Item'), 'reward.name'),
            Column::make(__('Point'), 'point')
                ->sortable(),
            Column::make(__('Status'), 'status')
                ->sortable(),
            Column::make(__('Redeem Date'), 'created_at')
                ->sortable(),
            Column::make(__('Actions')),
        ];
    }

    public function query(): Builder
    {
        $query = Redeem::with('user')->has('user');

        return $query
            ->when($this->getFilter('redeem_date'), fn ($query, $date) => $query->whereDate('created_at', $date))
            ->when($this->getFilter('created_from'), fn ($query, $date) => $query->whereDate('created_at', '>=', date('Y-m-d', strtotime($date))))
            ->when($this->getFilter('created_to'), fn ($query, $date) => $query->whereDate('created_at', '<=', date('Y-m-d', strtotime($date))))
            ->when($this->getFilter('status'), fn ($query, $status) => $query->where('status', $status));
    }

    public function exportRedeemsTable() {
        $query = $this->rowsQuery();
        return Excel::download(new RedeemExport($query), 'GreenFieldsKlubIbuExtra-Redeems.xlsx');
    }

    /**
     * @return string
     */
    public function rowView(): string
    {
        return 'backend.redeems.includes.row';
    }
}

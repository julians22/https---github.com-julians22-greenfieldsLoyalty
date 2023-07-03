<?php

namespace App\Http\Livewire\Backend;

use App\Domains\Auth\Models\User;
use App\Exports\Backend\RedeemExport;
use App\Exports\BulkRewardActionExport;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Redeem;
use Excel;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class BulkRedeemsTable extends DataTableComponent
{

    protected $listeners = ['exportRedeemsTable', 'refreshData'];

    /**
     * @return array
     */
    public function filters(): array
    {
        return [
            'redeem_date' => Filter::make('Redeem Date')
                ->date()
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
            Column::make(__('Redeem Date'), 'created_at'),
            Column::make(__('Status'), 'status')
                ->sortable(),
        ];
    }

    public function query(): Builder
    {
        $query = Redeem::statusCreated()->with('user')->whereHas('user');
        return $query
            ->when($this->getFilter('redeem_date'), fn ($query, $date) => $query->whereDate('created_at', $date));
    }

    public function exportRedeemsTable() {
        $query = $this->rowsQuery();
        return Excel::download(new BulkRewardActionExport($query), 'BulkActions-Redeems-'. now()->format('Y-m-d h:i') .'.xlsx');
    }

    public function refreshData() {
        $this->resetAll();
    }
}

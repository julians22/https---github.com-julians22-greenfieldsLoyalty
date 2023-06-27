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

class BulkRedeemsTable extends DataTableComponent
{

    protected $listeners = ['exportRedeemsTable'];

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
        ];
    }

    public function query(): Builder
    {
        $query = Redeem::statusCreated()->with('user')->whereHas('user');
        return $query;
    }

    public function exportRedeemsTable() {
        $query = $this->rowsQuery();
        return Excel::download(new BulkRewardActionExport($query), 'BulkActions-Redeems-'. now()->format('Y-m-d h:i') .'.xlsx');
    }
}

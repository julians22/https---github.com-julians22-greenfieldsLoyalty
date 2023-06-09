<?php

namespace App\Http\Livewire\Backend;

use App\Domains\Auth\Models\User;
use App\Models\Redeem;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class RedeemsTable extends DataTableComponent
{

    public array $perPageAccepted = [5, 10, 50, 100];

    public string $defaultSortColumn = 'created_at';
    public string $defaultSortDirection = 'desc';

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
                    Redeem::STATUS_FAILED => 'Canceled',
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
                    return $query->orderBy(User::select('name')->whereColumn('users.id', 'redeems.user_id'), $direction);
                }),
            Column::make(__('Status'), 'status')
                ->sortable(),
            Column::make(__('Created Date'), 'created_at')
                ->sortable(),
            Column::make(__('Actions')),
        ];
    }

    public function query(): Builder
    {
        $query = Redeem::with('user')->whereHas('user');

        return $query;
    }

    /**
     * @return string
     */
    public function rowView(): string
    {
        return 'backend.redeems.includes.row';
    }
}

<?php

namespace App\Http\Livewire\Backend;

use App\Domains\Auth\Models\User;
use App\Exports\Backend\CustomerExport;
use App\Models\TopUp;
use Excel;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class CustomersTable extends DataTableComponent
{

    protected $listeners = ['exportCustomerTable'];

    public function columns(): array
    {
        return [
            Column::make(__('Name'), 'name')
                ->searchable()
                ->sortable(),
            Column::make(__('Phone Number'), 'phone')
                ->searchable(),
            Column::make(__('E-mail'), 'email'),
            Column::make(__('Point'), 'point')
                ->sortable(),
            Column::make(__('Total Top Up'), 'topups_count')
                ->sortable(),
            Column::make(__('Success Top Up'), 'success_topups_count')
                ->sortable(),
            Column::make(__('Failed Top Up'), 'failed_topups_count')
                ->sortable(),
            Column::make(__('Register At')),
            Column::make('Action')
        ];
    }

    public function query(): Builder
    {
        $query = User::users()
            ->withCount('topups as topups_count')
            ->withCount(['topups as failed_topups_count' => function (Builder $query){
                $query->where('status', TopUp::STATUS_FAILED);
            }])
            ->withCount(['topups as success_topups_count' => function (Builder $query){
                $query->where('status', TopUp::STATUS_SUCCESS);
            }]);

        return $query;
    }

    public function exportCustomerTable() {
        $query = $this->rowsQuery();
        return Excel::download(new CustomerExport($query), 'GreenFieldsKlubIbuExtra-Customer.xlsx');
    }

    /**
     * @return string
     */
    public function rowView(): string
    {
        return 'backend.customers.includes.row';
    }
}

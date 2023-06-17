<?php

namespace App\Http\Livewire\Backend;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class CustomersTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make(__('Name'), 'name'),
            Column::make(__('Phone Number'), 'phone'),
            Column::make(__('E-mail'), 'email'),
            Column::make(__('Point'), 'point')
        ];
    }

    public function query(): Builder
    {
        $query = User::users();

        return $query;
    }
}

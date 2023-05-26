<x-livewire-tables::bs4.table.cell>
    {{ $row->transaction_code }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    {{ $row->user->name }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('backend.topups.includes.status', ['topup' => $row])
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @displayDate($row->created_at)
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('backend.topups.includes.actions', ['topup' => $row])
</x-livewire-tables::bs4.table.cell>

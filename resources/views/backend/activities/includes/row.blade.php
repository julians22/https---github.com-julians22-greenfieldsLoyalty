<x-livewire-tables::bs4.table.cell>
    {{ $row->title }}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @if ($row->isComingSoon())
        Coming Soon
    @else
        On going {{ $row->date_ranges }}
    @endif
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @displayDate($row->updated_at)
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('backend.activities.includes.actions', ['activity' => $row])
</x-livewire-tables::bs4.table.cell>

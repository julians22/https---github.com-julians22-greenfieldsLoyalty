<x-livewire-tables::bs4.table.cell>
    <img src="{{ asset($row->image['desktopBanner']) }}" alt="" style="max-width: 200px; height: auto;">
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    <img src="{{ asset($row->image['mobileBanner']) }}" alt="" style="max-width: 100px; height: auto;">
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @displayDate($row->created_at)
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('backend.banners.includes.actions', ['banner' => $row])
</x-livewire-tables::bs4.table.cell>

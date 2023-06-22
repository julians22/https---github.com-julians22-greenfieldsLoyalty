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
    {!! $row->point ? number_format($row->point) : '<span class="badge badge-danger">'.__('-').'</span>' !!}
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @if ($row->isCompleted())
        <p class="mb-0" style="max-width: 200px">
            <small>
                {!! nl2br(e($row->note)) !!}
            </small>
        </p>
        @endif

    @if ($row->isFailed())
        <p class="mb-0" style="max-width: 200px">
            <small>
                {!! nl2br(e($row->failed_reason)) !!}
            </small>
        </p>
    @endif
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @displayDate($row->created_at)
</x-livewire-tables::bs4.table.cell>

<x-livewire-tables::bs4.table.cell>
    @include('backend.topups.includes.actions', ['topup' => $row])
</x-livewire-tables::bs4.table.cell>

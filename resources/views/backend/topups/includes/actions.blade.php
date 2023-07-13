<x-utils.view-button :href="route('admin.topup.show', $topup)" />
@if ($topup->isCreated() || $topup->isProcessed())
    <x-utils.process-button : :href="route('admin.topup.process', $topup)" />
    @endif

@if ($topup->isCompleted())
    <x-utils.edit-button : :href="route('admin.topup.modify', $topup)" />
@endif


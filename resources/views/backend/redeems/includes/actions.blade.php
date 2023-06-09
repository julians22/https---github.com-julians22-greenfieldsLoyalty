<x-utils.view-button :href="route('admin.redeem.show', $redeem)" />
@if ($redeem->isCreated())
    <x-utils.process-button : :href="route('admin.redeem.process', $redeem)" />
@endif


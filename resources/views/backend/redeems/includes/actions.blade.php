<x-utils.view-button :href="route('admin.redeem.show', $redeem)" />
@if ($redeem->isCreated() || $redeem->isProcessed() || $redeem->isFailed())
    <x-utils.process-button : :href="route('admin.redeem.process', $redeem)" />
@endif


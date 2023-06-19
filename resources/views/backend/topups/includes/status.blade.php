@if($topup->isCompleted())
    <span class='badge badge-success'>@lang('Completed')</span>
@else
    @if ($topup->isCreated())
        <span class='badge badge-warning'>@lang('Waitng to Process')</span>
    @elseif($topup->isProcessed())
        <span class='badge badge-info'>@lang('On Process')</span>
    @elseif($topup->isFailed())
        <span class='badge badge-danger'>@lang('Rejected')</span>
    @endif
@endif

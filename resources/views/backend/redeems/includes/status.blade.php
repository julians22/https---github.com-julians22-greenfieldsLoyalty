@if($redeem->isCompleted())
    <span class='badge badge-success'>@lang('Completed')</span>
@else
    @if ($redeem->isCreated())
        <span class='badge badge-warning'>@lang('Waitng to Process')</span>
    @elseif($redeem->isProcessed())
        <span class='badge badge-info'>@lang('On Process')</span>
    @elseif($redeem->isSend())
        <span class='badge badge-info'>@lang('On Send') {{ $redeem->courier }} || {{ $redeem->airwaybill }}</span>
    @elseif($redeem->isFailed())
        <span class='badge badge-danger'>@lang('Rejected')</span>
    @endif
@endif

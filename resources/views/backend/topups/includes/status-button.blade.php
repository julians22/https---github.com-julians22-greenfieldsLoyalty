@if($topup->isCompleted())
    <button class='btn btn-success btn-sm' disabled type="button">@lang('Completed')</button>
@else
    @if ($topup->isCreated())
        <button class='btn btn-warning btn-sm' disabled type="button">@lang('Waitng to Process')</button>
    @elseif($topup->isProcessed())
        <button class='btn btn-info btn-sm' disabled type="button">@lang('On Process')</button>
    @elseif($topup->isFailed())
        <button class='btn btn-danger btn-sm' disabled type="button">@lang('Rejected')</button>
    @endif
@endif

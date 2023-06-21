@if($redeem->isCompleted())
    <button class='btn btn-success btn-sm' disabled type="button">@lang('Completed')</button>
@else
    @if ($redeem->isCreated())
        <button class='btn btn-warning btn-sm' disabled type="button">@lang('Waitng to Process')</button>
        <x-utils.process-button :href="route('admin.redeem.process', $redeem)" />
    @elseif($redeem->isProcessed())
        <button class='btn btn-info btn-sm' disabled type="button">@lang('On Process')</button>
    @elseif($redeem->isSend())
        <button class='btn btn-info btn-sm' disabled type="button">@lang('On Send')</button>
        <x-utils.finish-button :href="route('admin.redeem.update.accept', $redeem)" />
    @elseif($redeem->isFailed())
        <button class='btn btn-danger btn-sm' disabled type="button">@lang('Delay')</button>
    @endif
@endif

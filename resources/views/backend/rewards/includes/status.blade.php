@if($reward->isPublished())
    <span class='badge badge-success'>@lang('Published')</span>
@else
    <span class='badge badge-danger'>@lang('Draft')</span>
@endif

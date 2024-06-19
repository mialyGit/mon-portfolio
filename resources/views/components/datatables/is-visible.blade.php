@props([
    'is_visible' => true,
])

@if ($is_visible)
    <span class="badge badge-success">@lang('ACTIVE')</span>
@else
    <span class="badge badge-danger">@lang('INACTIVE')</span>
@endif

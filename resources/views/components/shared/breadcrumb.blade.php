@props([
    'segments' => [],
])

<ul class="app-breadcrumb breadcrumb side">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.index') }}">
            <i class="fa fa-home fa-lg"></i>
        </a>
    </li>
    @foreach ($segments as $segment)
        <li class="breadcrumb-item">
            <a href="{{ $segment['url'] }}">@lang($segment['title'])</a>
        </li>
    @endforeach
    <li class="breadcrumb-item active">{{ $slot }}</li>
</ul>

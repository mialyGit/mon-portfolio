<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img src="{{ asset('assets/images/mialy.jpg') }}" class="rounded-circle" style="width: 50px;" alt="Avatar" />
        <div class="ml-2">
            <p class="app-sidebar__user-name">Mialison</p>
            <p class="app-sidebar__user-designation">@lang('Fullstack developer')</p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item" href="{{ route('dashboard.index') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">@lang('Dashboard')</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="{{ route('dashboard.profile') }}">
                <i class="app-menu__icon fa fa-user"></i>
                <span class="app-menu__label">@lang('Profile')</span>
            </a>
        </li>
        <li>
            <a class="app-menu__item" href="{{ route('dashboard.medias.index') }}">
                <i class="app-menu__icon fa fa-th-list"></i>
                <span class="app-menu__label">@lang('Medias')</span>
            </a>
        </li>
    </ul>
</aside>

<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>

        <ul class="list-unstyled menu-categories" id="accordionExample">

            @foreach ($menuItems as $menuItem)
                @if ($menuItem['show'])
                    <li class="menu">
                        <a href="{{ $menuItem['child'] ? '#item' . $loop->index : $menuItem['url'] }}" {{ $menuItem['child']
                            ? 'data-toggle=collapse' : '' }} data-active="{{ $menuItem['active'] ? 'true' : 'false' }}"
                            aria-expanded="{{ $menuItem['active'] ? 'true' : 'false' }}" class="dropdown-toggle">
                            <div class="">
                                <i data-feather="{{ $menuItem['icon'] }}"></i>
                                <span> {{ $menuItem['title'] }} </span>
                            </div>
                            @if ($menuItem['child'])
                            <div>
                                <i data-feather="chevron-right"></i>
                            </div>
                            @endif
                        </a>
                        @if ($menuItem['child'])
                            <ul class="collapse submenu list-unstyled {{ $menuItem['active'] ? 'show' : '' }}"
                                id="{{ 'item' . $loop->index }}" data-parent="#accordionExample">
                                @foreach ($menuItem['child'] as $menuItemChild)
                                    @if ($menuItemChild['show'])
                                        <li class="{{ $menuItemChild['active'] ? 'active' : '' }}">
                                            <a href="{{ $menuItemChild['url'] }}"> {{ $menuItemChild['title'] }} </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endif
            @endforeach
        </ul>

    </nav>

</div>

@push('script')
<script src="{{ asset('plugins/font-icons/feather/feather.min.js') }}"></script>
<script type="text/javascript">
    feather.replace();
</script>
@endpush

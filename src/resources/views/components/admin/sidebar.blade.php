<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-radius-lg fixed-start ms-2  bg-white my-2" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    </div>
    <hr class="horizontal dark mt-0 mb-2">

    <div class=" w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            @foreach ($sidebar_list as $sidebar_item)
                @if ($sidebar_item['is_show'])
                    <li class="nav-item">
                        <a class="nav-link {{ $sidebar_item['is_active'] ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ $sidebar_item['url'] }}">
                            <i class="material-symbols-rounded opacity-5">{{ $sidebar_item['icon']->value }}</i>
                            <span class="nav-link-text ms-1">{{ $sidebar_item['label'] }}</span>
                        </a>
                    </li>
                @endif
            @endforeach

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">マスタデータ</h6>
            </li>
            @foreach ($master_data_sidebar_list as $sidebar_item)
                @if ($sidebar_item['is_show'])
                    <li class="nav-item">
                        <a class="nav-link {{ $sidebar_item['is_active'] ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ $sidebar_item['url'] }}">
                            <i class="material-symbols-rounded opacity-5">{{ $sidebar_item['icon']->value }}</i>
                            <span class="nav-link-text ms-1">{{ $sidebar_item['label'] }}</span>
                        </a>
                    </li>
                @endif
            @endforeach

            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-5">アカウント</h6>
            </li>
            @foreach ($account_sidebar_list as $sidebar_item)
                @if ($sidebar_item['is_show'])
                    <li class="nav-item">
                        <a class="nav-link {{ $sidebar_item['is_active'] ? 'active bg-gradient-dark text-white' : 'text-dark' }}" href="{{ $sidebar_item['url'] }}">
                            <i class="material-symbols-rounded opacity-5">{{ $sidebar_item['icon']->value }}</i>
                            <span class="nav-link-text ms-1">{{ $sidebar_item['label'] }}</span>
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
</aside>
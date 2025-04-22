<header>
    <h3 class="title"><a href="{{ route('user.home.index') }}" aria-label="TOPへ移動">Nokuri</a></h1>
    <nav class="main-nav">
        <ul>
            @foreach ($header_list as $header_item)
                @if ($header_item['is_guest_display'] === true)
                    <li class="nav__item">
                        <a href="{{ $header_item['link'] }}">{{ $header_item['label'] }}</a>
                    </li>
                @endif
                @if ($header_item['is_guest_display'] === false && $is_user_login_in === true)
                    <li class="nav__item">
                        <a href="{{ $header_item['link'] }}">{{ $header_item['label'] }}</a>
                    </li>
                @endif
            @endforeach
        </ul>
    </nav>
    <nav class="auth-nav">
        @if ($is_user_login_in === true)
            <ul>
                <li class="user-name">{{ $user->name }}</li>
            </ul>
        @endif
        @if ($is_user_login_in === false)
            <ul>
                <li><a href="{{ route('user.register.index') }}">SignUp</a></li>
                <li><a href="{{ route('user.login.index') }}">SignIn</a></li>
            </ul>
        @endif
    </nav>
    <button class="hamburger" aria-label="メニュー" aria-controls="nav-menu" aria-expanded="false">
        <span class="hamburger__line"></span>
        <span class="hamburger__line"></span>
        <span class="hamburger__line"></span>
    </button>
    <nav id="nav-menu" class="nav" aria-hidden="true">
        <ul class="nav__list">
            @foreach ($header_list as $header_item)
                @if ($header_item['is_guest_display'] == true)
                    <li class="nav__item">
                        <a href="{{ $header_item['link'] }}" class="nav__link">{{ $header_item['label'] }}</a>
                    </li>
                @endif
            @endforeach
        </ul>
    </nav>
</header>
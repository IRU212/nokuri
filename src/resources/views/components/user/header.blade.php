<header>
    <h3 class="title"><a href="{{ route('user.home.index') }}" aria-label="TOPへ移動">Nokuri</a></h1>
    <nav class="main-nav">
        <ul>
            <li><a href="">目次</a></li>
            <li><a href="">おすすめの頻度</a></li>
            <li><a href="">おすすめの筋トレ</a></li>
            <li><a href="">おすすめの栄養素</a></li>
            <li><a href="">Wiki</a></li>
            <li><a href="">設定</a></li>
        </ul>
    </nav>
    <nav class="auth-nav">
        @if ($is_user_login_in === true)
            <ul>
                <li>{{ $user->name }}</li>
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
            <li class="nav__item"><a href="#" class="nav__link">目次</a></li>
            <li class="nav__item"><a href="#" class="nav__link">おすすめの頻度</a></li>
            <li class="nav__item"><a href="#" class="nav__link">おすすめの筋トレ</a></li>
            <li class="nav__item"><a href="#" class="nav__link">おすすめの栄養素</a></li>
            <li class="nav__item"><a href="#" class="nav__link">Wiki</a></li>
            <li class="nav__item"><a href="#" class="nav__link">設定</a></li>
        </ul>
    </nav>
</header>
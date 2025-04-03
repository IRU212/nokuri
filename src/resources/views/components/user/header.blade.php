<header class="user-login-header">
    <div class="user-content-contain">
        <div><a href="{{ route('user.home.index') }}">HOME</a></div>
        <div><a href="{{ route('user.recommendation.index') }}">おすすめ</a></div>
        <div><a href="{{ route('user.wiki.index') }}">Wiki</a></div>
        <div><a href="{{ route('user.inquiry.index') }}">お問い合わせ</a></div>
        <div><a href="{{ route('user.setting.index') }}">設定</a></div>
    </div>
    <div class="user-login-auth-contain">
        @if ($is_user_login_in)
            <div>{{ $user->name }}</div>
        @else
            <div><a href="{{ route('user.login.index') }}">ログイン</a></div>
            <div><a href="{{ route('user.register.index') }}">新規登録</a></div>
        @endif
    </div>
</header>
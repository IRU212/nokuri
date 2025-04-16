<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $meta->description }}">
    <meta name="author" content="okajima">
    <meta http-equiv="Content-Language" content="ja">
    <title>{{ $meta->title }}</title>
    <link rel="shortcut icon" href="{{ asset('/img/icon/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('/css/user/index.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="{{ asset('/js/index.js') }}" defer></script>
</head>
<body>
<x-user.header />
    <main>
        <x-common.flash_message name="message" />
        <h2 class="gest-title">アカウントログイン</h2>
        <section class="gest__container">
            <div class="field__group">
                <form action="{{ route('user.login.auth') }}" method="POST">
                    @csrf
                    <div class="field">
                        <label>メールアドレス</label>
                        <input type="email" name="email" value="">
                    </div>
                    <div class="field">
                        <label>パスワード</label>
                        <input type="password" name="password" value="" id="inputPassword">
                    </div>
                    <button type="submit">ログイン</button>
                </form>
                <div class="guidance__group">
                    <a href="{{ route('user.password_reset.index') }}" class="guidance_link">パスワードを忘れた方はこちら</a>
                    <a href="{{ route('user.register.index') }}" class="guidance_link">新規会員登録の方はこちら</a>
                </div>
            </div>
            <div class="social__group">
                <a href="{{ route('user.socialite.auth.redirect') }}" class="social__button">Googleでログイン</a>
                <a href="" class="social__button">LINEでログイン</a>
                <a href="" class="social__button">Yahoo JAPAN IDでログイン</a>
                <a href="" class="social__button">Facebookでログイン</a>
            </div>
        </section>
    </main>
    <x-user.footer />
</body>
</html>
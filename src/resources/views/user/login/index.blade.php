<x-user.layout :title="$title" :description="$description">
    <x-user.header />
    <main>
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
                    <a href="" class="guidance_link">パスワードを忘れた方はこちら</a>
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
</x-admin.layout>
<x-user.layout title="アカウント新規登録" description="">
    <x-user.header />
    <main>
        <h2 class="gest-title">アカウント新規登録</h2>
        <section class="gest__container">
            <div class="field__group">
                <form action="{{ route('user.register.pre_store') }}" method="post">
                    <div class="field">
                        <label>メールアドレス</label>
                        <input type="email">
                    </div>
                    <div class="field">
                        <label>パスワード</label>
                        <input type="password" id="inputPassword">
                    </div>
                    <button type="submit">新規登録</button>
                </form>
                <div class="guidance__group">
                    <a href="{{ route('user.login.index') }}" class="guidance_link">ログインの方はこちら</a>
                </div>
            </div>
            <div class="social__group">
                <a href="{{ route('user.socialite.auth.redirect') }}" class="social__button">Googleで新規登録</a>
                <a href="" class="social__button">LINEで新規登録</a>
                <a href="" class="social__button">Yahoo JAPAN IDで新規登録</a>
                <a href="" class="social__button">Facebookで新規登録</a>
            </div>
        </section>
    </main>
    <x-user.footer />
</x-user.layout>
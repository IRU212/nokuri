<x-user.layout :title="$title" :description="$description">
    <main class="user-login-body">
        <section class="user-login-wrap">
            <form action="">
                <div class="user-login-wrap-item user-login-icon-list">
                    <a href="{{ route('user.socialite.auth.redirect') }}" class="user-login-icon-item">
                        <img src="{{ asset('img/icon/google.png') }}" alt="">
                    </div>
                </div>
                <div class="user-login-wrap-item">
                    <div class="user-login-field">
                        <label for="">メールアドレス</label>
                        <input type="text">
                    </div>
                    <div class="user-login-field">
                        <label for="">パスワード</label>
                        <input type="password">
                    </div>
                    <div class="user-login-field">
                        <input type="submit" value="ログイン">
                    </div>
                </div>
            </form>
            <div class="user-login-wrap-item">
                <a href="">新規登録はこちら</a>
            </div>
        </section>
    </main>
</x-admin.layout>
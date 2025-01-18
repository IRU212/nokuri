<x-admin.layout :title="$title" :description="$description">
    <main class="admin-login-body">
        <section class="admin-login-wrap">
            <div class="admin-login-title">ログイン</div>
            <form class="admin-login-form" action="" method="POST">
                @csrf
                <div>
                    <div>
                        <label>メールアドレス</label>
                        <x-common.form.input_text name="email" />
                        <x-common.form.error_message name="email" />
                    </div>
                    <div>
                        <label>パスワード</label>
                        <x-common.form.input_text name="password" />
                        <x-common.form.error_message name="password" />
                    </div>
                </div>
                <input class="admin-login-button" type="submit" value="ログイン">
            </form>
        </section>
    </main>
</x-admin.layout>
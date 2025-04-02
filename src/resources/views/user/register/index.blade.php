<x-user.layout title="アカウント新規登録" description="">
    <main>
        @if (session('user_miss_register_message'))
            <section class="flash-message">{{ session('user_miss_register_message') }}</section>
        @endif
        <form action="{{ route('user.register.pre_store') }}" method="post">
            @csrf
            <div>
                <label>ユーザ名</label>
                <input type="text" name="name">
            </div>
            <div>
                <label>メールアドレス</label>
                <input type="text" name="email">
            </div>
            <div>
                <label>パスワード</label>
                <input type="password" name="password">
            </div>
            <input type="submit" name="登録">
        </form>
    </main>
</x-user.layout>
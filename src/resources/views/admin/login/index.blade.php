<form action="{{ route('admin.login.verify_email') }}" method="post">
    @csrf
    <div>
        <label for="">メールアドレス</label>
        <input type="text" name="email">
    </div>
    <div>
        <label for="">パスワード</label>
        <input type="text" name="password">
    </div>
    <button type="submit">ログイン</button>
</form>
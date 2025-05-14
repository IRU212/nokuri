<form action="{{ route('admin.login.auth') }}" method="post">
    @csrf
    <div>
        <label for="">コード</label>
        <input type="text" name="code">
    </div>
    <button type="submit">ログイン</button>
</form>
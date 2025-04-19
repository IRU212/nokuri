<x-user.mail>
    <h4>パスワードリセット</h4>
    <div>
        <div>以下のURLをクリックすると登録が完了します</div>
        <a href="{{ route('user.register.store', ['token' => $uncertified_user->token]) }}">{{ route('user.register.store', ['token' => $uncertified_user->token]) }}</a>
    </div>
</x-user.mail>
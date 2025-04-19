<x-user.mail>
    <h4>{{ config('app.name') }}への登録ありがとうございます</h4>
    <div>
        <div>以下のURLをクリックすると登録が完了します</div>
        <a href="{{ route('user.register.store', ['token' => $uncertified_user->token]) }}">{{ route('user.register.store', ['token' => $uncertified_user->token]) }}</a>
    </div>
</x-user.mail>
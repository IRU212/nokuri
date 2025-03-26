<x-user.layout description="" title="">
    <x-user.header />
    <main class="user-login-wrap">
        <form action="" method="post">
            @csrf
            <section class="user-setting-wrap">
                <div>
                    <label>名前</label>
                    <input type="text" name="name" value="{{ $user->name }}">
                </div>
                <div>
                    <label>メールアドレス</label>
                    <input type="text" name="email" value="{{ $user->email }}">
                </div>
                <div>
                    <label>都道府県</label>
                    <select name="prefecture">
                        <option value="">未設定</option>
                        @foreach ($Prefecture::cases() as $prefecture)
                            <option value="{{ $prefecture->value }}">{{ $prefecture->label() }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" value="変更">
            </section>
        </form>
    </main>
    <x-user.footer />
</x-user.layout>
<x-user.layout description="" title="">
    <x-user.header />
    <main class="user-login-wrap">
        <x-common.flash_message name='setting_update_message' />
        <section class="user-setting-wrap">
            <form action="{{ route('user.setting.update') }}" method="post">
                @csrf
                <h3>アカウント情報</h3>
                <div class="user-setting-label">
                    <label>名前</label>
                    <input type="text" name="name" value="{{ $user->name }}">
                </div>
                <div class="user-setting-label">
                    <label>メールアドレス</label>
                    <input type="text" name="email" value="{{ $user->email }}">
                </div>
                <div class="user-setting-label">
                    <label>都道府県</label>
                    <select name="prefecture">
                        @foreach ($prefecture::cases() as $prefecture)
                            <option value="{{ $prefecture->value }}">{{ $prefecture->label() }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="submit" value="変更">
            </form>
        </section>
        <section class="user-setting-wrap">
            <h3>認証情報</h3>
        </section>
    </main>
    <x-user.footer />
</x-user.layout>
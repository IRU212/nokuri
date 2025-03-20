<x-user.layout description="" title="">
    <x-user.header />
    <main class="user-login-wrap">
        <section class="user-inquiry-wrap">
            <form action="{{ route('user.inquiry.store') }}" method="post">
                @csrf
                <h3>お問い合わせ</h3>
                <div class="user-inquiry-content-wrap">
                    <div class="user-inquiry-content-field">
                        <label>お名前</label>
                        <input type="text" name="name" value="">
                    </div>
                    <div class="user-inquiry-content-field">
                        <label>メールアドレス</label>
                        <input type="text" name="email" value="">
                    </div>
                    <div class="user-inquiry-content-field">
                        <label>お問い合わせ内容</label>
                        <textarea name="content" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="user-inquiry-content-field">
                        <input type="submit" value="送信">
                    </div>
                </div>
            </form>
        </section>
    </main>
    <x-user.footer />
</x-user.layout>
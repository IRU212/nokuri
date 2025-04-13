<x-user.layout description="" title="">
    <x-user.header />
    <main class="user-login-wrap">
        <section class="setting__container">
            <h3 class="title">設定</h3>
            <div class="setting__group">
                <form action="{{ route('user.logout.store') }}" method="post">
                    @csrf
                    <button type="submit" class="setting__logout-button">ログアウト</button>
                </form>
            </div>
        </section>
    </main>
    <x-user.footer />
</x-user.layout>
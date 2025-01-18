<x-admin.layout :title="$title" :description="$description">
    <x-admin.header />
    <main class="admin-login-wrap">
        <section class="home-setting-user-container">
            <div class="home-setting-user-title">アカウント管理</div>
            <div class="home-setting-user-list">
                <div class="home-setting-user-item">アカウント情報編集</div>
                <div class="home-setting-user-item">
                    <form action="{{ route('admin.logout.clearAuth') }}" method="POST">
                        @csrf
                        <input type="submit" value="ログアウト">
                    </form>
                </div>
            </div>
        </section>
    </main>
</x-admin.layout>
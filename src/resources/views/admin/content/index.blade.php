<x-admin.layout :title="$title" :description="$description">
    <x-admin.header />
    <x-admin.breadcrumb :breadcrumbs="$breadcrumbs" />
    <main class="admin-login-wrap">
        <section class="content-link-list-wrap">
            <div class="content-link-title">コンテンツリンク一覧</div>
            <a class="content-link-item" href="{{ route('admin.user.index') }}">ユーザ</a>
            <a class="content-link-item" href="{{ route('admin.admin_user.index') }}">管理者ユーザ</a>
            <a class="content-link-item" href="{{ route('admin.news.index') }}">お知らせ</a>
        </section>
    </main>
</x-admin.layout>
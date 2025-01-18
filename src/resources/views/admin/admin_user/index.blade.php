<x-admin.layout :title="$title" :description="$description">
    <x-admin.header />
    <x-admin.breadcrumb :breadcrumbs="$breadcrumbs" />
    <main class="admin-login-wrap">
        <x-admin.sub_header :url="route('admin.admin_user.create')" :backUrl="route('admin.content.index')" />
        <section class="user-wrap">
            <table class="user-list">
                <tr class="user-list-header">
                    <th>ID</th>
                    <th>名前</th>
                    <th>メールアドレス</th>
                    <th>ステータス</th>
                    <th>作成日時</th>
                </tr>
                @foreach ($result['admin_user_list_paginate'] as $user)
                    <tr class="user-list-body">
                        <td @if($loop->last)class="user-list-last-item"@endif>{{ $user->id }}</td>
                        <td @if($loop->last)class="user-list-last-item"@endif>{{ $user->name }}</td>
                        <td @if($loop->last)class="user-list-last-item"@endif>{{ $user->email }}</td>
                        <td @if($loop->last)class="user-list-last-item"@endif>{{ $user->status }}</td>
                        <td @if($loop->last)class="user-list-last-item"@endif>{{ $user->created_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </table>
        </section>
    </main>
</x-admin.layout>
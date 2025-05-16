<x-admin.layout title="" description="">
    <x-admin.sidebar />
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-admin.navibar />
        <div class="container-fluid py-2">
            <h3 class="mb-4 h4 font-weight-bolder">お知らせ 一覧</h3>
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">タイトル</th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolderAuthor opacity-7">作成日</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($news_paginate as $news)
                                            <tr>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">{{ $news->title }}</p>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span class="text-secondary text-xs font-weight-bold">{{ $news->created_at->format('Y-m-d') }}</span>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">編集</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-admin.footer />
        </div>
    </main>
</x-admin.layout>

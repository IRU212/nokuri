<x-admin.layout :title="$title" :description="$description">
    <x-admin.header />
    <main class="admin-login-wrap">
        <section class="home-news-wrap">
            <div class="home-news-title">お知らせ</div>
            <div class="home-news-list">
                @foreach ($news_list as $news)
                    <div class="home-news-item">
                        <div class="home-news-item-link"><a href="">{{ $news->title }}</a></div>
                    </div>
                @endforeach
            </div>
        </section>
    </main>
</x-admin.layout>
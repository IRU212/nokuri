<x-user.layout description="" title="">
    <x-user.header />
    <main>
        <ul class="home__menu__container" id="slide-wrapper">
            @foreach ($banners as $loop => $banner)
                <li class="home__menu__slider__img_block" id="indicator">
                    <img src="{{ $banner['image'] }}" alt="バナー画像{{ $loop->index + 1 }}">
                </li>
            @endforeach
        </ul>
        <section class="home__news__container">
            <h3 class="title">お知らせ</h3>
            <ul class="news__list">
                @foreach ($news_list as $news)
                    <li class="news__card">
                        <div class="news__item__date">2024/12/31</div>
                        <div class="news__item__content">{{ $news['title'] }}</div>
                    </li>
                @endforeach
            </div>
        </section>
    </main>
    <x-user.footer />
</x-user.layout>
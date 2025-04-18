<x-user.layout description="" title="">
    <x-user.header />
    <main>
        <section class="work-out__container">
            <h3 class="title">筋トレメニュー一覧</h3>
            <ul class="work-out__group">
                @foreach ($work_outs as $work_out)
                    <li class="work-out__card">
                        <div class="work-out__card__title">「{{ $work_out->name }}」</div>
                        <div class="work-out__card__description">
                            ベンチプレスとなります。ベンチプレスとなります。ベンチプレスとなります。ベンチプレスとなります。
                            ベンチプレスとなります。ベンチプレスとなります。ベンチプレスとなります。ベンチプレスとなります。
                            ベンチプレスとなります。ベンチプレスとなります。ベンチプレスとなります。ベンチプレスとなります。
                            ベンチプレスとなります。ベンチプレスとなります。ベンチプレスとなります。ベンチプレスとなります。
                        </div>
                    </li>
                @endforeach
            </ul>
        </section>
    </main>
    <x-user.footer />
</x-user.layout>
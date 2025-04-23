<x-admin.layout title="" description="">
    <x-admin.sidebar />
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-admin.navibar />
        <div class="container-fluid py-2">
            <div class="ms-3">
                <h3 class="mb-4 h4 font-weight-bolder">都道府県 編集</h3>
                <form action="" method="post">
                    @csrf
                    <x-common.form.input_text class="input-group input-group-outline mb-4" name="name" label="コード" value="{{ $prefecture->code }}" />
                    <x-common.form.input_text class="input-group input-group-outline mb-4" name="name" label="名前" value="{{ $prefecture->name }}" />
                    <x-common.form.input_text class="input-group input-group-outline mb-4" name="name" label="県庁所在地" value="{{ $prefecture->prefectural_capital }}" />
                    <button type="submit" class="btn btn-secondary">更新</button>
                </form>
            </div>
            <x-admin.footer />
        </div>
    </main>
</x-admin.layout>
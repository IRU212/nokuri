<x-admin.layout title="" description="">
    <x-admin.sidebar />
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-admin.navibar />
        <div class="container-fluid py-2">
            <div class="ms-3">
                <h3 class="mb-4 h4 font-weight-bolder">ユーザ 編集</h3>
                <form action="" method="post">
                    @csrf
                    <x-common.form.input_text class="input-group input-group-outline mb-4" name="name" label="ユーザ名" value="{{ $user->name }}" />
                    <x-common.form.input_text class="input-group input-group-outline mb-4" name="email" label="メールアドレス" value="{{ $user->email }}" />
                    <x-common.form.input_text class="input-group input-group-outline mb-4" name="password" label="パスワード" value="{{ $user->password }}" />
                    <x-common.form.select class="input-group input-group-static mb-4" name="prefecture" label="出身都道府県" />
                    <x-common.form.select class="input-group input-group-static mb-4" name="prefecture" label="出身市区町村" />
                    <x-common.form.input_text class="input-group input-group-outline mb-4" name="age" label="年齢" value="{{ $user->age }}" />
                    <x-common.form.input_text class="input-group input-group-outline mb-4" name="height" label="身長" value="{{ $user->height }}" />
                    <x-common.form.input_text class="input-group input-group-outline mb-4" name="weight" label="体重" value="{{ $user->weight }}" />
                    <x-common.form.select class="input-group input-group-static mb-4" name="gender" label="血液型" />
                    <button type="submit" class="btn btn-secondary">更新</button>
                </form>
            </div>
            <x-admin.footer />
        </div>
    </main>
</x-admin.layout>
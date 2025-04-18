<x-admin.layout title="" description="">
    <x-admin.sidebar />
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-admin.navibar />
        <div class="container-fluid py-2">
            <div class="ms-3">
                <h3 class="mb-4 h4 font-weight-bolder">ユーザ 登録</h3>
                <form action="" method="post">
                    <div class="input-group input-group-outline mb-4">
                        <label class="form-label">ユーザ名</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-4">
                        <label class="form-label">メールアドレス</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-4">
                        <label class="form-label">パスワード</label>
                        <input type="text" name="password" class="form-control">
                    </div>
                    <div class="input-group input-group-static mb-4">
                        <label for="exampleFormControlSelect1" class="ms-0">出身都道府県</label>
                        <select name="prefecture" class="form-control" id="exampleFormControlSelect1">
                        <option value="">選択なし</option>
                        </select>
                    </div>
                    <div class="input-group input-group-static mb-4">
                        <label for="exampleFormControlSelect1" class="ms-0">出身市区町村</label>
                        <select name="prefecture" class="form-control" id="exampleFormControlSelect1">
                        <option value="">選択なし</option>
                        </select>
                    </div>
                    <div class="input-group input-group-outline mb-4">
                        <label class="form-label">年齢</label>
                        <input type="text" name="age" class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-4">
                        <label class="form-label">身長</label>
                        <input type="text" name="age" class="form-control">
                    </div>
                    <div class="input-group input-group-outline mb-4">
                        <label class="form-label">体重</label>
                        <input type="text" name="age" class="form-control">
                    </div>
                    <div class="input-group input-group-static mb-4">
                        <label for="exampleFormControlSelect1" class="ms-0">性別</label>
                        <select name="prefecture" class="form-control" id="exampleFormControlSelect1">
                        <option value="">選択なし</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-secondary">登録</button>
                </form>
            </div>
            <x-admin.footer />
        </div>
    </main>
</x-admin.layout>
<x-admin.layout title="" description="">
    <x-admin.sidebar />
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-admin.navibar />
        <div class="container-fluid py-2">
            <h3 class="mb-4 h4 font-weight-bolder">都道府県 一覧</h3>
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">種目名</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">主に鍛えられる部位</th>
                                            <th class="text-secondary opacity-7"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($work_outs as $work_out)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $work_out->id }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">{{ $work_out->name }}</p>
                                                </td>
                                                <td>
                                                    <p class="text-xs text-secondary mb-0">{{ $work_out->main_specific_area->label() }}</p>
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

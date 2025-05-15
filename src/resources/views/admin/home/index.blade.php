<x-admin.layout title="" description="">
    <x-admin.sidebar />
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-admin.navibar />
        <div class="container-fluid py-2">
            <div class="row">
                <div class="ms-3">
                    <h3 class="mb-4 h4 font-weight-bolder">ホーム</h3>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-2 ps-3">
                            <div class="d-flex justify-content-between">
                            <div>
                                <p class="text-sm mb-0 text-capitalize">ユーザ合計数</p>
                                <h4 class="mb-0">{{ $user_count }}</h4>
                            </div>
                            <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                <i class="material-symbols-rounded opacity-10">person</i>
                            </div>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-2 ps-3">
                            <p class="mb-0 text-sm"><span class="text-success font-weight-bolder">+3% </span>than last month</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-2 ps-3">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-sm mb-0 text-capitalize">ユーザ登録数(本日)</p>
                                    <h4 class="mb-0">{{ $user_today_count }}</h4>
                                </div>
                                <div class="icon icon-md icon-shape bg-gradient-dark shadow-dark shadow text-center border-radius-lg">
                                    <i class="material-symbols-rounded opacity-10">person</i>
                                </div>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-2 ps-3">
                            <p class="mb-0 text-sm"><span class="text-success font-weight-bolder">+3% </span>than last month</p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <x-admin.footer />
        </div>
    </main>
</x-admin.layout>
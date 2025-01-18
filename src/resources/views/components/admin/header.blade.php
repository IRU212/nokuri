<header class="admin-header">
    <div class="admin-header-home">
        <a href="{{ route('admin.home.index') }}">ホーム</a>
    </div>
    <div class="admin-header-link-list">
        <div class="admin-header-link-item">検索</div>
        <div class="admin-header-link-item">
            <a href="{{ route('admin.content.index') }}">コンテンツ</a>
        </div>
        <div class="admin-header-link-item">コミュニケーション</div>
        <div class="admin-header-link-item">監視</div>
        <div class="admin-header-link-item">
            <a href="{{ route('admin.setting.index') }}">設定</a>
        </div>
    </div>
    <div class="admin-header-login">
        <div class="admin-header-login-status">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQn8GexNE07gAR_lwFDvBFrF_P-L_N-tuvQFw&s" alt="管理者アイコン">
        </div>
        <div class="admin-header-login-name">{{ $login_admin_user->name }}</div>
    </div>
</header>
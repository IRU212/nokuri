<?php

namespace App\View\Components\Admin;

use App\Enum\AdminSidebarIconType;
use App\Enum\AdminSidebarType;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

final class Sidebar extends Component
{
    /**
     * サイドバー一覧
     *
     * @var array
     */
    public array $sidebar_list = [];

    /**
     * マスタデータサイドバー一覧
     *
     * @var array
     */
    public array $master_data_sidebar_list = [];

    /**
     * アカウントサイドバー一覧
     *
     * @var array
     */
    public array $account_sidebar_list = [];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->setSidebarList();
    }

    /**
     * サイドバーをセットします
     *
     * @return void
     */
    private function setSidebarList(): void
    {
        $admin_sidebar_type = AdminSidebarType::class;
        $admin_sidebar_icon_type = AdminSidebarIconType::class;

        // デフォルト
        $this->setSideBarItem(route('admin.home.index'), 'ホーム', $admin_sidebar_type::NORMAL, $admin_sidebar_icon_type::DASHBOARD, true);
        $this->setSideBarItem(route('admin.user.index'), 'ユーザ', $admin_sidebar_type::NORMAL, $admin_sidebar_icon_type::TABLE_VIEW, true);
        $this->setSideBarItem('', '管理者', $admin_sidebar_type::NORMAL, $admin_sidebar_icon_type::TABLE_VIEW, false);
        $this->setSideBarItem('', 'バナー', $admin_sidebar_type::NORMAL, $admin_sidebar_icon_type::TABLE_VIEW, false);
        $this->setSideBarItem('', '問い合わせ', $admin_sidebar_type::NORMAL, $admin_sidebar_icon_type::TABLE_VIEW, false);
        $this->setSideBarItem('', '連携サービス', $admin_sidebar_type::NORMAL, $admin_sidebar_icon_type::TABLE_VIEW, false);
        // マスタデータ
        $this->setSideBarItem('', 'ユーザ権限', $admin_sidebar_type::MASTER, $admin_sidebar_icon_type::TABLE_VIEW, false);
        $this->setSideBarItem(route('admin.admin_role.index'), '管理者権限', $admin_sidebar_type::MASTER, $admin_sidebar_icon_type::TABLE_VIEW, true);
        $this->setSideBarItem(route('admin.work_out.index'), '筋トレメニュー', $admin_sidebar_type::MASTER, $admin_sidebar_icon_type::TABLE_VIEW, true);
        $this->setSideBarItem(route('admin.prefecture.index'), '都道府県', $admin_sidebar_type::MASTER, $admin_sidebar_icon_type::TABLE_VIEW, true);
        $this->setSideBarItem('', '市区町村', $admin_sidebar_type::MASTER, $admin_sidebar_icon_type::TABLE_VIEW, false);
        // アカウント
        $this->setSideBarItem('', 'プロフィール', $admin_sidebar_type::ACCOUNT, $admin_sidebar_icon_type::PERSON, false);
        $this->setSideBarItem(route('admin.logout.clear_auth'), 'ログアウト', $admin_sidebar_type::ACCOUNT, $admin_sidebar_icon_type::LOGIN, true);
    }

    /**
     * サイドバーのアイテムをセットします
     *
     * @param string $url
     * @param string $label
     * @param AdminSidebarType $type
     * @param AdminSidebarIconType $icon
     * @param boolean $is_show
     * @return void
     */
    private function setSideBarItem(string $url, string $label, AdminSidebarType $type, AdminSidebarIconType $icon, bool $is_show): void
    {
        $item = [
            'url'       => $url,
            'label'     => $label,
            'icon'      => $icon,
            'is_active' => url()->current() === $url,
            'is_show'   => $is_show
        ];

        match ($type) {
            AdminSidebarType::NORMAL    => $this->sidebar_list[] = $item,
            AdminSidebarType::MASTER    => $this->master_data_sidebar_list[] = $item,
            AdminSidebarType::ACCOUNT   => $this->account_sidebar_list[] = $item,
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.sidebar');
    }
}

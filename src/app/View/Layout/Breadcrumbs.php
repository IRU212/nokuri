<?php

namespace App\View\Layout;

final class Breadcrumbs
{
    /**
     * パンくずリスト
     *
     * @var array
     */
    public array $breadcrumbs = [];

    /**
     * パンくずリストを追加していきます
     *
     * @param array $breadcrumb
     * @return void
     */
    public function addBreadcrumb(array $breadcrumb): void
    {
        $this->breadcrumbs[] = $breadcrumb;
    }

    /**
     * オブジェクトを配列化します
     *
     * @return array
     */
    public function toArray(): array
    {
        return \get_object_vars($this);
    }
}

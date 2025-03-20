<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

final class WikiController extends Controller
{
    /**
     * Wiki画面を表示します
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        return view('user.wiki.index');
    }
}

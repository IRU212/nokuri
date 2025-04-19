<?php

namespace App\Http\Controllers\User;

use App\Actions\User\WorkOut\UserWorkOutIndexAction;
use App\Http\Controllers\Controller;

final class WorkOutController extends Controller
{
    public function index(UserWorkOutIndexAction $action): \Illuminate\Contracts\View\View
    {
        return view('user.work_out.index', $action());
    }
}

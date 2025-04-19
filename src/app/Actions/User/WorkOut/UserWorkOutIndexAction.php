<?php

namespace App\Actions\User\WorkOut;

use App\Models\WorkOut;

final class UserWorkOutIndexAction
{
    public function __invoke()
    {
        return [
            'work_outs' => WorkOut::query()->select(['id', 'name'])->display()->limit(9)->get(),
        ];
    }
}

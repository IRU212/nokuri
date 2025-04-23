<?php

namespace App\Actions\User\Recommendation;

use App\Models\WorkOut;

final class UserRecommendationMuscleTrainingAction
{
    /**
     * おすすめ筋トレメニューを取得
     *
     * @return array
     */
    public function __invoke(): array
    {
        $work_out = new WorkOut();
        $work_outs = $work_out->query()
            ->select(['name', 'is_exercise_equipment', 'is_bodyweight'])
            ->get()
            ->toArray();

        return [];
    }
}

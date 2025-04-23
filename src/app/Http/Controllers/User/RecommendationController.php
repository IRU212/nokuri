<?php

namespace App\Http\Controllers\User;

use App\Actions\User\Recommendation\UseRecommendationIndexAction;
use App\Actions\User\Recommendation\UserRecommendationMuscleTrainingAction;
use App\Http\Controllers\Controller;

final class RecommendationController extends Controller
{
    /**
     * おすすめ画面を表示します
     *
     * @param UseRecommendationIndexAction $action
     * @return \Illuminate\Contracts\View\View
     */
    public function index(UseRecommendationIndexAction $action): \Illuminate\Contracts\View\View
    {
        $result = $action();

        return view('user.recommendation.index', $result);
    }

    /**
     * おすすめの筋トレメニューを表示します
     *
     * @param UserRecommendationMuscleTrainingAction $action
     * @return \Illuminate\Contracts\View\View
     */
    public function muscleTraining(UserRecommendationMuscleTrainingAction $action): \Illuminate\Contracts\View\View
    {
        return view('user.recommendation.muscle_training', $action());
    }
}

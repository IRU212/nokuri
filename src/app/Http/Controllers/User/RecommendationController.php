<?php

namespace App\Http\Controllers\User;

use App\Actions\User\Recommendation\UseRecommendationIndexAction;
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
        $weather_data = $result['weather_data'];
        $work_out_list = $result['work_out_list'];

        return view('user.recommendation.index', compact('weather_data', 'work_out_list'));
    }
}

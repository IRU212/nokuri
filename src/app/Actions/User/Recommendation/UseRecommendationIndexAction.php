<?php

namespace App\Actions\User\Recommendation;

use App\Models\User;
use App\Models\WorkOut;
use App\Services\UserLoginService;
use App\Services\WeatherService;

final class UseRecommendationIndexAction
{
    /**
     * おすすめ画面の情報を取得します
     *
     * @return array
     */
    public function __invoke(): array
    {
        $work_out = new WorkOut();
        $user = UserLoginService::user();
        $prefecture = $user?->prefecture;

        if ($prefecture === null) {
            return [
                'weather_data' => [],
                'work_out_list' => $work_out->limit(10)->get()->toArray(),
            ];
        }

        $weather_service = new WeatherService();
        $weather_data = $weather_service->getWeatheArrayrData('Tokyo', ['temp', 'humidity', 'weather', 'city']);

        if ($weather_data['weather_is_situation']) {
            $exercise_equipment_work_out_count = 7;
            $bodyweight_work_out_count = 3;
        } else {
            $exercise_equipment_work_out_count = 3;
            $bodyweight_work_out_count = 7;
        }

        $exercise_equipment_work_out = $work_out->where('is_exercise_equipment', true)->limit($exercise_equipment_work_out_count)->get();
        $bodyweight_work_out = $work_out->where('is_bodyweight', true)->limit($bodyweight_work_out_count)->get();
        $work_out_list = $exercise_equipment_work_out->union($bodyweight_work_out)->toArray();

        return [
            'weather_data' => $weather_data,
            'work_out_list' => $work_out_list,
        ];
    }
}

<?php

namespace App\Actions\User\Recommendation;

use App\Models\WorkOut;
use App\Services\WeatherService;
use Exception;

final class UseRecommendationIndexAction
{
    /**
     * おすすめ画面の情報を取得します
     *
     * @return array
     */
    public function __invoke(): array
    {
        $weather_service = new WeatherService();
        try {
            $weather_data = $weather_service->getWeatheArrayrData('Tokyo', ['temp', 'humidity', 'weather', 'city']);
        } catch (Exception $e) {
            //throw $th;
        }

        $work_out = new WorkOut();
        $exercise_equipment_work_out_count = null;
        $bodyweight_work_out_count = null;

        if ($weather_data['weather_is_situation']) {
            $exercise_equipment_work_out_count = 7;
            $bodyweight_work_out_count = 3;
        } else {
            $exercise_equipment_work_out_count = 3;
            $bodyweight_work_out_count = 7;
        }

        $exercise_equipment_work_out = $work_out->query()->where('is_exercise_equipment', true)->limit($exercise_equipment_work_out_count)->get();
        $bodyweight_work_out = $work_out->query()->where('is_bodyweight', true)->limit($bodyweight_work_out_count)->get();
        $work_out_list = $exercise_equipment_work_out->union($bodyweight_work_out)->toArray();

        $ip_address = $_SERVER['REMOTE_ADDR'];
        dd($ip_address);

        return [
            'weather_data' => $weather_data,
            'work_out_list' => $work_out_list,
        ];
    }
}

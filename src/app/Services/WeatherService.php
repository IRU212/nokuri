<?php

namespace App\Services;

use App\Enum\Weather;
use GuzzleHttp\Client;

final class WeatherService
{
    /**
     * @var string
     */
    private readonly string $api_key;

    /**
     * @var string
     */
    private readonly string $base_url;

    /**
     * @var Client
     */
    private readonly Client $client;

    /**
     * @var string
     */
    private readonly string $lang;

    /**
     * 初期化処理
     */
    public function __construct()
    {
        $this->api_key = '8c53b231c06b227375ed1a70dcae3b71';
        $this->base_url = 'http://api.openweathermap.org/data/2.5/weather';
        $this->client = new  Client();
        $this->lang = 'ja';
    }

    /**
     * 天気データを配列で取得します
     *
     * @param string $city
     * @param array $column
     * @return array
     */
    public function getWeatheArrayrData(string $city, array $column = ["*"]): array
    {
        $response = $this->client->request('GET', "{$this->base_url}?units=metric&q={$city}&APPID={$this->api_key}&lang={$this->lang}");
        $json_weather_array_data = json_decode($response->getBody(), true);

        if ($column === ["*"]) {
            return $json_weather_array_data;
        }

        $result = [];

        // 気温
        if (in_array('temp', $column)) {
            $result['temp'] = "{$json_weather_array_data['main']['temp']}℃";
        }
        // 温度
        if (in_array('humidity', $column)) {
            $result['humidity'] = "{$json_weather_array_data['main']['humidity']}℃";
        }
        // 天気
        if (in_array('weather', $column)) {
            $weather_enum = Weather::from($json_weather_array_data['weather'][0]['main']);
            $result['weather_jp'] = $weather_enum->label();
            $result['weather_is_situation'] = $weather_enum->isSituation();
        }
        // 都市
        if (in_array('city', $column)) {
            $result['city'] = $json_weather_array_data['name'];
        }

        return $result;
    }
}

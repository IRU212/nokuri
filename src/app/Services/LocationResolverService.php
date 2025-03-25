<?php

namespace App\Services;

use Exception;

/**
 * ドキュメントURL
 * https://developers.google.com/maps/documentation/geocoding/start?hl=ja
 */
final class LocationResolverService
{
    private readonly string $api_key;

    /**
     * 経度
     */
    private readonly string $longitude;

    /**
     * 緯度
     */
    private readonly string $latitude;

    public function __construct(string $longitude, string $latitude)
    {
        $this->api_key = '';
        $this->longitude = $longitude;
        $this->latitude = $latitude;
    }

    /**
     * 都道府県を取得します
     */
    public function getPrefectureEn(): string|false
    {
        $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng={$this->latitude},{$this->longitude}&key={$this->api_key}";
    
        try {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);
    
            $data = json_decode($response, true);

            if ($data['status'] !== 'OK') {
                throw new Exception('住所の取得に失敗しました。');
            }
    
            return $data['results']['address_components']['long_name'];
        } catch (Exception $e) {
            return false;
        }
    }
}

<?php
namespace Digicraft\AirVisual;

abstract class Repository
{
    /**
     * Air visual base URL
     *
     * @var string
     */
    const AIR_VISUAL_URL = "https://api.airvisual.com/v2/";




    /**
     * Get data throught Get Request
     *
     * @param string $uri
     * @param array $requestBody
     * @return string
     */
    protected function get(string $uri, array $requestBody)
    {
        return self::staticGet($uri, $requestBody, $this->httpClient);
    }

    /**
     * Get data throught Get Request
     *
     * @param string $uri
     * @param array $requestBody
     * @return string
     */
    protected static function staticGet(string $uri, array $requestBody = [], $ip = null)
    {
        $apiKey = config('airvisual.api_key');

        $endPoint = self::AIR_VISUAL_URL."$uri?key=$apiKey";
        foreach ($requestBody as $key => $value) {
            $endPoint.="&$key=$value";
        }

        $curl = curl_init();

        if ($ip != null) {
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                "key: $key",
                "x-forwarded-for: $ip"
            ));
        }

        curl_setopt_array($curl, array(
            CURLOPT_URL => $endPoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        return $response;
    }
}

<?php
namespace Digicraft\AirVisual;

class AirVisualRepository extends Repository
{
    /**
     * Get Countries are supported by AirVisual API
     *
     * @return array
     */
    public static function getSupportedCountries()
    {
        $data = json_decode(self::staticGet('countries'), true);
        return $data;
    }

    /**
     * Get States of given country supported by AirVisual API
     *
     * @param string $country
     * @return array
     */
    public static function getSupportedStates(string $country)
    {
        $data = json_decode(self::staticGet('states', compact('country')), true);
        return $data;
    }

    /**
     * Get Cities supported by AirVisual API giving a country and state param
     *
     * @param string $country
     * @param string $state
     * @return array
     */
    public static function getSupportedCities(string $country, string $state)
    {
        $data = json_decode(self::staticGet('cities', compact('country', 'state')), true);
        return $data;
    }

    /**
     * Get nearest city data (GPS coordinates)
     *
     * @param string $longitude
     * @param string $latitude
     * @return array
     */
    public static function getNearestCityData($lon, $lat)
    {
        $data = json_decode(self::staticGet('nearest_city', compact('lon', 'lat')), true);
        return $data;
    }

    /**
     * Get specified city data
     *
     * @param string $country
     * @param string $state
     * @param string $city
     * @return string
     */
    public static function getCityData(string $country, string $state, string $city)
    {
        $data = json_decode(self::staticGet('city', compact('country', 'state', 'city')), true);
        return $data;
    }
}

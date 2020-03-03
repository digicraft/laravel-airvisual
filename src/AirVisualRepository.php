<?php
namespace Digicraft\AirVisual;

class AirVisualRepository extends Repository
{
    /**
     * Get Countries are supported by AirVisual API
     *
     * @return string
     */
    public static function getSupportedCountries()
    {
        return self::staticGet('countries');
    }

    /**
     * Get States of given country supported by AirVisual API
     *
     * @param string $country
     * @return string
     */
    public static function getSupportedStates(string $country)
    {
        return self::staticGet('states', compact('country'));
    }

    /**
     * Get Cities supported by AirVisual API giving a country and state param
     *
     * @param string $country
     * @param string $state
     * @return string
     */
    public static function getSupportedCities(string $country, string $state)
    {
        return self::staticGet('cities', compact('country', 'state'));
    }

    /**
     * Get nearest city data (GPS coordinates)
     *
     * @param string $longitude
     * @param string $latitude
     * @return string
     */
    public static function getNearestCityData($lon, $lat)
    {
        return self::staticGet('nearest_city', compact('lon', 'lat'));
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
        return self::staticGet('city', compact('country', 'state', 'city'));
    }
}

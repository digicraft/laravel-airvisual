# Laravel AirVisual

AirVisual is a platform to explore the air quality anywhere in the world  

Laravel AirVisual is a API Client configured for "Plug and play"

## Installation

Install the package with Composer:

    composer require digicraft/laravel-airvisual

Now you can add directly to your `.env` file the `AIR_VISUAL_API_KEY` value, setting up your platform api key.

Otherwise you can setup the airvisual config file

    php artisan vendor:publish --tag=config


## Usage

AirVisualClient has a easy access static Repository.

```php
use Digicraft\AirVisualRepository;


// Get Countries are supported by AirVisual API
AirVisualRepository::getSupportedCountries();


// Get States of given country supported by AirVisual API
AirVisualRepository::getSupportedStates($country);


// Get Cities supported by AirVisual API giving a country and state param
AirVisualRepository::getSupportedCities($country, $state);


// Get nearest city data (GPS coordinates)
AirVisualRepository::getNearestCityData($lat, $long);

// Get nearest city data (IP)
AirVisualRepository::getNearestIpCityData($ip);


// Get specified city data
AirVisualRepository::getCityData($country, $state, $city);

```

## License

AirVisualClient is open-sourced software licensed under the [MIT license](LICENSE.md).

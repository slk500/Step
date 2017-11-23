<?php

return [
    'url_geocode' => getenv('URL_GEOCODE') ?: 'https://maps.googleapis.com/maps/api/geocode/json',
    'url_space_station' => getenv('URL_WHERETHEISS') ?: 'https://api.wheretheiss.at/v1/satellites/'
];
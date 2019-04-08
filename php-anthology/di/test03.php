<?php

/*
class GoogleMaps
{
    public function getCoordinatesFromAddress($address)
    {

    }
}

class OpenStreetMap
{
    public function getCoordinatesFromAddress($address) 
    {

    }
}
 */

/*
class StoreService
{
    public function getStoreCoordinates($store)
    {
        $geoLocationService = new GoogleMaps();
        return $geoLocationService->getCoordinatesFromAddress($store->getAddress());
    }
}
 */

interface GeoLocationService
{
    public function getCoordinatesFromAddress($address);
}

class GoogleMaps implements GeoLocationService
{
    // ..
}

class OpenStreetMaps implements GeoLocationService
{
    //
}

class StoreService
{
    private $geoLocationService;

    public function __construct(GeoLocationService $geoLocationService)
    {
        $this->geoLocationService = $geoLocationService;
    }

    public function getStoreCoordinates($store)
    {
        return $this->geoLocationService->getCoordinatesFromAddress($store->getAddress());
    }
}

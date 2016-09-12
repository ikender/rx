<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;

class DistanceController extends Controller
{
   /**
    * This is a little better than a Haversine formula, and should be quicker with multiple queries
    * What we are doing is fetching a series of locations by distance, as the crow flies, from a central point
    * 
    * I would love to make the query more elegant, but there are a great number of 
    */
   public function getLocations()
   {

      $distance_unit_names        = ['69' => 'miles', '60' => 'nautical miles', '111.045' => 'kilometers', '552' => 'furlongs'];
      $lat_lon                    = isset($_REQUEST['lat_lon'])        ? $_REQUEST['lat_lon']        : '38.9:-94.8';
      list($latpoint, $longpoint) = explode(":", $lat_lon);
	  $limit                      = isset($_REQUEST['qty'])            ? $_REQUEST['qty']            :  '5';
	  $radius                     = isset($_REQUEST['distance'])       ? $_REQUEST['distance']       : '10';
	  $distance_units             = isset($_REQUEST['distance_units']) ? $_REQUEST['distance_units'] : '69';
	  $distance_name              = $distance_unit_names[$distance_units];

      $results = DB::select(DB::raw('
        SELECT z.id, z.name, z.address, z.city, z.state, z.zip, z.latitude, z.longitude, (p.distance_unit 
          * DEGREES(ACOS(COS(RADIANS(p.latpoint)) 
          * COS(RADIANS(z.latitude)) 
          * COS(RADIANS(p.longpoint) - RADIANS(z.longitude)) 
          + SIN(RADIANS(p.latpoint)) 
          * SIN(RADIANS(z.latitude))))) 
        AS distance 
        FROM locations AS z 
        JOIN ( 
          SELECT ' . $latpoint       . ' AS latpoint, 
                 ' . $longpoint      . ' AS longpoint, 
                 ' . $radius         . ' AS radius, 
                 ' . $distance_units . ' AS distance_unit 
        ) AS p 
        WHERE z.latitude 
          BETWEEN p.latpoint  - (p.radius / p.distance_unit) 
          AND     p.latpoint  + (p.radius / p.distance_unit) 
        AND   z.longitude 
          BETWEEN p.longpoint - (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint)))) 
          AND     p.longpoint + (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint)))) 
        ORDER BY distance 
        LIMIT ' . $limit . '
      '));

      return view('results', ['results' => $results, 'distance_name' => $distance_name]);
   }
}

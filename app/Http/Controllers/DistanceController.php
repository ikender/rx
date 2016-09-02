<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Controllers\Controller;

class DistanceController extends Controller
{
    public function getLocations()
    {

      $distance_unit_names        = ['69' => 'miles', '60' => 'nautical miles', '111.045' => 'kilometers', '552' => 'furlongs'];
      list($latpoint, $longpoint) = explode(":", $_REQUEST['lat_lon']);
	  $limit                      = $_REQUEST['qty'];
	  $radius                     = $_REQUEST['distance'];
	  $distance_units             = $_REQUEST['distance_units'];
	  $distance_name              = $distance_unit_names[$distance_units];
/*
      SELECT z.id, z.address, z.city, z.state, z.zip, z.latitude, z.longitude, 
        (p.distance_unit 
          * DEGREES(ACOS(COS(RADIANS(p.latpoint)) 
          * COS(RADIANS(z.latitude)) 
          * COS(RADIANS(p.longpoint) - RADIANS(z.longitude)) 
          + SIN(RADIANS(p.latpoint)) 
          * SIN(RADIANS(z.latitude))))) AS distance 
      FROM locations AS z 
      JOIN ( 
        SELECT ? AS latpoint, 
               ? AS longpoint, 
               ? AS radius, 
               ? AS distance_unit 
        ) AS p 
      WHERE z.latitude 
        BETWEEN p.latpoint  - (p.radius / p.distance_unit) 
        AND     p.latpoint  + (p.radius / p.distance_unit) 
      AND   z.longitude 
        BETWEEN p.longpoint - (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint)))) 
        AND     p.longpoint + (p.radius / (p.distance_unit * COS(RADIANS(p.latpoint)))) 
      ORDER BY distance 
      LIMIT ?
*/
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

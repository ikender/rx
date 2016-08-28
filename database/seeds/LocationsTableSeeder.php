<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            ['WALGREENS', '3696 SW TOPEKA BLVD', 'TOPEKA', 'KS', '66611', '39.001423', '-95.686950'],
            ['KMART PHARMACY', '1740 SW WANAMAKER ROAD', 'TOPEKA', 'KS', '66604', '39.035040', '-95.758700'],
            ['CONTINENTAL PHARMACY LLC', '821 SW 6TH AVE', 'TOPEKA', 'KS', '66603', '39.054330', '-95.684530'],
            ['STORMONT-VAIL RETAIL PHARMACY', '2252 SW 10TH AVE.', 'TOPEKA', 'KS', '66604', '39.051670', '-95.705340'],
            ['DILLON PHARMACY', '2010 SE 29TH ST', 'TOPEKA', 'KS', '66605', '39.016384', '-95.650650'],
            ['WAL-MART PHARMACY', '1501 S.W. WANAMAKER ROAD', 'TOPEKA', 'KS', '66604', '39.039550', '-95.764590'],
            ['KING PHARMACY', '4033 SW 10TH AVE', 'TOPEKA', 'KS', '66604', '39.051210', '-95.727000'],
            ['HY-VEE PHARMACY', '12122 STATE LINE RD', 'LEAWOOD', 'KS', '66209', '38.907753', '-94.608010'],
            ['JAYHAWK PHARMACY AND PATIENT SUPPLY', '2860 SW MISSION WOODS DR', 'TOPEKA', 'KS', '66614', '39.015053', '-95.778660'],
            ['PRICE CHOPPER PHARMACY', '3700 W 95TH ST', 'LEAWOOD', 'KS', '66206', '38.957920', '-94.628815'],
            ['AUBURN PHARMACY', '13351 MISSION RD', 'LEAWOOD', 'KS', '66209', '38.885345', '-94.628000'],
            ['CVS PHARMACY', '5001 WEST 135 ST', 'LEAWOOD', 'KS', '66224', '38.883230', '-94.645180'],
            ['SAMS PHARMACY', '1401 SW WANAMAKER ROAD', 'TOPEKA', 'KS', '66604', '39.041603', '-95.764626'],
            ['CVS PHARMACY', '2835 SW WANAMAKER RD', 'TOPEKA', 'KS', '66614', '39.015503', '-95.764340'],
            ['HY-VEE PHARMACY', '2951 SW WANAMAKER RD', 'TOPEKA', 'KS', '66614', '39.012157', '-95.763940'],
            ['TALLGRASS PHARMACY', '601 SW CORPORATE VIEW', 'TOPEKA', 'KS', '66615', '39.057160', '-95.766920'],
            ['HUNTERS RIDGE PHARMACY', '3405 NW HUNTERS RIDGE TER STE 200', 'TOPEKA', 'KS', '66618', '39.129845', '-95.712654'],
            ['ASSURED PHARMACY', '11100 ASH ST STE 200', 'LEAWOOD', 'KS', '66211', '38.926632', '-94.647440'],
            ['WALGREENS', '4701 TOWN CENTER DR', 'LEAWOOD', 'KS', '66211', '38.916190', '-94.640366'],
            ['PRICE CHOPPER PHARMACY', '1100 SOUTH 7 HWY', 'BLUE SPRINGS', 'MO', '64015', '39.029310', '-94.271750'],
            ['CVS PHARMACY', '1901 WEST KANSAS STREET', 'LIBERTY', 'MO', '64068', '39.243850', '-94.449610'],
            ['MARRS PHARMACY', '205 RD MIZE ROAD', 'BLUE SPRINGS', 'MO', '64014', '39.023530', '-94.260605'],
            ['WAL-MART PHARMACY', '600 NE CORONADO DRIVE', 'BLUE SPRINGS', 'MO', '64014', '39.024193', '-94.255030'],
            ['WAL-MART PHARMACY', '10300 E HWY 350', 'RAYTOWN', 'MO', '64133', '38.983765', '-94.459305'],
            ['HY-VEE PHARMACY', '9400 E. 350 HIGHWAY', 'RAYTOWN', 'MO', '64133', '38.993000', '-94.470830'],
            ['HY-VEE PHARMACY', '625 W 40 HWY', 'BLUE SPRINGS', 'MO', '64014', '39.010704', '-94.271080'],
            ['HY-VEE PHARMACY', '109 NORTH BLUE JAY DRIVE', 'LIBERTY', 'MO', '64068', '39.245758', '-94.447020'],
            ['WALGREENS', '1701 NW HIGHWAY 7', 'BLUE SPRINGS', 'MO', '64015', '39.037548', '-94.271530'],
            ['WALGREENS', '9300 E GREGORY BLVD', 'RAYTOWN', 'MO', '64133', '38.995342', '-94.473400'],
            ['WALGREENS', '1191 W KANSAS AVE', 'LIBERTY', 'MO', '64068', '39.243870', '-94.441864']
        ];

        $insert = [];
        $seed_timestamp = \Carbon\Carbon::now();
        foreach( $locations as list($name, $address, $city, $state, $zip, $latitude, $longitude) )
        {
            $insert[] = [
                'name'      => $name,
                'address'   => $address,
                'city'      => $city,
                'state'     => $state,
                'zip'       => $zip,
                'latitude'  => $latitude,
                'longitude' => $longitude,
                'created_at'=> $seed_timestamp,
                'updated_at'=> $seed_timestamp,
            ];
        }

        DB::table('locations')->insert($insert);
    }
}

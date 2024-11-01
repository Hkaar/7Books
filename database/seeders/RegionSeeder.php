<?php

namespace Database\Seeders;

use App\Models\Library;
use App\Models\Region;
use DateTimeZone;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timezones = DateTimeZone::listIdentifiers();

        foreach ($timezones as $timezone) {
            $seperated = explode('/', $timezone);

            if (count($seperated) > 1) {
                $name = $seperated[1];
            } else {
                $name = $seperated[0];
            }

            if (! Region::ByName($name)->first()) {
                Region::create([
                    "name" => $name,
                    "desc" => "Generated region",
                    "timezone" => $timezone,
                ]);
            }
        }
    }
}

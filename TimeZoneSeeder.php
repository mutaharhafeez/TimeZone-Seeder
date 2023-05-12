<?php
 
namespace Database\Seeders;
 
use App\Models\TimeZone;
use DateTimeZone;
 
class TimeZoneSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (DateTimeZone::listIdentifiers() as $identifier) {
            foreach ((new DateTimeZone($id))->getTransitions() as $transition) {
                if ($transition['abbr'] === 'GMT') {
                    $timezoneAbbr = 'GMT';
                    break;
                } elseif ($transition['abbr'] !== 'LMT') {
                    $timezoneAbbr = $transition['abbr'];
                    break;
                }
            }
            if (!isset($timezoneAbbr)) {
                $timezoneAbbr = 'LMT';
            }
            TimeZone::firstOrCreate(
                [
                    'identifier' => $identifier,
                    'display_name' => $timezoneAbbr . ' (' . $identifier . ')',
                ]
            );
        }
    }
}

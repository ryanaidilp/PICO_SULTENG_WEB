<?php



namespace App\Services;

use App\Models\VaccineLocation;
use App\Transformers\AppSerializer;
use App\Transformers\VaccineLocationTransformer;

class VaccineLocationService
{
    public function all($province_id)
    {
        $vaccine_locations = VaccineLocation::with(['regency:id,name'])->where('regency_id', 'LIKE', "$province_id%")->get();
        $vaccine_locations = fractal($vaccine_locations, new VaccineLocationTransformer, new AppSerializer)->toArray();

        return $vaccine_locations;
    }
}

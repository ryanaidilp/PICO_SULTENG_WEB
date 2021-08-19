<?php



namespace App\Services;

use App\Models\Telemedicine;
use App\Transformers\AppSerializer;
use App\Transformers\TelemedicineTransformer;

class TelemedicineService
{
    public function all()
    {
        $telemedicines = Telemedicine::with(['contacts', 'contacts.contact_type', 'schedules'])
            ->get();

        $telemedicines = fractal($telemedicines, new TelemedicineTransformer, new AppSerializer);

        return $telemedicines;
    }
}

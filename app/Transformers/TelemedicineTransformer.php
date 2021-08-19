<?php



namespace App\Transformers;

use App\Models\Telemedicine;
use League\Fractal\TransformerAbstract;

class TelemedicineTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include.
     *
     * @var array
     */
    protected $defaultIncludes = [
        'contacts', 'schedules',
    ];

    /**
     * List of resources possible to include.
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];

    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Telemedicine $telemedicine)
    {
        return [
            'name' => $telemedicine->name,
            'is_free' => (bool) $telemedicine->is_free,
        ];
    }

    public function includeContacts(Telemedicine $telemedicine)
    {
        return $this->collection($telemedicine->contacts, new ContactTransformer);
    }

    public function includeSchedules(Telemedicine $telemedicine)
    {
        return $this->collection($telemedicine->schedules, new TelemedicineScheduleTransformer);
    }
}

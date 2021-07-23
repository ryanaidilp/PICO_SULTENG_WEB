<?php

namespace App\Transformers;

use App\Models\Telemedicine;
use League\Fractal\TransformerAbstract;

class TelemedicineTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];

    /**
     * List of resources possible to include
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
            "name" => $telemedicine->name,
            "is_free" => $telemedicine->is_free,
            "contacts" => $telemedicine->contacts->map(function ($contact) {
                return [
                    "id" => $contact->id,
                    "name" => $contact->name,
                    "contact" => $contact->contact,
                    "contact_type_id" => $contact->contact_type_id,
                    "prefix" => $contact->contact_type->prefix,
                    "bg_color" => $contact->contact_type->bg_color,
                    "icon" => $contact->contact_type->icon,
                    "label" => $contact->contact_type->label,
                ];
            })->toArray(),
            "schedules" => $telemedicine->schedules->map(function ($schedule) {
                return [
                    "id" => $schedule->id,
                    "operational_day" => $schedule->operational_day,
                    "operational_time"  => $schedule->operational_time,
                    "timezone" => $schedule->timezone,
                ];
            })->toArray(),
        ];
    }
}

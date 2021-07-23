<?php

namespace App\Transformers;

use App\Models\Hospital;
use League\Fractal\TransformerAbstract;

class HospitalTransformer extends TransformerAbstract
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
    public function transform(Hospital $hospital)
    {
        return [
            "id" => (int) $hospital->id,
            "name" => $hospital->name,
            "address" => $hospital->address,
            "latitude" => $hospital->latitude,
            "longitude" => $hospital->longitude,
            "hospital_code" => $hospital->hospital_code,
            "igd_count" => $hospital->igd_count,
            "bed_update" => \optional($hospital->beds->first())->updated_at,
            "contacts"  => $hospital->contacts->map(function ($contact) {
                return [
                    "id" => (int) $contact->id,
                    "contact_type_id" => $contact->contact_type_id,
                    "contact" => $contact->contact,
                    "prefix" => $contact->contact_type->prefix,
                    "bg_color" => $contact->contact_type->bg_color,
                    "icon" => $contact->contact_type->icon,
                    "label" => $contact->contact_type->label,
                ];
            }),
        ];
    }
}

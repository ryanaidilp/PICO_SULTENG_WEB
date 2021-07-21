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
            "contacts"  => $hospital->contacts->map(function ($contact) {
                return [
                    "contact_type_id" => $contact->contact_type_id,
                    "contact" => $contact->contact
                ];
            }),
        ];
    }
}

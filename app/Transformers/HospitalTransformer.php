<?php

declare(strict_types=1);

namespace App\Transformers;

use App\Models\Hospital;
use League\Fractal\TransformerAbstract;

class HospitalTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include.
     *
     * @var array
     */
    protected $defaultIncludes = [
        'contacts',
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
    public function transform(Hospital $hospital)
    {
        return [
            'id' => (int) $hospital->id,
            'name' => $hospital->name,
            'address' => $hospital->address,
            'latitude' => $hospital->latitude,
            'longitude' => $hospital->longitude,
            'hospital_code' => $hospital->hospital_code,
            'igd_count' => $hospital->igd_count,
            'bed_update' => \optional($hospital->beds->first())->updated_at,

        ];
    }

    public function includeContacts(Hospital $hospital)
    {
        return $this->collection($hospital->contacts, new ContactTransformer);
    }
}

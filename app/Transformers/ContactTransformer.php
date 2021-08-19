<?php

declare(strict_types=1);

namespace App\Transformers;

use App\Models\Contact;
use League\Fractal\TransformerAbstract;

class ContactTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include.
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
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
    public function transform(Contact $contact)
    {
        return [
            'id' => (int) $contact->id,
            'contact_type_id' => $contact->contact_type_id,
            'contact' => $contact->contact,
            'prefix' => $contact->contact_type->prefix,
            'bg_color' => $contact->contact_type->bg_color,
            'icon' => $contact->contact_type->icon,
            'label' => $contact->contact_type->label,
        ];
    }
}

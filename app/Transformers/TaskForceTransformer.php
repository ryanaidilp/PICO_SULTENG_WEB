<?php

namespace App\Transformers;

use App\Models\Regency;
use League\Fractal\TransformerAbstract;

class TaskForceTransformer extends TransformerAbstract
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
    public function transform(Regency $regency)
    {
        $task_forces = [];
        $contacts =
            $regency->task_forces->map(function ($task_force) {
                return  $task_force->contacts->map(function ($contact) use ($task_force) {
                    return [
                        'id'    => $contact->id,
                        'contact_type_id' => $contact->contact_type_id,
                        'contact' => $contact->contact,
                        'name' => $task_force->name,
                        'prefix' => $contact->contact_type->prefix,
                        'bg_color' => $contact->contact_type->bg_color,
                        'icon' => $contact->contact_type->icon,
                        'label' => $contact->contact_type->label,
                    ];
                });
            });

        foreach ($contacts as $task_force) {
            foreach ($task_force as $contact) {
                $task_forces[] = $contact;
            }
        }

        return [
            'regency' => $regency->name,
            'contacts' => $task_forces,
        ];
    }
}

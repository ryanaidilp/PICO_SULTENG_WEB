<?php



namespace App\Transformers\Api\v1;

use App\Models\Regency;
use League\Fractal\TransformerAbstract;

class RegencyTransformer extends TransformerAbstract
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
        return [
            'id' => $regency->id,
            'name' => $regency->name,
            'positive' => optional($regency->case)->positive,
            'recovered' => optional($regency->case)->recovered,
            'deceased' => optional($regency->case)->deceased,
            'under_treatment' => optional($regency->case)->under_treatment,
            'death_ratio' => optional($regency->case)->death_ratio,
            'updated_at' => optional($regency->case)->updated_at,
        ];
    }
}

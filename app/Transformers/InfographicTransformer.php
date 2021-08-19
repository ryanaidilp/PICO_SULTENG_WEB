<?php

declare(strict_types=1);

namespace App\Transformers;

use App\Models\Infographic;
use League\Fractal\TransformerAbstract;

class InfographicTransformer extends TransformerAbstract
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
    public function transform(Infographic $infographic)
    {
        return [
            'title' => $infographic->title,
            'route' => $infographic->source,
            'images' => $infographic->images->map(function ($image) {
                return $image->image_url;
            }),
        ];
    }
}

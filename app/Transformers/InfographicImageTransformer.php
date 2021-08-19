<?php



namespace App\Transformers;

use App\Models\InfographicImage;
use League\Fractal\TransformerAbstract;

class InfographicImageTransformer extends TransformerAbstract
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
    public function transform(InfographicImage $image)
    {
        return [
            $image->url,
        ];
    }
}

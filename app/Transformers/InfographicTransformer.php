<?php

namespace App\Transformers;

use App\Infographic;
use League\Fractal\TransformerAbstract;

class InfographicTransformer extends TransformerAbstract
{
    public function transform(Infographic $infographic)
    {
        $images = array();
        foreach ($infographic->images as $image) {
            array_push($images, $image->link);
        }
        return [
            'title' => $infographic->title,
            'route' => $infographic->link,
            'images' => $images
        ];
    }
}

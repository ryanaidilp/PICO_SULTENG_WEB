<?php

namespace App\Transformers;

use App\Models\Test;
use Carbon\Carbon;
use League\Fractal\TransformerAbstract;

class TestTransformer extends TransformerAbstract
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
    public function transform(Test $test)
    {
        $data = [
            $test->name => [
                'positif' => $test->positive,
                'negatif' => $test->negative,
                'invalid' => $test->invalid,
                'proses' => $test->process,
                'jumlah_sampling' => $test->total,
                'tanggal' => Carbon::parse($test->date)->translatedFormat('l, d M Y'),
            ],
        ];

        return $data;
    }
}

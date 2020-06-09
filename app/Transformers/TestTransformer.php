<?php

namespace App\Transformers;

use App\Test;
use League\Fractal\TransformerAbstract;

class TestTransformer extends TransformerAbstract
{
    public function transform(Test $test)
    {
        $data = [
            $test->name => [
                'positif' => $test->positive,
                'negatif' => $test->negative,
                'invalid' => $test->invalid,
                'jumlah_sampling' => $test->total,
                'tanggal' => $test->date,
            ],
        ];

        return $data;
    }
}

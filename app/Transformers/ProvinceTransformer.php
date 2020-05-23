<?php

namespace App\Transformers;

use App\Province;
use Illuminate\Support\Facades\Lang;
use League\Fractal\TransformerAbstract;

class ProvinceTransformer extends TransformerAbstract
{
    public function transform(Province $province)
    {
        return
            [
                Lang::get('general.province_code') => $province->kode_provinsi,
                'updated_at' => $province->updated_at,
                Lang::get('general.province') => $province->provinsi,
                Lang::get('general.positive') => $province->positif,
                Lang::get('general.under_treatment') => $province->dalam_perawatan,
                Lang::get('general.death') => $province->meninggal,
                Lang::get('general.recovered') => $province->sembuh,
                Lang::get('general.percentage_param', ['case' => 'kematian']) => $province->rasio_kematian,
                Lang::get('general.map_id') => $province->map_id,
            ];
    }
}

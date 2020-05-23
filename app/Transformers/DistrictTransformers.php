<?php

namespace App\Transformers;

use App\District;
use Illuminate\Support\Facades\Lang;
use League\Fractal\TransformerAbstract;

class DistrictTransformer extends TransformerAbstract
{
    public function transform(District $district)
    {
        return
            [
                Lang::get('general.no') => $district->no,
                Lang::get('general.district') => $district->kabupaten,
                Lang::get('general.updated_at') => $district->updated_at,
                Lang::get('general.positive') => $district->positif,
                Lang::get('general.negative') => $district->negatif,
                Lang::get('general.recovered') => $district->sembuh,
                Lang::get('general.death') => $district->meninggal,
                Lang::get('general.ODP') => $district->ODP,
                Lang::get('general.finished_param', ['case' => 'pemantauan']) => $district->selesai_pemantauan,
                Lang::get('general.active_param', ['case' => 'pemantauan']) => $district->dalam_pemantauan,
                Lang::get('general.PDP') => $district->PDP,
                Lang::get('general.finished_param', ['case' => 'pengawasan']) => $district->selesai_pengawasan,
                Lang::get('general.active_param', ['case' => 'pengawasan']) => $district->dalam_pengawasan,
                Lang::get('general.death_rate') => $district->rasio_kematian,
            ];
    }
}

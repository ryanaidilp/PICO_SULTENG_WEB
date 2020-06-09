<?php

namespace App\Transformers;

use App\Gender;
use League\Fractal\TransformerAbstract;

class GenderTransformers extends TransformerAbstract
{
    public function transform(Gender $gender)
    {
        return [
            'hari_ke' => $gender->day,
            'positif_per_usia' => [
                'semua' => [
                    'laki_laki' => [
                        '0_14' => $gender->positive_male_0_14,
                        '15_19' => $gender->positive_male_15_19,
                        '20_24' => $gender->positive_male_20_24,
                        '25_49' => $gender->positive_male_25_49,
                        '50_54' => $gender->positive_male_50_54,
                        'atas_55' => $gender->positive_male_55,
                    ],
                    'perempuan' => [
                        '0_14' => $gender->positive_female_0_14,
                        '15_19' => $gender->positive_female_15_19,
                        '20_24' => $gender->positive_female_20_24,
                        '25_49' => $gender->positive_female_25_49,
                        '50_54' => $gender->positive_female_50_54,
                        'atas_55' => $gender->positive_female_55,
                    ],
                ],
            ],
            'pdp_total_per_usia' => [
                'semua' => [
                    'laki_laki' => [
                        '0_14' => $gender->pdp_male_0_14,
                        '15_19' => $gender->pdp_male_15_19,
                        '20_24' => $gender->pdp_male_20_24,
                        '25_49' => $gender->pdp_male_25_49,
                        '50_54' => $gender->pdp_male_50_54,
                        'atas_55' => $gender->pdp_male_55,
                    ],
                    'perempuan' => [
                        '0_14' => $gender->pdp_female_0_14,
                        '15_19' => $gender->pdp_female_15_19,
                        '20_24' => $gender->pdp_female_20_24,
                        '25_49' => $gender->pdp_female_25_49,
                        '50_54' => $gender->pdp_female_50_54,
                        'atas_55' => $gender->pdp_female_55,
                    ],
                ],
            ],
            'positif' => $gender->positive_male + $gender->positive_female,
            'positif_per_gender' => [
                'laki_laki' => $gender->positive_male,
                'perempuan' => $gender->positive_female,
            ],
            'pdp_total' => $gender->pdp_male + $gender->pdp_female,
            'pdp_total_per_gender' => [
                'laki_laki' => $gender->pdp_male,
                'perempuan' => $gender->pdp_female,
            ],
        ];
    }
}

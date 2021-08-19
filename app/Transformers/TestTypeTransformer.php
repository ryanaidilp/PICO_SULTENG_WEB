<?php



namespace App\Transformers;

use App\Models\TestType;
use Illuminate\Support\Carbon;
use League\Fractal\TransformerAbstract;

class TestTypeTransformer extends TransformerAbstract
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
    public function transform(TestType $test)
    {
        return [
            $test->key => [
                __('general.positive') => $test->province_test_case->positive,
                __('general.negative') => $test->province_test_case->negative,
                'invalid' => $test->province_test_case->invalid,
                'proses' => $test->province_test_case->process,
                'jumlah_sampling' => $test->province_test_case->total,
                'tanggal' => Carbon::parse($test->province_test_case->date_from)->translatedFormat('l, d M Y'),
            ],
        ];
    }
}

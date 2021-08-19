<?php



namespace App\Services;

use App\Models\TestType;
use App\Transformers\AppSerializer;
use App\Transformers\TestTypeTransformer;

class TestTypeService
{
    public function all($province_id)
    {
        $tests = TestType::whereHas('province_test_case', function ($query) use ($province_id): void {
            $query->where('province_id', '=', $province_id);
        })->get();
        $tests = fractal($tests, new TestTypeTransformer, new AppSerializer)->toArray();

        return $tests;
    }
}

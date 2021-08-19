<?php

namespace App\Transformers;

use App\Models\TelemedicineSchedule;
use League\Fractal\TransformerAbstract;

class TelemedicineScheduleTransformer extends TransformerAbstract
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
    public function transform(TelemedicineSchedule $schedule)
    {
        return [
            'id' => $schedule->id,
            'operational_day' => $schedule->operational_day,
            'operational_time'  => $schedule->operational_time,
            'timezone' => $schedule->timezone,
        ];
    }
}

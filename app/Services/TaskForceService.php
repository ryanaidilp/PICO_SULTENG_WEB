<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Regency;
use App\Transformers\AppSerializer;
use App\Transformers\TaskForceTransformer;

class TaskForceService
{
    public function all($province_id)
    {
        $task_forces = Regency::select('id', 'name')
            ->with(['task_forces', 'task_forces.contacts', 'task_forces.contacts.contact_type'])
            ->where('province_id', $province_id)
            ->get();

        $task_forces = fractal($task_forces, new TaskForceTransformer, new AppSerializer)->toArray();

        return $task_forces;
    }
}

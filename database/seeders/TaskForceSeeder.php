<?php

namespace Database\Seeders;

use App\Models\TaskForce;
use Illuminate\Database\Seeder;

class TaskForceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = file(\database_path("csvs/task_forces.csv"));
        $data = \array_map("str_getcsv", $file);
        $keys = $data[0];
        \array_shift($data);
        foreach ($data as $row) {
            TaskForce::create(array_combine($keys, $row));
        }
    }
}

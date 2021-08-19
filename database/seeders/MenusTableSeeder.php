<?php

declare(strict_types=1);

namespace Database\Seeders;

use TCG\Voyager\Models\Menu;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run(): void
    {
        Menu::firstOrCreate([
            'name' => 'admin',
        ]);
    }
}

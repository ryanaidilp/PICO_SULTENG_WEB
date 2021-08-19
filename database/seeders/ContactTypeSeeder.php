<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\ContactType;
use Illuminate\Database\Seeder;

class ContactTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            'Email',
            'Telepon',
            'Faks',
        ];

        foreach ($data as $item) {
            ContactType::create(['name' => $item]);
        }
    }
}

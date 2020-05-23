<?php

namespace Tests\Feature;

use App\District;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DistrictTest extends TestCase
{
    use RefreshDatabase;
    private $districtData = [
        'name' => 'Donggala',
        'positive' => 0,
        'negative' => 0,
        'recovered' => 0,
        'deceased' => 0,
        'finished_ODP' => 12,
        'new_ODP' => 0,
        'ODP' => 14,
        'finished_PDP' => 0,
        'new_PDP' => 0,
        'PDP' => 3,
    ];

    /** @test */
    public function a_district_can_be_added()
    {
        $this->withoutExceptionHandling();
        $this->post('/api/kabupaten', $this->districtData);
        $district = District::first();
        $this->assertEquals('Donggala', $district->name);
        $this->assertEquals(0, $district->positive);
        $this->assertEquals(0, $district->negative);
        $this->assertEquals(0, $district->recovered);
        $this->assertEquals(0, $district->deceased);
        $this->assertEquals(12, $district->finished_ODP);
        $this->assertEquals(0, $district->new_ODP);
        $this->assertEquals(14, $district->ODP);
        $this->assertEquals(0, $district->finished_PDP);
        $this->assertEquals(0, $district->new_PDP);
        $this->assertEquals(3, $district->PDP);
    }

    /** @test */
    public function fields_are_required()
    {
        collect(['name', 'positive', 'negative', 'recovered', 'deceased', 'finished_ODP', 'new_ODP', 'ODP', 'finished_PDP', 'new_PDP', 'PDP'])
        ->each(function ($field) {
            $response = $this->post('/api/kabupaten', array_merge($this->districtData, [$field => '']));
            $this->assertEquals(0, District::all());
            $response->assertSessionHasErrors($field);
        });
    }
}

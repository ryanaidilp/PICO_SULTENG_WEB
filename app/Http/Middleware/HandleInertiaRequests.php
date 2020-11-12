<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        $partners = [
            [
                'id' => 1,
                'link' => "https://detexi.id",
                'image' => 'detexi.png',
                'name' => 'Detexi',
                'width' => 'w-1/4'
            ],
            [
                'id' => 2,
                'link' => "https://kawalcovid19.id",
                'image' => 'kawalcovid.png',
                'name' => 'Kawal Covid',
                'width' => 'w-1/4'
            ],
            [
                'id' => 3,
                'link' => "https://kawalcorona.com",
                'image' => 'ehi.png',
                'name' => 'Kawal Corona',
                'width' => 'w-1/4'
            ],
            [
                'id' => 4,
                'link' => "https://covid19.go.id/peta-sebaran",
                'image' => 'inacovid.png',
                'name' => 'Gugus Tugas COVID-19 Indonesia',
                'width' => 'w-1/4'
            ],
            [
                'id' => 5,
                'link' => "https://chartjs.org",
                'image' => 'charts.png',
                'name' => 'Chart Js',
                'width' => 'w-1/4'
            ],
            [
                'id' => 6,
                'link' => "https://vuejs.org",
                'image' => 'vue.svg',
                'name' => 'Vue JS',
                'width' => 'w-1/4'
            ],
            [
                'id' => 7,
                'link' => "https://laravel.com",
                'image' => 'laravel.jpeg',
                'name' => 'Laravel',
                'width' => 'w-1/4'
            ],
            [
                'id' => 8,
                'link' => "https://anychart.com",
                'image' => 'anychart.png',
                'name' => 'Anychart',
                'width' => 'w-1/4'
            ],
            [
                'id' => 9,
                'link' => "https://dinkes.sultengprov.go.id",
                'image' => 'dinkes.png',
                'name' => 'Dinas Kesehatan Provinsi Sulteng',
                'width' => 'w-1/4'
            ],
            [
                'id' => 10,
                'link' => "https://sultenglawancovid.com",
                'image' => 'sultenglawancovid.png',
                'name' => 'Sulteng Lawan COVID',
                'width' => 'w-1/4'
            ],
            [
                'id' => 11,
                'link' => "https://banuacoders.com",
                'image' => 'banuacoders.png',
                'name' => 'Banua Coders',
                'width' => 'w-1/4'
            ],
            [
                'id' => 12,
                'link' => "https://pikobar.jabarprov.go.id",
                'image' => 'pikobar.png',
                'name' => 'PIKOBAR Jawa Barat',
                'width' => 'w-1/4'
            ],
        ];
        return array_merge(parent::share($request), [
            'partners' => $partners
        ]);
    }
}

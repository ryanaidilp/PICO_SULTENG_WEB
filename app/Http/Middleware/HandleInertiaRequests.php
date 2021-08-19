<?php

namespace App\Http\Middleware;

use App\Models\Partner;
use Inertia\Middleware;
use Illuminate\Http\Request;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that`s loaded on the first page visit.
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
        $partners = Partner::all();

        $chunks = $partners->chunk(4);

        $partners = [];

        foreach ($chunks->all() as $chunk) {
            $length = count($chunk);
            foreach ($chunk as $partner) {
                $partner['width'] = "w-1/$length";
                array_push($partners, $partner);
            }
        }

        return array_merge(parent::share($request), [
            'partners' => $partners,
        ]);
    }
}

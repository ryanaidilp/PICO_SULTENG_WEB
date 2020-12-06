<?php

use Illuminate\Support\Facades\Http;

function sendNotification($body, $header)
{
    $contents = [
        'en' => $body
    ];

    $headings = [
        'en' => $header
    ];

    $fields = [
        'app_id' => env('ONESIGNAL_APP_ID'),
        'included_segments' => ['All'],
        'contents' => $contents,
        'headings' => $headings,
        'url' => 'https://banuacoders.com/corona/data'
    ];

    Http::withHeaders([
        'Content-Type' => 'application/json',
        'Authorization' => 'Basic ' . env('ONESIGNAL_API_KEY')
    ])->retry(3, 1000)->post(env('ONESIGNAL_API_URL'), $fields);
}

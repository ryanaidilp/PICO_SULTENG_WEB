<?php



use Illuminate\Support\Facades\Http;

function sendNotification($message, $header): void
{
    $api_key = config('services.one_signal.api_key');
    $base_url = config('services.one_signal.base_url');

    $contents = [
        'en' => $message,
    ];

    $headings = [
        'en' => $header,
    ];

    $headers = [
        'Content-Type' => 'application/json',
        'Authorization' => "Basic $api_key",
    ];

    $data = [
        'app_id' => config('services.one_signal.app_id'),
        'included_segments' => ['All'],
        'contents' => $contents,
        'headings' => $headings,
        'url' => 'https://banuacoders.com/corona/data',
    ];

    Http::withHeaders($headers)->retry(3, 1000)->post($base_url, $data);
}

function setResponse($data, $errors = [], $is_success = true)
{
    return [
        'success' => $is_success,
        'errors'  => $errors,
        'data' => $data,
    ];
}

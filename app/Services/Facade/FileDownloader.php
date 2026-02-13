<?php

namespace App\Services\Facade;

class FileDownloader
{
    public function download(string $url): string
    {
        // Simulate downloading a file from a remote URL
        $filename = basename(parse_url($url, PHP_URL_PATH));

        return "Downloaded '{$filename}' from {$url}";
    }
}

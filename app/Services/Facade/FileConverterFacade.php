<?php

namespace App\Services\Facade;

class FileConverterFacade
{
    /**
     * Download a file, convert it to the target format, and save it.
     *
     * @return array<string, string> Step-by-step results
     */
    public static function convertFromUrl(string $url, string $targetFormat, string $destination): array
    {
        $downloader = new FileDownloader();
        $converter = new ConvertService();
        $saver = new FileSaver();

        $filename = basename(parse_url($url, PHP_URL_PATH));
        $convertedFilename = pathinfo($filename, PATHINFO_FILENAME).".{$targetFormat}";

        return [
            'download' => $downloader->download($url),
            'convert'  => $converter->convert($filename, $targetFormat),
            'save'     => $saver->save($convertedFilename, $destination),
        ];
    }
}

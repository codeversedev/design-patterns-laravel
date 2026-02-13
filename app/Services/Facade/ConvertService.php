<?php

namespace App\Services\Facade;

class ConvertService
{
    public function convert(string $filename, string $targetFormat): string
    {
        $name = pathinfo($filename, PATHINFO_FILENAME);
        $convertedFile = "{$name}.{$targetFormat}";

        return "Converted '{$filename}' to '{$convertedFile}'";
    }
}

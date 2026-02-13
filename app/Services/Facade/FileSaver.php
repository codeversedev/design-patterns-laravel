<?php

namespace App\Services\Facade;

class FileSaver
{
    public function save(string $filename, string $destination): string
    {
        return "Saved '{$filename}' to '{$destination}'";
    }
}

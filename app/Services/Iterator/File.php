<?php

namespace App\Services\Iterator;

class File
{
    public function __construct(
        private string $name,
        private string $content,
        private int $size,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getSize(): int
    {
        return $this->size;
    }
}

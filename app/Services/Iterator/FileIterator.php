<?php

namespace App\Services\Iterator;

use Iterator;

class FileIterator implements Iterator
{
    private int $position = 0;

    /**
     * @param  File[]  $files
     */
    public function __construct(
        private array $files = [],
    ) {}

    public function current(): File
    {
        return $this->files[$this->position];
    }

    public function key(): int
    {
        return $this->position;
    }

    public function next(): void
    {
        $this->position++;
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function valid(): bool
    {
        return isset($this->files[$this->position]);
    }
}

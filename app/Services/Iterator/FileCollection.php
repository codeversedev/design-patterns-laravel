<?php

namespace App\Services\Iterator;

use IteratorAggregate;

class FileCollection implements IteratorAggregate
{
    /** @var File[] */
    private array $files = [];

    public function addFile(File $file): self
    {
        $this->files[] = $file;

        return $this;
    }

    public function removeFile(string $name): self
    {
        $this->files = array_values(
            array_filter($this->files, fn (File $file) => $file->getName() !== $name)
        );

        return $this;
    }

    public function count(): int
    {
        return count($this->files);
    }

    public function getIterator(): FileIterator
    {
        return new FileIterator($this->files);
    }
}

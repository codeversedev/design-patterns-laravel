<?php

namespace App\Services\Singleton;

class AppConfig
{
    private static ?self $instance = null;

    /** @var array<string, mixed> */
    private array $settings = [];

    private function __construct() {}

    private function __clone() {}

    public function __wakeup()
    {
        throw new \RuntimeException('Cannot unserialize a singleton.');
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function set(string $key, mixed $value): self
    {
        $this->settings[$key] = $value;

        return $this;
    }

    public function get(string $key, mixed $default = null): mixed
    {
        return $this->settings[$key] ?? $default;
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->settings);
    }

    /**
     * @return array<string, mixed>
     */
    public function all(): array
    {
        return $this->settings;
    }

    /**
     * Reset the instance (useful for testing).
     */
    public static function reset(): void
    {
        self::$instance = null;
    }
}

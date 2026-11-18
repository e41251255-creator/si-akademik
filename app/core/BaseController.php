<?php

class BaseController
{
    protected function view(string $view, array $data = []): void
    {
        extract($data);

        $file = __DIR__ . '/../views/' . $view . '.php';

        if (!file_exists($file)) {
            throw new RuntimeException("View {$view} tidak ditemukan.");
        }

        require $file;
    }

    protected function redirect(string $url): void
    {
        header("Location: {$url}");
        exit;
    }
}

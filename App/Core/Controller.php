<?php

namespace App\Core;

abstract class Controller
{
    public function view(string $view, array $data = []): void
    {
        extract($data);

        require __DIR__ . '/../../Views/' . $view . '.php';
    }
}

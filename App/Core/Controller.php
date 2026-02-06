<?php

namespace App\Core;

use eftec\bladeone\BladeOne;

abstract class Controller
{
    protected BladeOne $view;

    public function __construct()
    {
        $views = __DIR__ . '/../../Views';
        $cache = __DIR__ . '/../../storage/cache';

        $this->view = new BladeOne($views, $cache, BladeOne::MODE_AUTO);
    }

    protected function render(string $view, array $data = []): void
    {
        echo $this->view->run($view, $data);
    }
}

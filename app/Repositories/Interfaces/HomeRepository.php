<?php

namespace App\Repositories\Interfaces;

interface HomeRepository
{
    public function getAll($modelName);

    public function show($slug);

    public function topProducts();
}

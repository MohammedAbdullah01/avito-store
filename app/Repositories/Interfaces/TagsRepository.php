<?php

namespace App\Repositories\Interfaces;

interface TagsRepository
{
    public function getAll();

    public function getTag($slug);

    public function store($request);

    public function update($request, $id);

    public function destory($id);
}

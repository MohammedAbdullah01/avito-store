<?php

namespace App\Repositories\Interfaces;

interface CommentRepository
{
    public function getCommentsAll();

    public function store($request);

    public function destroy($id);
}

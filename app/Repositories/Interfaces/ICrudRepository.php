<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface ICrudRepository
{
    /**
     * @return Collection
     */
    public function getAll();

    /**
     * @param string $slug
     * @return Collection
     */
    public function showData($slug);

    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function storeData($request);

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  object  $object
     */
    public function updateData($request, object $object);

    /**
     * @param  object $object
     */
    public function destroyData(object $object);

    public function data($request);
}

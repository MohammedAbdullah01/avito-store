<?php

namespace App\Repositories\Interfaces;

interface IProfileRepository
{
    public function getProfile($slug);

    public function getMemberProduct();

    public function updateProfile($request);

    public function changePassword($request);
}

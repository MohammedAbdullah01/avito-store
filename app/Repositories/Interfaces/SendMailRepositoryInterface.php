<?php

namespace App\Repositories\Interfaces;

interface SendMailRepositoryInterface
{
    public function sendMailVerification();
    
    public function sendMailForgotPassword();
}
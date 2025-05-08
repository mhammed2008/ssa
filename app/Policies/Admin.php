<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    public function admin(): bool
    {
        return \auth()->user()->Admin === 1;
    }

}

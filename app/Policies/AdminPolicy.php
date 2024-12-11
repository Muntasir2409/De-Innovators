<?php

namespace App\Policies;

use Illuminate\Support\Facades\Auth;

class AdminPolicy
{
    public function adminAccess(): bool
    {
        return Auth::user()->isAdmin();
    }
}

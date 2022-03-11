<?php

namespace App\Http\Controllers;

use App\Models\Role;

use App\Models\User;
use LdapRecord\Models\ActiveDirectory\Concerns\HasPrimaryGroup;



class TestController extends Controller
{
    use HasPrimaryGroup;

    public function index()
    {
        $user = User::find(1);
        dd($user->hasRole('dirigente', 2));
    }
}

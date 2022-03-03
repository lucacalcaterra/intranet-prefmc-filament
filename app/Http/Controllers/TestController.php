<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use LdapRecord\Models\ActiveDirectory\Concerns\HasPrimaryGroup;
use LdapRecord\Models\ActiveDirectory\Group;



class TestController extends Controller
{
    use HasPrimaryGroup;

    public function index()
    {
        $user = User::find(1);

        //dump($user->roles()->sync([1, 2, 3]));
        dd($user->qualifica);
    }
}

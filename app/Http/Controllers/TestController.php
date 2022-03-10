<?php

namespace App\Http\Controllers;

use App\Models\Role;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use LdapRecord\Models\ActiveDirectory\Group;
use LdapRecord\Models\ActiveDirectory\Concerns\HasPrimaryGroup;



class TestController extends Controller
{
    use HasPrimaryGroup;

    public function index()
    {
        $user = User::find(1);


        //$roles = $user->roles()->where('team_id', '=', 1)->get();

        $result = DB::table('roles')
            ->select('id', 'name')
            ->whereNotIn('id', DB::table('role_user')->select('role_id')->where('team_id', '=', 1)->where('user_id', '=', 1))->get();

        //SELECT id,name FROM roles WHERE id NOT IN
        //(SELECT role_id FROM role_user	WHERE team_id=1 AND user_id=1)


        dd($result);

        //dump($user->roles()->sync([1, 2, 3]));
        //dd($user->teams);
    }
}

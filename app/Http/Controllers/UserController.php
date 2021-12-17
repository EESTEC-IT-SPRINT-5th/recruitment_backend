<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function show($id)
    {
        return User::FindOrFail($id);
    }

    public function order()
    {
        //sort database
        //return pagination

        return
            User::OrderBy('score', 'desc')->get();

        // User::all()->sortBy(function (User $a, User  $b) {
        //     if ($a->score == $b->score) {
        //         return 0;
        //     }
        //     return ($a->score < $b->score) ? -1 : 1;
        // });;
    }

    public function create(Request $r)
    {
        $user = new User();
        $user->name = $r->input('name');
        //$user->password = Hash::make('userpassword');
        $user->email =
            $r->input('email');
        $user->dateOfBirth =
            $r->input('dateOfBirth');
        $user->gitHubUsername =
            $r->input('gitHubUsername');
        $user->acivityScore =
            $r->input('acivityScore');
        $user->numberOfEvents =
            $r->input('numberOfEvents');
        //TODO find the sorting algorythm
        $user->score = 10 * $user->acivityScore - $user->numberOfEvents / 100;


        $user->save();
        return $user;
    }
}

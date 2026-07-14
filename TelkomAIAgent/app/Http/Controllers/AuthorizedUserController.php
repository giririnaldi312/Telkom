<?php

namespace App\Http\Controllers;

use App\Models\AuthorizedUser;

class AuthorizedUserController extends Controller
{
    public function index()
    {
        $users = AuthorizedUser::latest()->get();

        return view('authorized-users', compact('users'));
    }
}

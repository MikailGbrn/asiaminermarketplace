<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class UserAdmin extends Controller
{
    public function showUser()
    {
        $user = User::all()->sortByDesc('id');
        return view('admin.list-user', compact('user'));
    }
}

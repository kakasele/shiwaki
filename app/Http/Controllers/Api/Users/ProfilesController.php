<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;


class ProfilesController extends Controller
{

    public function index()
    {
        return 'All users...';
    }

    public function show(User $user)
    {
        return view('profiles.show', [
            'profileUser' => $user,
            'articles' => $user->articles()->latest()->get(),
        ]);
    }

    public function store()
    {

        request()->validate([
            'avatar' => ['required', 'image'],
        ]);

        auth()->user()->update([
            'avatar_path' => request()
                ->file('avatar')
                ->store('avatars', 'public'),
            'username' => request('username'),
            'bio' => request('bio'),
        ]);

        return back();
    }
}

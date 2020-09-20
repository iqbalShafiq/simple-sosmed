<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function __invoke($identifier, $follow)
    {
        $user = User::where('hash', $identifier)->orWhere('username', $identifier)->firstOrFail();

        if ($follow == 'following') {
            $follows = $user->follows()->get();
        } else if ($follow == 'follower') {
            $follows = $user->follower()->get();
        }

        return view('follow.index', compact('user', 'follow', 'follows'));
    }
}

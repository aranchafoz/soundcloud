<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * GET function por retrieve user profile
     * @param $id of the user
     */
    public function getUserProfile($id) {
      $user = User::find($id);
      if (!$user) return abort(404);

      return view('users.profile', compact('user'));
    }
}

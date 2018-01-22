<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

    /**
     * PUT function for edit an user profile
     * @param $request http request with inputs
     * @param $id of the user
     */
    public function putEditProfile(Request $request, $id) {
      $user = User::find($id);
      if (!$user) return abort(404);

      // Handle user input
      $user->name = $request->input('name');
      $user->nick = $request->input('nick');
      $user->surname = $request->input('surname');
      $user->location = $request->input('location');
      $user->country = $request->input('country');
      $user->description = $request->input('description');
      /*$user->profile_photo = Storage::putFileAs(
        'images', $request->file('profile_photo'), 'profile_photo_'.$id
      );*/
      /*$user->profile_photo = $request->file('profile_photo')->storeAs(
        'images', 'profile_photo_'.$id.'.jpg');*/

      //Storage::disk('public')->put('profile_photo_'.$id, $request->file('profile_photo'));

      $user->profile_photo = $request->file('profile_photo')->store('public');

      if ($user->save()) {

      } else {

      }

      return redirect()->back();
    }
}

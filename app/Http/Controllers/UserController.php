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

      if ($request->file('profile_photo') && $user->profile_photo) {
        // Delete old profile pic
        Storage::delete($user->profile_photo);
      }

      if ($request->file('profile_photo')) {
          $user->profile_photo = $request->file('profile_photo')->store('public');
      }

      if ($user->save()) {

      } else {

      }

      return redirect()->back();
    }

    /**
     * PUT function for edit an user pic profile
     * @param $request http request with inputs
     * @param $id of the user
     */
    public function putEditPicProfile(Request $request, $id) {
      $user = User::find($id);
      if (!$user) return abort(404);

      $request->validate([
        'profile_photo_only' => 'required'
      ]);

      // Handle user input
      if ($user->profile_photo) {
        // Delete old profile pic
        Storage::delete($user->profile_photo);
      }

      $user->profile_photo = $request->file('profile_photo_only')->store('public');

      if ($user->save()) {

      } else {

      }

      return redirect()->back();
    }

    public function putEditLandscapePic(Request $request, $id) {
      $user = User::find($id);
      if (!$user) return abort(404);

      $request->validate([
        'landscape_photo' => 'required'
      ]);

      // Handle user input
      if ($user->landscape_photo) {
        // Delete old profile pic
        Storage::delete($user->landscape_photo);
      }

      $user->landscape_photo = $request->file('landscape_photo')->store('public');

      if ($user->save()) {

      } else {

      }

      return redirect()->back();
    }
}

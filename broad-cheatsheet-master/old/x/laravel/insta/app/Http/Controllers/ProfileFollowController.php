<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
//  php artisan make:migration creates_profile_user_pivot_table --create profile_user // lowercase alphabetical order
class ProfileFollowsController extends Controller
{

  public function __construct()
    {
      $this->middleware('auth')->except(['show']);
    }

    public function store(Profile $profile)
    {
              // toggle - attach/detach
      return auth()->user()->following()->toggle($profile);
        // $profile->follow();
        // return back();
    }

    // public function destroy($id, Profile $profile)
    // {
    //     $temp = $profile->findOrFail($id);
    //     if ($temp->followers_count > 0) {
    //         $profile->unFollow();
    //     }
    //     return back();
    // }
}

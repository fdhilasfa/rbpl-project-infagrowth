<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShowUserProfile;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\Auth;
use App\Models\User;


class ShowUserProfileController extends Controller
{

     public function showUserProfile()
{
    return view('showuserprofile');
}

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email_address' => 'required|email',
            'address' => 'required',
            'contact_number' => 'required',
            'province' => 'required',
            'city' => 'required',
            'birthday_month' => 'required',
            'birthday_day' => 'required|integer',
            'birthday_year' => 'required|integer',
        ]);

        $ShowUserProfile = new ShowUserProfile();
        $ShowUserProfile->first_name = $validatedData['first_name'];
        $ShowUserProfile->last_name = $validatedData['last_name'];
        $ShowUserProfile->email_address = $validatedData['email_address'];
        $ShowUserProfile->address = $validatedData['address'];
        $ShowUserProfile->contact_number = $validatedData['contact_number'];
        $ShowUserProfile->province = $validatedData['province'];
        $ShowUserProfile->city = $validatedData['city'];
        $ShowUserProfile->birthday_month = $validatedData['birthday_month'];
        $ShowUserProfile->birthday_day = $validatedData['birthday_day'];
        $ShowUserProfile->birthday_year = $validatedData['birthday_year'];
/*
        $user = Auth::user();
        $user->first_name = $validatedData['first_name'];
        $user->last_name = $validatedData['last_name'];
        $user->email_address = $validatedData['email_address'];
        $user->address = $validatedData['address'];
        $user->contact_number = $validatedData['contact_number'];
        $user->province = $validatedData['province'];
        $user->city = $validatedData['city'];
        $user->birthday_month = $validatedData['birthday_month'];
        $user->birthday_day = $validatedData['birthday_day'];
        $user->birthday_year = $validatedData['birthday_year'];

*/

        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $imageName = time() . "_" . $image->getClientOriginalName();
            $image->storeAs('public/profile_pictures', $imageName);

            $user = Auth::user();
            $user->profile_picture = $imageName;
            $user->save();

            //  $ShowUserProfile = Auth::user();

        }

        $ShowUserProfile->save();

          // Redirect to the show-profile route with the id parameter
          return view('showuserprofile', ['user' => $ShowUserProfile]);



    }
/*
    public function showProfile($id)
{
    $ShowUserProfile = ShowUserProfile::findOrFail($id);
    return view('showuserprofile', compact('ShowUserProfile'))
        ->with('header', view('header', compact('ShowUserProfile')));
}
*/public function __construct()
{
    $this->middleware('auth');
}


    public function showProfile($id)
    {
        $ShowUserProfile = ShowUserProfile::findOrFail($id);

        return view('showuserprofile',  compact('ShowUserProfile'));

    }




  /*  public function getUserProfilePicture()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $profilePicture = $user->profile_picture;
            return asset('storage/profile_pictures/' . $profilePicture);
        }

        return null;
    }*/


/*
    public function showUserData()
    {
        $ShowUserProfile = DB::table('user_profiles')->get(); // Retrieve growth data from the database table

        //dd($ShowUserProfile); // Add this line to display the data and stop further execution
        //return $ShowUserProfile;
        return view('showuserprofile', compact('showUserProfile'));
    }
*/

}

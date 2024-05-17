<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Models\User;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        $user = Auth::user();

        return view('admin.profile.index', compact('user'));
    }

    public function update(ProfileUpdateRequest $request)
    {
        $avatarPath = $this->uploadImage($request, 'avatar', $request->old_avatar);
        $bannerPath = $this->uploadImage($request, 'banner', $request->old_banner);

        $user = Auth::user();
        $user->avatar       = !empty($avatarPath) ? $avatarPath : $request->old_avatar;
        $user->banner       = !empty($bannerPath) ? $bannerPath : $request->old_banner;
        $user->name         = $request->name;
        $user->email        = $request->email;
        $user->phone        = $request->phone;
        $user->address      = $request->address;
        $user->about        = $request->about;
        $user->website      = $request->website;
        $user->fb_link      = $request->fb_link;
        $user->x_link       = $request->x_link;
        $user->in_link      = $request->in_link;
        $user->wa_link      = $request->wa_link;
        $user->instra_link  = $request->instra_link;
        $user->save();

        toastr()->success('Updated Successfully.');

        return redirect()->back();
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'min:5', 'confirmed']
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save(); 

        toastr()->success('Updated Password Successfully.');

        return redirect()->back();
    }
}

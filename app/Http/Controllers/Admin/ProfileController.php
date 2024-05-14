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
        $avatarPath = $this->uploadImage($request, 'avatar');
        $bannerPath = $this->uploadImage($request, 'banner');

        $user = Auth::user();
        $user->avatar       = !empty($avatarPath) ? $avatarPath : '';
        $user->banner       = !empty($bannerPath) ? $bannerPath : '';
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

        return redirect()->back();
    }
}

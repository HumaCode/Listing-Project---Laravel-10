<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HeroUpdateRequest;
use App\Models\Hero;
use App\Traits\FileUploadTrait;

class HeroController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return view('admin.hero.index');
    }

    public function update(HeroUpdateRequest $request)
    {
        $imagePath = $this->uploadImage($request, 'background');

        Hero::updateOrCreate(
            [
                'id' => 1,
            ],
            [
                'background'    => !empty($imagePath) ? $imagePath : '',
                'title'         => $request->title,
                'sub_title'     => $request->sub_title,
            ]
        );

        toastr()->success('Updated Hero Successfully.');


        return redirect()->back();
    }
}

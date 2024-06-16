<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListingImageGalery;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class ListingImageGaleryController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.listing.listing-image-galery.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'images'        => ['required'],
            'images.*'      => ['image', 'max:3000', 'mimes:jpg,jpeg,png'],
            'listing_id'    => ['required']
        ], [
            'images.*.image'    => 'One or more selected files are not valid images..!!',
            'images.*.max'      => 'One or more images exceed the maximum file size (3MB)..!!',
        ]);

        $imagePaths = $this->uploadMultipleImage($request, 'images');

        foreach ($imagePaths as $path) {
            $image = new ListingImageGalery();
            $image->listing_id  = $request->listing_id;
            $image->image       = $path;
            $image->save();
        }

        toastr()->success('Create Successfully.');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

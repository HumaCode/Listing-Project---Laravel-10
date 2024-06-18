<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListingVideoGalery;
use Illuminate\Http\Request;

class ListingVideoGaleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $videos = ListingVideoGalery::where('listing_id', $request->id)->get();


        return view('admin.listing.listing-video-galery.index', compact('videos'));
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
            'video_url'     => ['required', 'url'],
            'listing_id'    => ['required']
        ]);

        $video              = new ListingVideoGalery();
        $video->listing_id  = $request->listing_id;
        $video->video_url   = $request->video_url;
        $video->save();

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
        try {
            ListingVideoGalery::findOrFail($id)->delete();

            return response(['status' => 'success', 'message' => 'Item deleted successfully..!']);
        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}

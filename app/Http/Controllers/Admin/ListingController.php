<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ListingDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ListingStoreRequest;
use App\Http\Requests\Admin\ListingUpdateRequest;
use App\Models\Amenity;
use App\Models\Category;
use App\Models\Listing;
use App\Models\ListingAmenity;
use App\Models\Location;
use App\Traits\FileUploadTrait;
use Auth;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(ListingDataTable $dataTable)
    {
        return $dataTable->render('admin.listing.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        $location = Location::all();
        $amenity = Amenity::all();

        return view('admin.listing.create', compact('category', 'location', 'amenity'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ListingStoreRequest $request)
    {
        $imagePath      = $this->uploadImage($request, 'image');
        $thumbnailPath  = $this->uploadImage($request, 'thumbnail_image');
        $attachmentPath  = $this->uploadImage($request, 'file');

        $listing = new Listing();
        $listing->user_id               = Auth::user()->id;
        $listing->package_id            = 0;
        $listing->image                 = $imagePath;
        $listing->thumbnail_image       = $thumbnailPath;
        $listing->title                 = ucwords($request->title);
        $listing->slug                  = $request->slug;
        $listing->category_id           = $request->category_id;
        $listing->location_id           = $request->location_id;
        $listing->address               = $request->address;
        $listing->phone                 = $request->phone;
        $listing->email                 = $request->email;
        $listing->website               = $request->website;
        $listing->facebook_link         = $request->facebook_link;
        $listing->x_link                = $request->x_link;
        $listing->linkedin_link         = $request->linkedin_link;
        $listing->whatsapp_link         = $request->whatsapp_link;
        $listing->file                  = $attachmentPath;
        $listing->description           = $request->description;
        $listing->google_map_embed_code = $request->google_map_embed_code;
        $listing->seo_title             = $request->seo_title;
        $listing->seo_description       = $request->seo_description;
        $listing->status                = $request->status;
        $listing->is_verified           = $request->is_verified;
        $listing->is_featured           = $request->is_featured;
        $listing->expire_date           = date('Y-m-d');
        $listing->save();


        foreach ($request->amenities as $amenityId) {
            $amenity = new ListingAmenity();
            $amenity->listing_id = $listing->id;
            $amenity->amenity_id = $amenityId;
            $amenity->save();
        }

        toastr()->success('Create Successfully.');

        return to_route('admin.listing.index');
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
        $category               = Category::all();
        $location               = Location::all();
        $amenity                = Amenity::all();
        $listing                = Listing::findOrFail($id);
        $listingAmenities       = ListingAmenity::where('listing_id', $listing->id)->pluck('amenity_id')->toArray();


        return view('admin.listing.edit', compact('category', 'location', 'amenity', 'listing', 'listingAmenities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ListingUpdateRequest $request, string $id)
    {
        $imagePath      = $this->uploadImage($request, 'image', $request->old_image);
        $thumbnailPath  = $this->uploadImage($request, 'thumbnail_image', $request->old_thumbnail_image);
        $attachmentPath  = $this->uploadImage($request, 'file', $request->old_file);

        $listing =  Listing::findOrFail($id);
        $listing->user_id               = Auth::user()->id;
        $listing->package_id            = 0;
        $listing->image                 = !empty($imagePath) ? $imagePath : $request->old_image;
        $listing->thumbnail_image       = !empty($thumbnailPath) ? $thumbnailPath : $request->old_thumbnail_image;
        $listing->title                 = ucwords($request->title);
        $listing->slug                  = $request->slug;
        $listing->category_id           = $request->category_id;
        $listing->location_id           = $request->location_id;
        $listing->address               = $request->address;
        $listing->phone                 = $request->phone;
        $listing->email                 = $request->email;
        $listing->website               = $request->website;
        $listing->facebook_link         = $request->facebook_link;
        $listing->x_link                = $request->x_link;
        $listing->linkedin_link         = $request->linkedin_link;
        $listing->whatsapp_link         = $request->whatsapp_link;
        $listing->file                  = !empty($attachmentPath) ? $attachmentPath : $request->old_file;
        $listing->description           = $request->description;
        $listing->google_map_embed_code = $request->google_map_embed_code;
        $listing->seo_title             = $request->seo_title;
        $listing->seo_description       = $request->seo_description;
        $listing->status                = $request->status;
        $listing->is_verified           = $request->is_verified;
        $listing->is_featured           = $request->is_featured;
        $listing->expire_date           = date('Y-m-d');
        $listing->save();


        // foreach ($request->amenities as $amenityId) {
        //     $amenity = new ListingAmenity();
        //     $amenity->listing_id = $listing->id;
        //     $amenity->amenity_id = $amenityId;
        //     $amenity->save();
        // }

        toastr()->success('Updated Successfully.');

        return to_route('admin.listing.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



    // slug
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Listing::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}

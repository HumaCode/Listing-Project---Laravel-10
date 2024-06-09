<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\AmenityDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AmenityStoreRequest;
use App\Http\Requests\Admin\AmenityUpdateRequest;
use App\Models\Amenity;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class AmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AmenityDataTable $dataTable)
    {
        return $dataTable->render('admin.amenity.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.amenity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AmenityStoreRequest $request)
    {
        $amenity                   = new Amenity();
        $amenity->icon             = $request->icon;
        $amenity->name             = ucwords($request->name);
        $amenity->slug             = $request->slug;
        $amenity->status           = $request->status;
        $amenity->save();

        toastr()->success('Create Amenity Successfully.');

        return to_route('admin.amenity.index');
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
        $amenity = Amenity::findOrFail($id);

        return view('admin.amenity.edit', compact('amenity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AmenityUpdateRequest $request, string $id)
    {
        $amenity                   = Amenity::findOrFail($id);
        $amenity->icon             = $request->filled('icon') ?  $request->icon : $amenity->icon;
        $amenity->name             = ucwords($request->name);
        $amenity->slug             = $request->slug;
        $amenity->status           = $request->status;
        $amenity->save();

        toastr()->success('Update Amenity Successfully.');

        return to_route('admin.amenity.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Amenity::findOrFail($id)->delete();

            return response(['status' => 'success', 'message' => 'Item deleted successfully..!']);
        } catch (\Exception $e) {
            logger($e);
            return response(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }




    // slug
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Amenity::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}

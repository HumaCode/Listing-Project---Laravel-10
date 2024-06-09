<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\LocationDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LocationStoreRequest;
use App\Models\Location;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(LocationDataTable $dataTable)
    {
        return $dataTable->render('admin.location.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.location.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationStoreRequest $request)
    {
        $location                   = new Location();
        $location->name             = ucwords($request->name);
        $location->slug             = $request->slug;
        $location->show_at_home     = $request->show_at_home;
        $location->status           = $request->status;
        $location->save();

        toastr()->success('Create Location Successfully.');

        return to_route('admin.location.index');
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


    // slug
    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Location::class, 'slug', $request->name);

        return response()->json(['slug' => $slug]);
    }
}

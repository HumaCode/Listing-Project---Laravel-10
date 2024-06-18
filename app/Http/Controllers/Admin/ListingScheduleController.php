<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ListingScheduleDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\listingScheduleStoreRequest;
use App\Models\ListingSchedule;
use Illuminate\Http\Request;

class ListingScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ListingScheduleDataTable $dataTable)
    {
        return $dataTable->render('admin.listing.listing-schedule.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($listingId)
    {
        return view('admin.listing.listing-schedule.create', compact('listingId'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(listingScheduleStoreRequest $request, $listingId)
    {
        $schedule = new ListingSchedule();
        $schedule->listing_id = $listingId;
        $schedule->day = $request->day;
        $schedule->start_time = $request->start_time;
        $schedule->end_time = $request->end_time;
        $schedule->status = $request->status;
        $schedule->save();

        toastr()->success('Create Successfully.');

        return to_route('admin.listing-schedule.index', ['id' => $listingId]);
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

@extends('admin.layouts.master')

@push('css')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
@endpush

@section('contents')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.listing-schedule.index', ['id' => $schedule->id]) }}" class="btn btn-icon"><i
                        class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Listing Schedule</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a
                        href="{{ route('admin.listing-schedule.index', ['id' => $schedule->id]) }}">Listing
                        Schedule</a></div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Listing Schedule</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.listing-schedule.update', $schedule->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Day <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12 col-md-7">
                                        <div
                                            class="selectric-wrapper selectric-form-control selectric-selectric selectric-below">
                                            <div class="selectric-hide-select">
                                                <select class="form-control selectric" tabindex="-1" name="day">
                                                    <option value="">Choose</option>

                                                    @foreach (config('listing-schedule.days') as $day)
                                                        <option value="{{ $day }}" @selected($day === $schedule->day)>
                                                            {{ ucwords($day) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Start Time <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control timepicker-1" name="start_time"
                                            id="start_time">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">End Time <span
                                            class="text-danger">*</span></label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control timepicker-2" name="end_time"
                                            id="end_time">
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div
                                            class="selectric-wrapper selectric-form-control selectric-selectric selectric-below">
                                            <div class="selectric-hide-select">
                                                <select class="form-control selectric" tabindex="-1" name="status">
                                                    <option value="1" @selected($schedule->status === 1)>Active</option>
                                                    <option value="0" @selected($schedule->status === 0)>Inactive</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>&nbsp;
                                            Save</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('style')
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

    <script>
        $('.timepicker-1').timepicker({
            timeFormat: 'h:mm p',
            interval: 60,
            minTime: '10',
            maxTime: '6:00pm',
            defaultTime: '{{ $schedule->start_time }}',
            startTime: '10:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });

        $('.timepicker-2').timepicker({
            timeFormat: 'h:mm p',
            interval: 60,
            minTime: '10',
            maxTime: '6:00pm',
            defaultTime: '{{ $schedule->end_time }}',
            startTime: '10:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
    </script>
@endpush
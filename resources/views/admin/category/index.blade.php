@extends('admin.layouts.master')

@push('css')
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
@endpush

@section('contents')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.dashboard.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Category</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Category</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Category</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.category.create') }}" class="btn btn-primary"><i
                                        class="fas fa-plus"></i> &nbsp; Create</a>
                            </div>
                        </div>
                        <div class="card-body">

                            {{ $dataTable->table() }}

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('style')
    <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush

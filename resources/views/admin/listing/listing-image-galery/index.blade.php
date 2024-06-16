@extends('admin.layouts.master')

@push('css')
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css"> --}}
@endpush

@section('contents')
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="{{ route('admin.listing.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>Listing Image Galery</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('admin.listing.index') }}">Listing</a></div>
                <div class="breadcrumb-item">Listing Image Galery</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Image Galery</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.listing-image-galery.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image <span
                                            class="text-danger">(multi image supported)</span></label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="file" class="form-control" name="images[]" id="images" multiple
                                            accept=".jpg,.jpeg,.png">
                                        <input type="hidden" name="listing_id" value="{{ request()->id }}">
                                        <div class="text-danger">* Allowable size 420×280 px</div>

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

        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Image Galery</h4>
                        </div>
                        <div class="card-body">

                            <table class="table">
                                <thead class="thead-dark text-center">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($images as $item)
                                        <tr class="text-center">
                                            <th scope="row">{{ $loop->iteration }}.</th>
                                            <td class="p-2">
                                                <img src="{{ asset($item->image) }}" width="30%" alt="">
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.listing-image-galery.destroy', $item->id) }}"
                                                    class="btn btn-sm btn-danger delete-item"> <i class="fas fa-trash"></i>
                                                    &nbsp; Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('style')
    {{-- <script src="//cdn.datatables.net/2.0.8/js/dataTables.min.js"></script> --}}
    {{-- {{ $dataTable->scripts(attributes: ['type' => 'module']) }} --}}


    <script>
        $('body').on('click', '.delete-item', function(e) {
            e.preventDefault();

            let url = $(this).attr('href');
            console.log(url);

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });
            swalWithBootstrapButtons.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        method: 'DELETE',
                        url: url,
                        data: {
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                swalWithBootstrapButtons.fire({
                                    title: "Deleted!",
                                    text: response.message,
                                    icon: "success"
                                }).then(() => {
                                    window.location.reload();
                                });

                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    });

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire({
                        title: "Cancelled",
                        text: "Your imaginary file is safe :)",
                        icon: "error"
                    });
                }
            });
        });
    </script>
@endpush

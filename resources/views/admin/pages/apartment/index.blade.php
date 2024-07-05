@extends('admin.layouts.app')
@push('title', 'Apartment')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Hyresprofil</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Lägenhet</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Lägenhet</h3>
        </div>
        <div class="card-body">
            <div class="fancy-table rounded">
                <table class="table table-striped table-bordered dt-table">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Name</th>
                            <th scope="col">Room</th>
                            <th scope="col">Size</th>
                            <th scope="col">Status</th>
                            <th scope="col">time</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script type="text/javascript">
        $(function() {
            $(document).ready(function() {
                let url = "{{ route('admin.apartment.index') }}";
                var table = $('.dt-table').DataTable({
                    lengthChange: false,
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    autoWidth: false,
                    ajax: {
                        url: url,
                        complete: statusUpdate
                    },
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'room',
                            name: 'room'
                        },
                        {
                            data: 'size',
                            name: 'size'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'created_at',
                            name: 'created_at'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        }
                    ],
                });
            });
        });
    </script>

    <script>
        function statusUpdate() {
            $('.status').on('change', function() {
                let status = $(this).val();
                let id = $(this).data('id');

                Swal.fire({
                title: "Are you sure Update?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, Update It!"
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/admin/apartment/status/" + id,
                        method: "POST",
                        data: {
                            status: status,
                            id: id,
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            Swal.fire({
                                title: "SUCCESS",
                                text: "Status Update Successfully",
                                icon: "success"
                            });
                        },
                        error: function(xhr, status, error) {
                            Swal.fire({
                                title: "SUCCESS",
                                text: "'An error occurred while updating status: '" + error,
                                icon: "success"
                            });
                        }
                    });
                }
            });
            });
        }
    </script>
@endpush

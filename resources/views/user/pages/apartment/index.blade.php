@extends('user.layouts.app')
@push('title', 'Apartment')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Apartment</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Apartment</h3>
            <a class="btn btn-primary" href="{{route('user.apartment.create')}}">Create New Request</a>
        </div>
        <div class="card-body">
            <div class="fancy-table rounded">
                <table class="table table-striped table-bordered dt-table">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>
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
                let url = "{{ route('user.apartment.index') }}";
                var table = $('.dt-table').DataTable({
                    lengthChange: false,
                    processing: true,
                    serverSide: true,
                    responsive:true,
                    autoWidth: false,
                    ajax: url,
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
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
                            name: 'size'
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
@endpush

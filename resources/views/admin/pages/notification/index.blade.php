@extends('admin.layouts.app')
@push('title', 'Notification')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Notification</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Notification</h3>
        
        <div class="ms-auto">
            <a href="{{ route('admin.notification.create') }}" class="btn btn-primary">Create</a>
        </div>
        </div>
        <div class="card-body">
            <div class="fancy-table rounded">
                <table class="table table-striped table-bordered dt-table">
                    <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Title</th>
                            <th scope="col">Time</th>
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
                let url = "{{ route('admin.notification.index') }}";
                var table = $('.dt-table').DataTable({
                    lengthChange: true,
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
                            data: 'title',
                            name: 'title'
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

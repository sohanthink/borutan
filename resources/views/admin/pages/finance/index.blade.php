@extends('admin.layouts.app')
@push('title', 'Finance')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Finances</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Finances</h3>
        
        <div class="ms-auto">
            <a href="{{ route('admin.finance.create') }}" class="btn btn-primary">Create</a>
        </div>
        </div>
        <div class="card-body">
            <div class="fancy-table rounded">
                <table class="table table-striped table-bordered dt-table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Field</th>
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
                // let params = "{{ Request::get('user_type') }}"
                let url = "{{ route('admin.finance.index') }}";
                // if (params != '') {
                //     url += "?user_type=" + params;
                // }
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
                            data: 'name',
                            name: 'Name'
                        },
                        {
                            data: 'status',
                            name: 'Status'
                        },
                        {
                            data: 'field',
                            name: 'Field'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: true,
                            searchable: true
                        },
                    ],
                });
            });
        });
    </script>
@endpush

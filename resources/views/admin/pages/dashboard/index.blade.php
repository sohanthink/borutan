@extends('admin.layouts.app')
@push('title', 'Dashboard')
@section('content')
    <!--breadcrumb-->
    <div class="d-flex align-items-center justify-content-between">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Hyresprofil</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Hyresprofil</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-danger">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-danger">Total inquiry</p>
                            <h4 class="my-1 text-danger">{{ $total_inquiry }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto"><i
                                class='bx bx-buildings'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-success">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-success">Pendind inquiry</p>
                            <h4 class="my-1 text-success">{{ $pendind_inquiry }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-success text-white ms-auto"><i
                                class='bx bx-buildings'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-primary">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-primary">Approved inquiry</p>
                            <h4 class="my-1 text-primary">{{ $approved_inquiry }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-primary text-white ms-auto"><i
                                class='bx bx-buildings'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-warning">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-warning">Rejected inquiry</p>
                            <h4 class="my-1 text-warning">{{ $rejected_inquiry }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto"><i
                                class='bx bx-buildings'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-info">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-info">Total User</p>
                            <h4 class="my-1 text-info">{{ $total_user }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-info text-white ms-auto"><i class='bx bxs-group'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-warning">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-warning">Total Subscriber</p>
                            <h4 class="my-1 text-warning">{{ $total_subscriber }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-warning text-white ms-auto"><i
                                class='bx bxs-group'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-secondary">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-secondary">Total Message</p>
                            <h4 class="my-1 text-secondary">{{ $total_message }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-secondary text-white ms-auto"><i
                                class='bx bxs-group'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 border-start border-0 border-3 border-danger">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <p class="mb-0 text-danger">Total new Message</p>
                            <h4 class="my-1 text-danger">{{ $total_new_message }}</h4>
                        </div>
                        <div class="widgets-icons-2 rounded-circle bg-danger text-white ms-auto"><i
                                class='bx bxs-group'></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end row-->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table mb-0 dt-table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Time</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($latest_inquiry as $inquiry)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $inquiry->user?$inquiry->user->first_name:'' }}{{ $inquiry->user?$inquiry->user->last_name:'' }}</td>
                                    <td>
                                        @if ($inquiry->status == 'Approved')
                                            <span class="badge bg-success">{{ $inquiry->status }}</span>
                                        @elseif ($inquiry->status == 'Reject')
                                            <span class="badge bg-danger">{{ $inquiry->status }}</span>
                                        @else
                                            <span class="badge bg-info">{{ $inquiry->status }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $inquiry->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.apartment.show', $inquiry->id) }}"
                                            class="text-white btn btn-info"><i class="lni lni-eye"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript">
        $(function() {
            $(document).ready(function() {
                var table = $('.dt-table').DataTable({
                    lengthChange: true,
                    responsive: true,
                });
            });
        });
    </script>
@endpush

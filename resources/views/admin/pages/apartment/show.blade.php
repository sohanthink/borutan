@extends('admin.layouts.app')
@push('title', 'Apartment')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Apartment</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Apartment</h3>
            <a class="btn btn-primary" href="{{route('admin.apartment.index')}}">Back</a>
        </div>
        <div class="card-body">
            <div class="card-body">
                <p><strong>User Name : </strong>{{ $apartment->user?$apartment->user->first_name:'' }}{{ $apartment->user?$apartment->user->last_name:'' }}</p>
                <p><strong>Total Room : </strong>{{ $apartment->room }}</p>
                <p><strong>Room Type: </strong>
                    @if ($apartment->type == 3)
                        All
                    @elseif ($apartment->type == 2)
                    Subcontract
                    @else
                    First hand contract
                    @endif
                </p>
                <p><strong>Room Size : </strong>{{ $apartment->size }} sqm</p>
                <p><strong>Max Rent : </strong>{{ $apartment->rent }} </p>
                <p><strong>Location : </strong>
                    @if(!is_null($apartment->location) && is_string($apartment->location))
                        @foreach(json_decode($apartment->location, true) as $key => $value)
                            <span class="badge badge-success bg-success">{{ $value }}</span>
                        @endforeach
                    @endif
                </p>
                <p>
                    <div class="row mb-3">
                        <label for="inputEnterYourName" class="col-sm-1 col-form-label"><strong>Status : </strong></label>
                        <div class="col-sm-4">
                            <select class="form-select" id="status" aria-label="Default select example">
                                <option value="Approved" {{$apartment->status == "Approved"?'selected':''}}>Approved</option>
                                <option value="Pending" {{$apartment->status == "Pending"?'selected':''}}>Pending</option>
                                <option value="Reject" {{$apartment->status == "Reject"?'selected':''}}>Reject</option>
                              </select>
                        </div>
                    </div>
                    </p>
                <p><strong>Created at : </strong>{{ $apartment->created_at->format('d M Y') }}</p>
                <p><strong>Read at : </strong>{{ $apartment->is_read->format('d M Y') }}</p>
            </div>
        </div>
    </div>
@endsection
@push('script')
<script>
    $(document).ready(function() {
        $('#status').on('change', function() {
            let status = $(this).val();
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
                        url: "{{ route('admin.apartment.status',$apartment->id) }}",
                        method: "POST",
                        data: {
                            status: status,
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            Swal.fire({
                            title: "SUCCESS",
                            text: "Status Update Successfully",
                            icon: "success"
                        });
                        },
                        error: function(response) {
                            if (errors && errors.link) {
                                Swal.fire({
                                    title: "SUCCESS",
                                    text: (errors.link[0]),
                                    icon: "success"
                                });
                            }
                        }
                    });
                }
            });
        });
    });
</script>
@endpush
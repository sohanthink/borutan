@extends('admin.layouts.app')
@push('title', 'Create New user')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">User</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card border-top border-0 border-4 border-primary p-4">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="mb-0 text-primary">user</h3>
                
                <div class="ms-auto">
                    <a href="{{ route('admin.user.index') }}" class="btn btn-primary">Back</a>
                </div>
                </div>
                
                <div class="card-body">
                    <form method="post" action="{{ route('admin.user.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-2">
                            <label class="form-label" for="first_name">First Name <span class="text-danger">*</span></label>
                            <input type="text" name="first_name" class="form-control" id="first_name" value="{{old('first_name')}}">
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label" for="last_name">Last Name <span class="text-danger">*</span></label>
                            <input type="text" name="last_name" class="form-control" id="last_name" value="{{old('last_name')}}">
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}">
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label" for="number">Phone number</label>
                            <input type="text" name="number" class="form-control" id="number" value="{{old('number')}}">
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label" for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address" value="{{old('address')}}">
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label" for="city">City</label>
                            <input type="text" name="city" class="form-control" id="city" value="{{old('city')}}">
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label">Status</label>
                            <select class="form-select mb-3 shadow-none" name="status">
                                <option selected="">Select a status</option>
                                <option {{old('status') == "Approved" ?'selected':'' }} value="Approved">Approved</option>
                                <option {{old('status') == "Pending" ?'selected':'' }} value="Pending">Pending</option>
                                <option {{old('status') == "Suspend" ?'selected':'' }} value="Suspend">Suspend</option>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label" for="pwd">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password" id="pwd">
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label" for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        <a href="{{ route('admin.user.index') }}" class="btn btn-danger mt-3">cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
@endpush

@extends('admin.layouts.app')
@push('title', 'Edit Your Finance')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Finances</li>
                    <li class="breadcrumb-item active" aria-current="page">{{$finance->name}}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card border-top border-0 border-4 border-primary p-4">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="mb-0 text-primary">Finances</h3>
                
                <div class="ms-auto">
                    <a href="{{ route('admin.finance.index') }}" class="btn btn-primary">Back</a>
                </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.finance.update', $finance->id) }}">
                        @csrf
                        @method('put')
                        <div class="form-group mt-2">
                            <label class="form-label" for="email1101">Name</label>
                            <input type="text" name="name" class="form-control" id="email1101"
                                value="{{ $finance->name }}">
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label">Status</label>
                            <select class="form-select mb-3 shadow-none" name="status">
                                <option selected="">Select a status</option>
                                <option {{ $finance->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                <option {{ $finance->status == 0 ? 'selected' : '' }} value="0">Deactive</option>
                            </select>
                        </div>
        
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        <a href="{{ route('admin.finance.index') }}" class="btn btn-danger mt-3">cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

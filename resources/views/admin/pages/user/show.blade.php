@extends('admin.layouts.app')
@push('title', 'user Details')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">user</li>
                    <li class="breadcrumb-item active" aria-current="page">{{$user->first_name }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>user</h3>
        
        <div class="ms-auto">
            <a href="{{ route('admin.user.index') }}" class="btn btn-primary">Back</a>
        </div>
        </div>
        
        <div class="card-body">
            <p><strong>First Name : </strong>{{ $user->first_name }}</p>
            <p><strong>Last Name : </strong>{{ $user->last_name }}</p>
            @isset($user->package_id)
                <p><strong>Package : </strong>{{ $user->package?$user->package->name:'' }}</p>
            @endisset
            <p><strong>Status : </strong>{!! $user->status== "Approved"?'<span class="badge bg-success">'.$user->status.'</span>':'<span class="badge bg-warning">'.$user->status.'</span>'  !!}</p>
            <p><strong>Created at : </strong>{{ $user->created_at->format('d M Y') }}</p>
            <img class="rounded img-fluid avatar-60 me-3" src="{{ $user->getFirstMediaUrl('avatar') }}"
                alt="" loading="lazy" />
        </div>
    </div>
@endsection

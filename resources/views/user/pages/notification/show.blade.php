@extends('user.layouts.app')
@push('title', 'Notification')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Notification</li>
                    <li class="breadcrumb-item active" aria-current="page">{{$notification->title}}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Notification</h3>
                
                <div class="ms-auto">
                    <a href="{{ route('user.notification.index') }}" class="btn btn-primary">Back</a>
                </div>
                </div>
                <div class="card-body">
                    {{$notification->message}}
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('user.layouts.app')
@push('title', 'Subscription')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Subscription</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card">

                <div class="card-header d-flex justify-content-between">
                    <h3>{{auth()->user()->package?auth()->user()->package->name:''}}</h3>
                    <div class="ms-auto">
                        <span class="badge bg-primary">{{isset($packages)?'Active':'In Active'}}</span>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">{{__('user/profile.package_name')}} : {{auth()->user()->package?auth()->user()->package->name:''}}</li>
                        <li class="list-group-item">{{__('user/profile.package_proposals')}} : {{auth()->user()->package?auth()->user()->package->contract:''}}</li>
                        <li class="list-group-item">{{__('user/profile.package_price')}} : {{auth()->user()->package?auth()->user()->package->price:''}}</li>
                        <li class="list-group-item">{{__('user/profile.package_desc')}} : {{auth()->user()->package?auth()->user()->package->description:''}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

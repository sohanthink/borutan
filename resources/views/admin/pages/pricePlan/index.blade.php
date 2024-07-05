@extends('admin.layouts.app')
@push('title', 'Invoice')
@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Product</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Invoice</li>
            </ol>
        </nav>
    </div>
</div>
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h3>Product</h3>
        <a href="{{route('admin.price-plan.create')}}" class="btn btn-primary">
           Create Product
        </a>
    </div>
    <div class="card-body">
        <div class="table">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Plan Name</th>
                        <th>Price</th>
                        <th>Currency</th>
                        <th>Interval</th>
                        <th>Interval Count</th>
                        <th>Trial Period Days</th>
                        <th>Payment Plan Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pricePlans as $plan)
                    <tr>
                        <td>{{$plan->product->name}}</td>
                        <td>{{$plan->name}}</td>
                        <td>{{$plan->price}}</td>
                        <td>{{$plan->currency}}</td>
                        <td>{{$plan->interval}}</td>
                        <td>{{$plan->interval_count}}</td>
                        <td>{{$plan->trial_period_days}}</td>
                        <td>{{$plan->plan_payment_type}}</td>
                        <td>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

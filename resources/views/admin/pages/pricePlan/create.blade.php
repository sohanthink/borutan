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
        <a href="{{route('admin.product.create')}}" class="btn btn-primary">
           Create Plan
        </a>
    </div>
    <div class="card-body">
        <form action="{{route('admin.price-plan.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="product_id" class="form-label">Product</label>
                <select class="form-control" name="product_id" id="product_id">
                    <option value="">Select Product</option>
                    @foreach ($products as $product)
                        <option value="{{$product->id}}">{{$product->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price">
            </div>
            <div class="mb-3">
                <label for="conversion_id" class="form-label">Conversion ID</label>
                <input type="number" class="form-control" id="conversion_id" name="conversion_id">
            </div>
            <div class="mb-3">
                <label for="currency" class="form-label">Currency</label>
                <input type="text" class="form-control" id="currency" name="currency" value="TRY">
            </div>
            <div class="mb-3">
                <label for="interval" class="form-label">Interval</label>
                <input type="text" class="form-control" id="interval" name="interval" value="WEEKLY">
            </div>
            <div class="mb-3">
                <label for="payment_interval_count" class="form-label">Payment Interval Count</label>
                <input type="text" class="form-control" id="payment_interval_count" name="payment_interval_count" value="1">
            </div>
            <div class="mb-3">
                <label for="trial_period_days" class="form-label">Trial Period Days</label>
                <input type="text" class="form-control" id="trial_period_days" name="trial_period_days" value="0">
            </div>
            <div class="mb-3">
                <label for="recurrence_count" class="form-label">Recurrence Count</label>
                <input type="text" class="form-control" id="recurrence_count" name="recurrence_count" value="5">
            </div>
            <div class="mb-3">
                <label for="planPayment_type" class="form-label">PlanPayment Type</label>
                <input type="text" class="form-control" id="planPayment_type" name="planPayment_type" value="RECURRING">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection

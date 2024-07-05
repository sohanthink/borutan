@extends('admin.layouts.app')
@push('title', 'Contact')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Contact</li>
                    <li class="breadcrumb-item active" aria-current="page">{{$contact->name }}</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>contact</h3>
        
        <div class="ms-auto">
            <a href="{{ route('admin.contact.index') }}" class="btn btn-primary">Back</a>
        </div>
        </div>
        
        <div class="card-body">
            <p><strong>Name : </strong>{{ $contact->name }}</p>
            <p><strong>Email : </strong>{{ $contact->email }}</p>
            <p><strong>Subject : </strong>{{ $contact->subject }}</p>
            <p><strong>Send Time : </strong>{{ $contact->created_at->format('d M Y') }}</p>
            <p><strong>Mesasge : </strong>{{ $contact->message }}</p>
        </div>
    </div>
@endsection

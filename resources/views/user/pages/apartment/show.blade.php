@extends('user.layouts.app')
@push('title', 'Apartment')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Apartment</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Apartment</h3>
            <a class="btn btn-primary" href="{{route('user.apartment.index')}}">Back</a>
        </div>
        <div class="card-body">
            <div class="card-body">
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
                <p><strong>Room Size : </strong>{{ $apartment->size }}</p>
                <p><strong>Max Rent : </strong>{{ $apartment->rent }}</p>
                <p><strong>location : </strong>{{ $apartment->location }}</p>
                <p><strong>Status : </strong>{!! $apartment->status== "Approved"?'<span class="badge bg-success">'.$apartment->status.'</span>':'<span class="badge bg-warning">'.$apartment->status.'</span>'  !!}</p>
                <p><strong>Created at : </strong>{{ $apartment->created_at->format('d M Y') }}</p>
            </div>
        </div>
    </div>
@endsection

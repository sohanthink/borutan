@extends('admin.layouts.app')
@push('title', 'Create New Finance')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Finances Fiels</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">         
            <div class="card border-top border-0 border-4 border-primary p-4">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="mb-0 text-primary">Finances Field</h3>
                
                <div class="ms-auto">
                    <a href="{{ route('admin.finance.index') }}" class="btn btn-primary">Back</a>
                </div>
                </div>
                
                <div class="card-body">
                    <form method="post" action="{{ route('admin.finance.field.store',$wallet_id) }}">
                        @csrf
                        <div class="form-group mt-2">
                            <label class="form-label" for="email1101">Name</label>
                            <input type="text" name="name" class="form-control" id="email1101">
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label" for="email1101">Placeholder</label>
                            <input type="text" name="placeholder" class="form-control" id="email1101">
                        </div>
                        <div class="form-group mt-2">
                            <input class="form-check-input" type="checkbox" value="1" name="require" id="require">
                            <label class="form-check-label" for="require">Require</label>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        <a href="{{ route('admin.manager.index') }}" class="btn btn-danger mt-3">cancel</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-top border-0 border-4 border-primary p-4">
                <div class="card-body">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NAme</th>
                                <th scope="col">PlaceHolder</th>
                                <th scope="col">Require</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($fields as $field)   
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$field->name}}</td>
                                <td>{{$field->placeholder}}</td>
                                <td>{{$field->require == '1' ?'Required':'Optional'}}</td>
                                <td>
                                    <a href="{{route('admin.finance.field.delete', $field->id)}}" class="btn btn-danger"><i class="fadeIn animated bx bx-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

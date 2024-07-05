@extends('admin.layouts.app')
@push('title', 'Notification')
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Create Notification</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card border-top border-0 border-4 border-primary p-4">
                <div class="card-header d-flex justify-content-between">
                    <h3>Notification</h3>
                
                <div class="ms-auto">
                    <a href="{{ route('admin.notification.index') }}" class="btn btn-primary">Back</a>
                </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('admin.notification.store')}}">
                        @csrf
                       <div class="form-group mt-2">
                            <label class="form-label" for="sent_to">Sent to</label>
                            <select name="sent_to[]" id="sent_to" class="form-control select2" multiple>
                                <option value="All">All User</option>
                                <option value="user">All user</option>
                                <option value="Manager">All Manager</option>
                                @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->first_name}} {{$user->last_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label" for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title">
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label" for="message">Message</label>
                            <textarea name="message" class="form-control" id="message" cols="30" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        <a href="http://127.0.0.1:8000/admin/category" class="btn btn-danger mt-3">cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
    $('.select2').select2({
        placeholder: "Select A Option",
        allowClear: Boolean($(this).data('allow-clear')),
        theme: 'bootstrap4',
    });
    </script>
@endpush
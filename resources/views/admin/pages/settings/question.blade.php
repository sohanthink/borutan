@extends('admin.layouts.app')
@push('title', 'General | Settings')
@push('settings', 'active')
@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Dashboard</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Appearance Settings</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-lg-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title pb-2">Settings</h4>
                <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                    @include('admin.pages.settings.sidebar')
                </ul>
            </div>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Appearance Information</h4>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <h6 class="card-title mb-1">Register Question</h6>
                    <a href="" class="btn btn-primary btn-sm float-right" data-target="#modaldemo1"
                        data-toggle="modal">
                        <i class="fa fa-plus-circle"></i>
                        <span>Create</span>
                    </a>
                    <!-- Form Modal -->
                    <div class="modal" id="modaldemo1">
                        <div class="modal-dialog wd-xl-400" role="document">
                            <div class="modal-content">
                                <div class="modal-body pd-20 pd-sm-40">
                                    <button aria-label="Close" class="close pos-absolute t-15 r-20 tx-26"
                                        data-dismiss="modal" type="button"><span
                                            aria-hidden="true">&times;</span></button>
                                    <h5 class="modal-title mb-4 text-center">Register Form Question</h5>
                                    <form action="{{ route('admin.settings.question.store') }}" method="post">
                                        @csrf
                                        <div class="form-group mt-2">
                                            <input name="name" class="form-control" placeholder="Name"
                                                type="text" required>
                                        </div>
                                        <div class="form-group mt-2">
                                            <input name="placeholder" class="form-control" placeholder="Placeholder"
                                                type="text" required>
                                        </div>
                                        <div class="form-group mt-2">
                                            <select name="required" id="required" class="form-control w-100">
                                                <option value="1">Required</option>
                                                <option value="0">Optional</option>
                                            </select>
                                        </div>
                                        <button class="btn ripple btn-primary btn-block">Continue</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card custom-card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped mg-b-0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>PlaseHolder</th>
                                                <th>Required Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($questions as $question)
                                                <tr>
                                                    <th scope="row">{{ $question->id }}</th>
                                                    <td>{{ $question->name }}</td>
                                                    <td>{{ $question->placeholder }}</td>
                                                    <td>
                                                        @if ($question->required == 1)
                                                            <span class="badge badge-success">Required</span>
                                                        @else
                                                            <span class="badge badge-danger">Optional</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.settings.question.delete', $question->id) }}"
                                                            onclick="return confirm('are u sure to delete?')"
                                                            class="btn btn-danger btn-sm">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endpush

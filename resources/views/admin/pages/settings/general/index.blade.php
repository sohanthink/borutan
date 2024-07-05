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
                    <li class="breadcrumb-item active" aria-current="page">General Settings</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title pb-2">Settings</h4>
                    <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                        @include('admin.pages.settings.sidebar')
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card border-top border-0 border-4 border-primary p-4">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="mb-0 text-primary">General Information</h4>
                    </div>
                </div>
                <form action="{{ route('admin.settings.general.update') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group mt-2">
                            <label for="site_title">Site Title</label>
                            <input type="text" class="form-control input-lg" name="site_title"
                                value="{{ setting('site_title') ?? old('site_title') }}" placeholder="Site Title">
                        </div>
                        <div class="form-group mt-2">
                            <label for="site_description">Site Description</label>
                            <textarea name="site_description" id="" class="form-control" placeholder="Site Description">{{ setting('site_description') ?? old('site_description') }}</textarea>
                        </div>
                        <div class="form-group mt-2">
                            <label for="footer_text">Footer Text</label>
                            <input type="text" class="form-control input-lg"
                                value="{{ setting('footer_text') ?? old('footer_text') }}" name="footer_text"
                                placeholder="Footer Text">
                        </div>
                        <div class="form-group mt-2">
                            <button class="btn btn-primary rounded">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
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
@endsection

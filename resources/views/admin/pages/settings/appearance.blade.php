@extends('admin.layouts.app')
@push('title', 'Appearance | Settings')
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
            <div class="card border-top border-0 border-4 border-primary p-4">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="mb-0 text-primary">Appearance Information</h4>
                    </div>
                </div>
                <form action="{{ route('admin.settings.appearance.update') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div>
                            <h6 class="card-title mb-1">General Settings</h6>
                        </div>
                        <div class="form-group mt-2">
                            <img src="{{ setting('site_logo') != null ? Storage::url(setting('site_logo')) : '' }}"
                                alt="" width="110">
                        </div>
                        <div class="form-group mt-2">
                            <label for="site_title">Site Logo</label>
                            <input type="file" class="form-control" name="site_logo">
                        </div>
                        {{-- <div class="form-group mt-2">
                            <img src="{{ setting('site_mobile_logo') != null ? Storage::url(setting('site_mobile_logo')) : '' }}"
                                alt="" width="110" height="32">
                        </div>
                        <div class="form-group mt-2">
                            <label for="site_title">Site Mobile Logo</label>
                            <input type="file" class="form-control" name="site_mobile_logo">
                        </div> --}}
                        <div class="form-group mt-2">
                            <img src="{{ setting('site_favicon') != null ? Storage::url(setting('site_favicon')) : '' }}"
                                alt="" width="110">
                        </div>
                        <div class="form-group mt-2">
                            <label for="site_title">Site Favicon</label>
                            <input type="file" class="form-control" name="site_favicon">
                        </div>
                        <div class="form-group mt-2">
                            <button class="btn btn-primary rounded  mt-3">Update</button>
                        </div>
                    </div>
                </form>
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

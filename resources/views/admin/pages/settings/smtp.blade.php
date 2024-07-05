@extends('admin.layouts.app')
@push('title', 'Smtp Driver | Settings')
@push('settings', 'active')
@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Dashboard</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Smtp Driver Settings</li>
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
                    <h4 class="mb-0 text-primary">Smtp Driver Information</h4>
                </div>
            </div>
            <form action="{{ route('admin.settings.smtp.update') }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group mt-2">
                        <label for="smtp_driver">Smtp Driver</label>
                        <input type="text" class="form-control input-lg" name="smtp_driver"
                            value="{{ setting('smtp_driver') ?? old('smtp_driver') }}" placeholder="EX: smtp">
                    </div>
                    <div class="form-group mt-2">
                        <label for="smtp_host">Smtp Host</label>
                        <input type="text" class="form-control input-lg" name="smtp_host"
                            value="{{ setting('smtp_host') ?? old('smtp_host') }}"
                            placeholder="EX: mail.example.com">
                    </div>
                    <div class="form-group mt-2">
                        <label for="smtp_port">Smtp Port</label>
                        <input type="text" class="form-control input-lg" name="smtp_port"
                            value="{{ setting('smtp_port') ?? old('smtp_port') }}" placeholder="EX: 587">
                    </div>
                    <div class="form-group mt-2">
                        <label for="smtp_username">Smtp Username</label>
                        <input type="text" class="form-control input-lg" name="smtp_username"
                            value="{{ setting('smtp_username') ?? old('smtp_username') }}"
                            placeholder="EX: test@example.com">
                    </div>
                    <div class="form-group mt-2">
                        <label for="smtp_password">Smtp Password</label>
                        <input type="text" class="form-control input-lg" name="smtp_password"
                            value="{{ setting('smtp_password') ?? old('smtp_password') }}">
                    </div>
                    <div class="form-group mt-2">
                        <label for="smtp_encryption">Smtp Encryption</label>
                        <input type="text" class="form-control input-lg" name="smtp_encryption"
                            value="{{ setting('smtp_encryption') ?? old('smtp_encryption') }}"
                            placeholder="EX: SSL , TLS">
                    </div>
                    <div class="form-group mt-2">
                        <label for="mail_from">From Mail</label>
                        <input type="email" class="form-control input-lg" name="mail_from"
                            value="{{ setting('mail_from') ?? old('mail_from') }}"
                            placeholder="EX: test@example.com">
                    </div>
                    <div class="form-group mt-2">
                        <button class="btn btn-primary rounded mt-3">Update</button>
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

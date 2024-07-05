@extends('admin.layouts.app')
@push('css')
 <style>
    .uploadcare--jcrop-holder>div>div, #preview {
      border-radius: 50%;
    }
    button.uploadcare--widget__button.uploadcare--widget__button_type_open {
        margin-bottom: 5px!important;
    }
    #preview {
      margin-top: 1rem;
    }

</style>
@endpush

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    <li class="breadcrumb-item active" aria-current="page">My Profile</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <label for="image">
                            <img id="image-preview" src="{{auth()->user()->image? asset('uploads/user/' . auth()->user()->image):asset('default.webp') }}" alt="Admin" class="rounded-circle p-1 bg-primary" height="110" width="110">
                        </label>
                        <div class="mt-3">
                            <h4>{{auth()->user()->first_name}} {{auth()->user()->last_name}}</h4>
                            {{-- <p class="text-secondary mb-1">{{auth()->user()->role}}</p> --}}
                        </div>
                    </div>
                    <hr class="my-1" />
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0"><i class="lni lni-envelope"></i> Email</h6>
                            <span class="text-secondary">{{auth()->user()->email}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card">
                <div class="card-body"> 
                        <div class="mb-3">
                            <input type="hidden" id="image" role="uploadcare-uploader" data-crop="1:1" data-images-only >
                            <div>
                              <label for="image">
                                  <img src="{{auth()->user()->image? asset('uploads/user/' . auth()->user()->image):asset('default.webp') }}" alt="" class="my-3" id="preview" style="width: 100%;height: auto;"/>
                              </label>
                              <button class="btn btn-primary btn-sm d-block mt-3" id="image_upload">Save</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card border-top border-0 border-4 border-primary p-4">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="mb-0 text-primary">Profile Information</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group mt-2">
                            <label class="form-label" for="email1101">First Name</label>
                            <input type="text" name="first_name" class="form-control" id="email1101"
                                value="{{ Auth::user()->first_name }}">
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label" for="email1101">Last Name</label>
                            <input type="text" name="last_name" class="form-control" id="email1101"
                                value="{{ Auth::user()->last_name }}">
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label" for="email1101">Email</label>
                            <input type="email" name="email" class="form-control" id="email1101"
                                value="{{ Auth::user()->email }}">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-danger mt-3">cancel</a>
                    </form>
                </div>
            </div>
            <div class="card border-top border-0 border-4 border-primary p-4">
                <form method="post" action="{{ route('admin.profile.password') }}">
                    @csrf
                    @method('put')
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Change Your Password</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group mt-2">
                            <label class="form-label" for="pwd">Old Password</label>
                            <input type="password" class="form-control" name="old_password" id="pwd">
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label" for="pwd">New Password</label>
                            <input type="password" class="form-control" name="password" id="pwd">
                        </div>
                        <div class="form-group mt-2">
                            <label class="form-label" for="pwd">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="pwd">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-danger mt-3">cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')

<script src="{{ asset('assets/js/uploadcare.full.min.js') }}"></script>

<script>
    UPLOADCARE_PUBLIC_KEY = "demopublickey";
    const widget = uploadcare.Widget('[role=uploadcare-uploader]');
    widget.onDialogOpen(function(dialog) {
    dialog.hideTab('url');
    dialog.hideTab('facebook');
    dialog.hideTab('camera');
    dialog.hideTab('gdrive');
    dialog.hideTab('gphotos');
    dialog.hideTab('instagram');
    dialog.hideTab('evernote');
    dialog.hideTab('onedrive');
    dialog.hideTab('flickr');
    dialog.hideTab('dropbox');
});
    const preview = document.getElementById('preview');
    widget.onUploadComplete(fileInfo => {
      preview.src = fileInfo.cdnUrl;
    })
</script>

    <script>
        $(document).ready(function() {
            $('#image').change(function() {
                const file = this.files[0];
                if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    $('#image-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(file);
                } else {
                $('#image-preview').attr('src', '#');
                }
            });
        });
    </script>
        <script>
            $(document).ready(function() {
                $('#image_upload').on('click', function() {
                    let link = $('#preview').attr('src');
                    console.log(link);
                    $.ajax({
                        url: "{{ route('admin.profile.upload.image') }}",
                        method: "POST",
                        data: {
                            link: link,
                            _token: "{{ csrf_token() }}",
                        },
                        success: function(response) {
                            Swal.fire({
                                title: "SUCCESS",
                                text: "Profile Image Upload Success",
                                icon: "success"
                            });
                        },
                        error: function(response) {
                            if (errors && errors.link) {
                                Swal.fire({
                                title: "ERROR",
                                text: errors.link[0],
                                icon: "error"
                            });
                            } else {
                                toastr.error('A');
                                Swal.fire({
                                title: "ERROR",
                                text: "'An error occurred while uploading the image.",
                                icon: "error"
                            });
                            }
                        }
                    });
                });
            });
        </script>
@endpush

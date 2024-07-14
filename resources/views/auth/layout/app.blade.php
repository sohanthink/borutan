<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" href="{{ setting('site_favicon') != null ? Storage::url(setting('site_favicon')) : '' }}"
    type="image/png" />
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
	<title>@stack('title')</title>
    <link rel="stylesheet" href="{{asset('front/src/style.css')}}">
    @stack('style') 
</head>
<body>
    <!-- flex justify-center items-center h-screen  -->
    <div class="">
        <div class="">
             @yield('body')
        </div>
    </div>
	<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
	    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
        
        <script src="{{ asset('assets/js/sweetalert2@11.js') }}"></script>
     {!! Toastr::message() !!}
    
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                <script>
                    Swal.fire({
                    title: "ERROR",
                    text: "{{ $error  }}",
                    icon: "error"
                    });
    
                </script>
                {{ Session::forget('error') }}
            @endforeach
        @endif
        @if(Session::has('success'))
            <script>
                Swal.fire({
                    title: "{{ session('title') ?? 'SUCCESS' }}",
                text: "{{ Session::get('success') }}",
                icon: "success"
                });
            </script>
            {{ Session::forget('success') }}
        @endif

        @if(Session::has('error'))
            <script>
                Swal.fire({
                title: "{{ session('title') ?? 'ERROR' }}",
                text: "{{ Session::get('error') }}",
                icon: "error"
                });

            </script>
            {{ Session::forget('error') }}
        @endif
        @if(Session::has('warning'))
            <script>
                Swal.fire({
                title: "{{ session('title') ?? 'WARNING' }} ",
                text: "{{ Session::get('warning') }}",
                icon: "warning"
                });
            </script>
            {{ Session::forget('warning') }}
        @endif
        @if(Session::has('resent'))
            <script>
                Swal.fire({
                title: "{{ session('title') ?? 'SUCCESS'}} ",
                text: "{{__('front/auth.recent_again')}}",
                icon: "success"
                });
            </script>
            {{ Session::forget('status') }}
        @endif


	<script src="{{ asset('assets') }}/js/app.js"></script>
</body>
</html>
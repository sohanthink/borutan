<script src="{{ asset('assets') }}/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="{{ asset('assets') }}/js/jquery.min.js"></script>
<script src="{{ asset('assets') }}/plugins/simplebar/js/simplebar.min.js"></script>
<script src="{{ asset('assets') }}/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="{{ asset('assets') }}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
<!--app JS-->
<script src="{{ asset('assets/js/toastr.min.js') }}"></script>

<script src="{{ asset('assets/js/sweetalert2@11.js') }}"></script>


<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="{{ asset('assets/js/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/daterangepicker.js') }}"></script>
<script src="https://unpkg.com/feather-icons"></script>
{!! Toastr::message() !!}
@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <script>
            Swal.fire({
                title: "ERROR",
                text: "{{ $error }}",
                icon: "error"
            });
        </script>
    @endforeach
@endif
@if (Session::has('success'))
    <script>
        Swal.fire({
            title: "{{ session('title') ?? 'SUCCESS' }}",
            text: "{{ Session::get('success') }}",
            icon: "success"
        });
    </script>
    {{ Session::forget('success') }}
@endif

@if (Session::has('error'))
    <script>
        Swal.fire({
            title: "{{ session('title') ?? 'ERROR' }}",
            text: "{{ Session::get('error') }}",
            icon: "error"
        });
    </script>
    {{ Session::forget('error') }}
@endif
@if (Session::has('warning'))
    <script>
        Swal.fire({
            title: "{{ session('title') ?? 'WARNING' }}",
            text: "{{ Session::get('warning') }}",
            icon: "info"
        });
    </script>
    {{ Session::forget('warning') }}
@endif
<script>
    feather.replace()
</script>

{{-- language select option --}}
<script type="text/javascript">
    var url = "{{ route('lang.update') }}";

    $('.lang-change').change(function() {
        let lang_code = $(this).val();
        window.location.href = url + "?lang=" + lang_code;
    });
</script>

<script src="{{ asset('assets') }}/js/app.js"></script>
@stack('script')

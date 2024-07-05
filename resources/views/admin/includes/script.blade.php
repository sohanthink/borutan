    <script src="{{ asset('assets') }}/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="{{ asset('assets') }}/js/jquery.min.js"></script>
	<script src="{{ asset('assets') }}/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="{{ asset('assets') }}/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="{{ asset('assets') }}/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="{{ asset('assets/js/moment.min.js') }}"></script> 
	<script src="{{ asset('assets/js/daterangepicker.js') }}"></script>
	<!--app JS-->
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script> 
	<script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
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
    @if(Session::has('success'))
        <script>
            Swal.fire({
            title: "SUCCESS",
            text: "{{ Session::get('success') }}",
            icon: "success"
            });
        </script>
        {{ Session::forget('success') }}
    @endif

    @if(Session::has('error'))
        <script>
            Swal.fire({
            title: "ERROR",
            text: "{{ Session::get('error') }}",
            icon: "error"
            });

        </script>
        {{ Session::forget('error') }}
    @endif
    @if(Session::has('warning'))
        <script>
            Swal.fire({
            title: "WARNING",
            text: "{{ Session::get('warning') }}",
            icon: "warning"
            });
        </script>
        {{ Session::forget('warning') }}
    @endif
	<script src="{{ asset('assets') }}/js/app.js"></script>
    @stack('script')
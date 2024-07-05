@extends('user.layouts.app')
@push('style')
    <style>
        /* Absolute Center Spinner */
        .loading {
            position: fixed;
            z-index: 999;
            height: 2em;
            width: 2em;
            overflow: visible;
            margin: auto;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
        }

        /* Transparent Overlay */
        .loading:before {
            content: '';
            display: block;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.3);
        }

        /* :not(:required) hides these rules from IE9 and below */
        .loading:not(:required) {
            /* hide "loading..." text */
            font: 0/0 a;
            color: transparent;
            text-shadow: none;
            background-color: transparent;
            border: 0;
        }

        .loading:not(:required):after {
            content: '';
            display: block;
            font-size: 10px;
            width: 1em;
            height: 1em;
            margin-top: -0.5em;
            -webkit-animation: spinner 1500ms infinite linear;
            -moz-animation: spinner 1500ms infinite linear;
            -ms-animation: spinner 1500ms infinite linear;
            -o-animation: spinner 1500ms infinite linear;
            animation: spinner 1500ms infinite linear;
            border-radius: 0.5em;
            -webkit-box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.5) -1.5em 0 0 0, rgba(0, 0, 0, 0.5) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
            box-shadow: rgba(0, 0, 0, 0.75) 1.5em 0 0 0, rgba(0, 0, 0, 0.75) 1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) 0 1.5em 0 0, rgba(0, 0, 0, 0.75) -1.1em 1.1em 0 0, rgba(0, 0, 0, 0.75) -1.5em 0 0 0, rgba(0, 0, 0, 0.75) -1.1em -1.1em 0 0, rgba(0, 0, 0, 0.75) 0 -1.5em 0 0, rgba(0, 0, 0, 0.75) 1.1em -1.1em 0 0;
        }

        /* Animation */

        @-webkit-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @-moz-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @-o-keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }

        @keyframes spinner {
            0% {
                -webkit-transform: rotate(0deg);
                -moz-transform: rotate(0deg);
                -ms-transform: rotate(0deg);
                -o-transform: rotate(0deg);
                transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
                -moz-transform: rotate(360deg);
                -ms-transform: rotate(360deg);
                -o-transform: rotate(360deg);
                transform: rotate(360deg);
            }
        }
    </style>
@endpush
@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Dashboard</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Payment Method Edit</li>
            </ol>
        </nav>
    </div>
</div>
<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h3>Payment Method Edit</h3>
    
    <div class="ms-auto">
        <a href="{{ route('user.invoice.index') }}" class="btn btn-primary">back</a>
    </div>
    </div>
    
    <div class="card-body">
        <form action="{{ route('user.invoice.update', $payment_method->id) }}" method="post">
            @csrf
            <div class="form-group">
                <select name="finance_id" id="finance_id" class="form-control select2">
                    <option value="">Select Finance</option>
                    @foreach ($finances as $finance)
                        <option {{ $finance->id == $payment_method->finance_id ? 'selected' : '' }}
                            data-name="{{ $finance->name }}" value="{{ $finance->id }}">
                            {{ $finance->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="loading" id="loading" style="display: none">Loading&#8230;</div>
            <div class="form-group">
                <strong id="finance_description"></strong>
            </div>
            <div class="form-group">
                <input type="text" id="wallet" name="wallet" class="form-control"
                    placeholder="Here Wallet" value="{{ $payment_method->wallet ?? old('wallet') }}">
            </div>
            <div id="wire">
                <div class="form-group">
                    <input type="text" id="bank_name" name="bank_name" class="form-control"
                        placeholder="Bank Name" value="{{ $payment_method->bank_name }}">
                </div>
                <div class="form-group">
                    <input type="text" id="bank_address" name="bank_address" class="form-control"
                        placeholder="Bank Address" value="{{ $payment_method->bank_address }}">
                </div>
                <div class="form-group">
                    <input type="text" id="routing_number" name="routing_number" class="form-control"
                        placeholder="Routing Number" value="{{ $payment_method->routing_number }}">
                </div>
                <div class="form-group">
                    <input type="text" id="beneficiary_name" name="beneficiary_name" class="form-control"
                        placeholder="Beneficiary Name" value="{{ $payment_method->beneficiary_name }}">
                </div>
                <div class="form-group">
                    <input type="text" id="swift_code" name="swift_code" class="form-control"
                        placeholder="Swift Code" value="{{ $payment_method->swift_code }}">
                </div>
                <div class="form-group">
                    <input type="text" id="beneficiary_address" name="beneficiary_address"
                        class="form-control" placeholder="Beneficiary Address"
                        value="{{ $payment_method->beneficiary_address }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('user.invoice.payment_method') }}" class="btn btn-danger">cancel</a>

        </form>
    </div>
</div>
@endsection
@push('script')
    <script src="{{ asset('backend/assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/select2.js') }}"></script>
    <script>
        $(function() {
            // Onchange after send post request
            $('#finance_id').on('change', function() {
                $('#loading').show();
                const finance_id = $(this).val();
                const _token = '{{ csrf_token() }}';
                console.log(finance_id);
                $.ajax({
                    url: "{{ route('user.invoice.get_description') }}",
                    method: "POST",
                    data: {
                        finance_id: finance_id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#loading').hide();
                        $('#finance_description').html(data.description);
                    }
                });
            });

        });

        $(function() {
            // Onchange after send post request
            var name = $('select#finance_id').find(':selected').data('name');
            if (name == 'Wire' || name == 'wire' || name == 'WIRE') {
                $('#wire').show();
            } else {
                $('#wire').hide();
            }
            $('#finance_id').on('change', function() {
                var name = $('select#finance_id').find(':selected').data('name');
                if (name == 'Wire' || name == 'wire' || name == 'WIRE') {
                    $('#wallet').attr('placeholder', 'Account Number');
                    $('#wire').show();
                } else {
                    $('#wallet').attr('placeholder', 'Here Wallet');
                    $('#wire').hide();
                }
            });

        });
    </script>
    <script>
        $(document).ready(function() {
            $('.select2-basic-multiple').select2({
                placeholder: 'Select an option',
                theme: 'bootstrap4',
            });
        });
    </script>
@endpush

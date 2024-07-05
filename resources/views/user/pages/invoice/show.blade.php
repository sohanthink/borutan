@extends('user.layouts.app')
@push('title')
    Inovoice
@endpush
@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Dashboard</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Invoice</li>
            </ol>
        </nav>
    </div>
</div>
<!--end breadcrumb-->
<div class="card">
    <div class="card-body">
        <div id="invoice">
            <div class="toolbar hidden-print">
                <div class="text-end">
                    <button type="button" onclick="printDiv('invoice')"  class="btn btn-info btn-sm text-white">Print</button>
                </div>
                <hr/>
            </div>
            <div class="invoice overflow-auto">
                <div style="min-width: 600px">
                    <header>
                        <div class="row">
                            <div class="col">
                                <a href="javascript:;">
                                    <img src="{{ setting('site_logo') != null ? Storage::url(setting('site_logo')) : '' }}" width="80" alt="" />
                                </a>
                            </div>
                            <div class="col company-details">
                                <h2 class="name">
                    <a target="_blank" href="{{route('user.dashboard')}}" class="text-uppercase">
                    {{setting('site_title')}}
                    </a>
                </h2>
                                <div>{{setting('time_zone')}}</div>
                                <div>{{setting('mail_from')}}</div>
                            </div>
                        </div>
                    </header>
                    <main>
                        <div class="row contacts">
                            <div class="col invoice-to">
                                <div class="text-gray-light">INVOICE TO:</div>
                                <h2 class="to">{{$invoice->user->first_name}} {{$invoice->user->last_name}}</h2>
                                <div class="email"><a href="mailto:john@example.com">{{$invoice->user->email}}</a>
                                </div>
                            </div>
                            <div class="col invoice-details">
                                <h1 class="invoice-id">INVOICE {{$invoice->id}}</h1>
                                <div class="date">Date of Invoice: {{$invoice->created_at->format('D,Y,M')}}</div>
                            </div>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <th class="no">#</th>
                                    <th class="text-left">Name</th>
                                    <th class="text-right">Conversion </th>
                                    <th class="total">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="no">{{$invoice->id}}</td>
                                    <td class="text-left">{{$invoice->user->first_name}}</td>
                                    <td class="text-left">{{$invoice->conversion}}</td>
                                    <td class="total">{{$invoice->amount}}{{setting('site_currency')}}</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">SUBTOTAL</td>
                                    <td>{{$invoice->amount}}{{setting('site_currency')}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">GRAND TOTAL</td>
                                    <td>{{$invoice->amount}}{{setting('site_currency')}}</td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="thanks">Thank you!</div>
                    </main>
                    <footer>Invoice was created on a computer and is valid without the signature and seal.</footer>
                </div>
                <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                <div></div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        function printDiv(divId) {
            var printContents = document.getElementById(divId).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endpush
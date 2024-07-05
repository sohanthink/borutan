@extends('user.layouts.app')
@push('title', 'Invoice')
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

    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h3>Invoice</h3>
        </div>
        <div class="card-body">
            <div class="fancy-table rounded">
                <table class="table table-striped table-bordered dt-table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Type</th>
                            <th scope="col">Package</th>
                            <th scope="col">Status</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Paid At</th>
                            <th scope="col">Wallet Name</th>
                            <th scope="col">Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoices as $invoice)
                            <tr>
                                <td scope="col">{{$loop->iteration}}</td>
                                <td scope="col">{{$invoice->user->first_name . $invoice->user->last_name}}</td>
                                <td scope="col">{{$invoice->type}}</td>
                                <td scope="col">{{$invoice->package->name}}</td>
                                <td scope="col">
                                    @if ($invoice->status == 'Paid')
                                    <span class="badge bg-success">{{$invoice->status}}</span>
                                    @else
                                    <span class="badge bg-info">{{$invoice->status}}</span>
                                    @endif
                                </td>
                                <td scope="col"><span class="badge bg-primary">{{$invoice->amount}}</span></td>
                                <td scope="col">{{$invoice->paid_at}}</td>
                                <td scope="col">{{$invoice->wallet_name}}</td>
                                <td scope="col">{{$invoice->created_at->format('d M Y')}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript">
        $(function() {
            $(document).ready(function() {
                var table = $('.dt-table').DataTable({
                    lengthChange: true,
                    responsive:true,
                });
            });
        });
    </script>
@endpush
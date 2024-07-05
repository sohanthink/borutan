@extends('user.layouts.app')
@push('style')
@endpush
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{route('user.dashboard')}}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Payment Method</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>Payment Method</h3>
                </div>
                <div class="card-body">
                    <ul class="nav nav-pills mb-3" role="tablist">
                        @foreach ($finances as $finance)
                        <li class="nav-item ms-1" role="presentation">
                            <a class="nav-link {{request()->finance_id == $finance->id ?'active':''}}" href="#" onclick="return selectMethod(event, {{$finance->id}})">
                                <div class="d-flex align-items-center">
                                    <div class="tab-title">{{$finance->name}}</div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    @foreach ($finances as $finance)
                        @if (request()->is('user/invoice/payment_method') && request()->finance_id == $finance->id)
                        @php
                            $fields = \App\Models\FinanceField::where('wallet_id', $finance->id)->get();
                        @endphp
                    
                        <form method="post" action="{{ route('user.invoice.storePaymentMethod') }}">
                            @csrf
                            
                            <input type="hidden" class="d-none" name="wallet_id" value="{{$finance->id}}">
                            @foreach ($fields as $field)   
                            @php
                                $paymentMethod = \App\Models\PaymentMethod::where('field_id', $field->id)
                                    ->where('user_id', auth()->user()->id)
                                    ->first();
                            @endphp
                            <div class="form-group mt-2">
                                <label class="form-label" for="{{$field->id}}">{{$field->name}}</label>
                                <input 
                                    type="text" 
                                    name="{{$field->id}}" 
                                    class="form-control" 
                                    id="{{$field->id}}" 
                                    placeholder="{{$field->placeholder}}"
                                    value="{{ $paymentMethod ? $paymentMethod->value : null }}"
                                    {{$field->require == 1 ?'required':''}}
                                    >
                            </div>
                            @endforeach
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </form>
                        @endif
                    @endforeach
        
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
<script>
    function selectMethod(event, financeId) {
        event.preventDefault();
        const route = '/user/invoice/payment_method'
        window.location.href = `${route}?finance_id=${financeId}`
    }
</script>
@endpush

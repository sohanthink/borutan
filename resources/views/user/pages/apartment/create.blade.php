@extends('user.layouts.app')
@push('title', 'Apartment')
@push('style')
    <style>
        .range-wrap {
            position: relative;
            margin: 0 auto 3rem;
        }

        .range {
            width: 100%;
        }

        .bubble {
            background: #9628fd;
            color: white;
            padding: 4px 12px;
            position: absolute;
            top: 20px;
            border-radius: 4px;
            left: 50%;
            transform: translateX(-50%);
        }
    </style>
@endpush
@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{__('user/menu.rentalprofile')}}</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Lägenhet</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h3>Hyresprofil</h3>
                        {{-- <a class="btn btn-primary" href="{{ route('user.apartment.index') }}">Back</a> --}}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.apartment.store') }}" method="POST">
                            @csrf
                            <div class="mb-3 my-5">
                                <label for="formFileMultiple" class="form-label">
                                    <h5>Typ av hyreskontrakt </h5>
                                </label> <br>
                                <small>Vilken typ av hyreskontrakt är du intresserad av?</small>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="1" name="type"
                                        id="first">
                                    <label class="form-check-label" for="first">
                                        Förstahandskontrakt
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" value="2"
                                        id="sub">
                                    <label class="form-check-label" for="sub">
                                        Andrahandskontrakt
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="3" name="type"
                                        id="all" checked>
                                    <label class="form-check-label" for="all">
                                        Alla
                                    </label>
                                </div>


                            </div>
                            <div class="mb-3 my-5">
                                <label for="formFileMultiple" class="form-label">
                                    <h5>Antal rum</h5>
                                </label> <br>
                                <small>Ange önskat minsta antal rum.</small>
                                <div class="range-wrap">
                                    <input type="range" name="room" class="range" min="1" max="6"
                                        value="1">
                                    <output class="bubble"></output>
                                </div>
                            </div>
                            <div class="mb-3 my-5">
                                <label for="formFileMultiple" class="form-label">
                                    <h5>Rumsstorlek (kvm)</h5>
                                </label> <br>
                                <small>Ange minsta antal kvadratmeter.</small>
                                <div class="range-wrap">
                                    <input type="range" name="size" class="range" min="10" max="289"
                                        value="20">
                                    <output class="bubble"></output>
                                </div>
                            </div>
                            <div class="mb-3 my-5">
                                <label for="formFileMultiple" class="form-label">
                                    <h5>Hyra</h5>
                                </label> <br>
                                <small>Ange maximal hyra (KR).</small>
                                <div class="range-wrap">
                                    <input type="range" name="rent" class="range" min="5000" max="30000"
                                        value="10000">
                                    <output class="bubble"></output>
                                </div>
                            </div>
                            <div class="mb-3 my-5">
                                <label for="location" class="form-label">
                                    <h5>Stad </h5>
                                </label> <br>
                                <small>Ange din stad för din hyreslägenhet</small>
                                <select name="location[]" id="location" class="location form-control" multiple>
                                    @foreach ($areas as $area)
                                        <option value="{{ $area->name }}">{{ $area->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 my-5">
                                <input type="submit" value="Sänd" class="btn btn-primary">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        const allRanges = document.querySelectorAll(".range-wrap");
        allRanges.forEach(wrap => {
            const range = wrap.querySelector(".range");
            const bubble = wrap.querySelector(".bubble");

            range.addEventListener("input", () => {
                setBubble(range, bubble);
            });
            setBubble(range, bubble);
        });

        function setBubble(range, bubble) {
            const val = range.value;
            const min = range.min ? range.min : 0;
            const max = range.max ? range.max : 100;
            const newVal = Number(((val - min) * 100) / (max - min));
            bubble.innerHTML = val;

            // Sorta magic numbers based on size of the native UI thumb
            bubble.style.left = `calc(${newVal}% + (${8 - newVal * 0.15}px))`;
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.location').select2({
                theme: 'bootstrap4',
            });
        });
    </script>
@endpush

@extends('front.layout.app')
@push('title')
    {{__('front/page.privacy_policy')}} 
@endpush
@section('body')
    {{-- privacy bheading --}}
    <div class="bg-[#1f2937] py-14">
        <p class="w-11/12 mx-auto font-bold text-3xl text-center text-white">{{__('front/page.privacy_policy')}} </p>
    </div>

    {{-- privacy body --}}

    <div class="mx-auto w-3/4 pt-5">
        <p class="py-5">
            {{__('front/page.privacy_policy_details')}} 
        </p>
        <p class="py-5 font-light">{{__('front/page.types_of_data_we')}} 
        </p>
        <p class="py-5 font-light">{{__('front/page.customer_data')}}
        </p>
        <p class="py-5 font-light">{{__('front/page.traffic_data')}}
        </p>
        <p class="py-5 font-light">{{__('front/page.location_information')}}
        </p>
        <p class="py-5 font-light">{{__('front/page.how_we_collect_data')}}
        <ul class="list-disc pl-14">
            <li class="">{{__('front/page.privacy_self')}}</li>
            <li>{{__('front/page.privacy_services')}}
            </li>
            <li>{{__('front/page.privacy_sources')}}
            </li>
            <li>{{__('front/page.privacy_cookies')}}
            </li>
        </ul>
        </p>

        <p class="py-5 font-light">{{__('front/page.privacy_data')}}</p>

        <p class="py-5 font-light">{{__('front/page.privacy_legal')}}</p>

        <p class="py-5 font-light">{{__('front/page.privacy_services_delivery')}}
        </p>

        <p class="py-5 font-light">{{__('front/page.privacy_traffic_management')}}
        </p>

        <p class="py-5 font-light">{{__('front/page.privacy_communication')}}
        </p>

        <p class="py-5 font-light">{{__('front/page.privacy_recommendations')}}
        </p>

        <div class="py-5">
            <p class="font-bold pb-3">{{__('front/page.privacy_data_sharing')}}</p>
            <p class="font-light">{{__('front/page.privacy_sharing')}}</p>
        </div>

        <div class="py-5">
            <p class="font-bold pb-3">{{__('front/page.privacy_data_retention')}}</p>
            <p class="font-light">{{__('front/page.privacy_retention')}}</p>
        </div>

        <div class="py-5">
            <p class="font-bold pb-3">{{__('front/page.privacy_rights')}}
            </p></p>
            <p class="font-light">{{__('front/page.privacy_data_protection_laws')}}
            </p></p>
        </div>

        <p class="py-5 font-light">
          {!! trans('front/page.privacy_contact') !!}
        </p>
    </div>
@endsection

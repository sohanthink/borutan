@extends('auth.layout.app')

@section('body')
    @if (request()->has('package'))
        @php
            $package = \App\Models\Package::find(request()->input('package'));
        @endphp
    @endif

    @isset($package)
        @push('style')
            <style>
                .main {
                    justify-content: center;
                    align-items: center;
                    height: 100vh
                }

                @media (max-width: 768px) {
                    .main {
                        justify-content: center;
                        align-items: center;
                        height: 100%
                    }
                }
            </style>
        @endpush
    @endisset
    @if (@isset($package))
        <div class="space-y-5 px-8 py-12 font-primary lg:w-4/6 mx-auto" id="pricing">
            <div class="demo-container grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-5">
                <!-- premium package -->
                <div
                    class="shadow-[0px_4px_16px_rgba(17,17,26,0.1),_0px_8px_24px_rgba(17,17,26,0.1),_0px_16px_56px_rgba(17,17,26,0.1)] rounded-[3px] md:rounded-[36px] bg-[#FAFAFA] overflow-hidden border-[1px] border-gray-200 p-8 relative">
                    <div class="h-full">
                        <div class="h-full z-10 relative">
                            <div class="flex flex-col flex-1 justify-between h-full space-y-5">
                                <div class="flex justify-between flex-col">
                                    <div class="text-xl md:text-2xl font-bold text-gray-900 flex justify-between">
                                        <span>{{ $package->name }}</span>
                                    </div>
                                    <div class="pt-5 text-gray-500 font-medium text-base space-y-1">
                                        <div class="flex items-center align-bottom"><span class="pt-1.5">NOK</span>
                                            <div class="ml-1 mr-2 text-2xl md:text-3xl font-bold text-gray-900">
                                                <span>{{ $package->price }}</span>
                                            </div><span class="pt-1.5">{{__('front/auth.per_month')}}</span>
                                        </div>
                                    </div>
                                    <div class="">
                                        <ul class="space-y-2 pt-8">
                                            {{-- <li class="flex items-center font-medium space-x-2 text-black">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.4444 3.03947C15.1056 2.37412 13.5965 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 11.6244 21.9793 11.2537 21.939 10.8889M9 11L12 14L22 4"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                                <span>24/7  {{__('front/auth.personal_service')}}</span>
                                            </li>
                                            <li class="flex items-center font-medium space-x-2 text-black">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.4444 3.03947C15.1056 2.37412 13.5965 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 11.6244 21.9793 11.2537 21.939 10.8889M9 11L12 14L22 4"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg><span>{{__('front/auth.get')}} {{ $package->contract }} {{__('front/auth.rental_contract')}} </span>
                                            </li>
                                            <li class="flex items-center font-medium space-x-2 text-black">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.4444 3.03947C15.1056 2.37412 13.5965 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 11.6244 21.9793 11.2537 21.939 10.8889M9 11L12 14L22 4"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg><span>{{__('front/auth.money_back')}}</span>
                                            </li> --}}
                                            <li class="flex items-center font-medium space-x-2 text-black">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.4444 3.03947C15.1056 2.37412 13.5965 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 11.6244 21.9793 11.2537 21.939 10.8889M9 11L12 14L22 4"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                    </svg>
                                                <span>{{ __('front/home.package_service') }} </span>
                                            </li>
                                            <li class="flex items-center font-medium space-x-2 text-black">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.4444 3.03947C15.1056 2.37412 13.5965 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 11.6244 21.9793 11.2537 21.939 10.8889M9 11L12 14L22 4"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg><span>{{ __('front/home.package_period') }}</span>
                                            </li>
                                            <li class="flex items-center font-medium space-x-2 text-black">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.4444 3.03947C15.1056 2.37412 13.5965 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 11.6244 21.9793 11.2537 21.939 10.8889M9 11L12 14L22 4"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg><span> {{ $package->contract }}
                                                    {{ __('front/home.package_searches') }} </span>
                                            </li>
                                            <li class="flex items-center font-medium space-x-2 text-black">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.4444 3.03947C15.1056 2.37412 13.5965 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 11.6244 21.9793 11.2537 21.939 10.8889M9 11L12 14L22 4"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg><span>{{ __('front/home.package_apartment') }}</span>
                                            </li>
                                            <li class="flex items-center font-medium space-x-2 text-black">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.4444 3.03947C15.1056 2.37412 13.5965 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 11.6244 21.9793 11.2537 21.939 10.8889M9 11L12 14L22 4"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg><span>{{ __('front/home.package_tips') }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- standard package -->
                <div class=" relative">
                    <div class="h-full">
                        <div
                            class=" relative mx-auto h-full w-full max-w-md px-6 pt-10 pb-8 shadow-[0px_4px_16px_rgba(17,17,26,0.1),_0px_8px_24px_rgba(17,17,26,0.1),_0px_16px_56px_rgba(17,17,26,0.1)] rounded-[3px] md:rounded-[36px] sm:px-10">
                            <div class="text-center">
                                <h1 class="text-3xl font-semibold text-gray-900">{{__('front/auth.register')}}</h1>
                                <p class="mt-2 text-gray-500">{{__('front/auth.register_heading')}}</p>
                            </div>
                            <div class="mt-5">
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    @isset($package)
                                        <input type="hidden" name="package" value="{{ $package->id }}">
                                    @endisset
                                    <div class="relative mt-6">
                                        <input type="text" name="first_name" id="first_name"
                                            placeholder="Email First Name" value="{{ old('first_name') }}"
                                            class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none"
                                            autocomplete="first_name" />
                                        <label for="first_name"
                                            class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">{{__('front/auth.first_name')}}</label>
                                    </div>
                                    <div class="relative mt-6">
                                        <input type="text" name="last_name" id="last_name" placeholder="Email Last Name"
                                            value="{{ old('last_name') }}"
                                            class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none"
                                            autocomplete="last_name" />
                                        <label for="last_name"
                                            class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">{{__('front/auth.last_name')}}</label>
                                    </div>
                                    <div class="relative mt-6">
                                        <input type="email" name="email" id="email" placeholder="Email Address"
                                            value="{{ old('email') }}"
                                            class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none"
                                            autocomplete="email" />
                                        <label for="email"
                                            class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">E-postadress</label>
                                    </div>
                                    <div class="relative mt-6">
                                        <input type="password" name="password" id="password" placeholder="Password"
                                            class="peer peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" />
                                        <label for="password"
                                            class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">{{__('front/auth.password')}}</label>
                                    </div>
                                    <div class="relative mt-6">
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            placeholder="Confirm Password" value="{{ old('password_confirmation') }}"
                                            class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" />
                                        <label for="password_confirmation"
                                            class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">{{__('front/auth.confirm_password')}}</label>
                                    </div>
                                    <div class="my-6 text-center">
                                        <input class="form-check-input" name="check" type="checkbox"
                                            id="flexSwitchCheckChecked">
                                        <label class="form-check-label" for="flexSwitchCheckChecked">
                                            {{__('front/auth.accept_cond')}} <br> <a
                                                href="{{ route('terms') }}"><u>{{__('front/common.terms')}}</u></a>
                                            & <a href="{{ route('privacy') }}"><u>{{__('front/common.policy')}}.</u></a>
                                            <label>
                                    </div>
                                    <div class="my-6">
                                        <button type="submit"
                                            class="w-full rounded-md bg-black px-3 py-4 text-white focus:bg-gray-600 focus:outline-none">{{__('front/auth.register')}}
                                             </button>
                                    </div>

                                    <p class="text-center text-sm text-gray-500">{{__('front/auth.have_account')}}
                                        <a href="{{ route('login') }}"
                                            class="font-semibold text-gray-600 hover:underline focus:text-gray-800 focus:outline-none">{{__('front/auth.login')}}
                                            
                                        </a>.
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="flex main flex-col md:flex-row">
            <div class="w-full md:w-1/2 bg-[#400065]">
                <div class="w-full flex justify-center items-center">
                    <img class="bg-cover overflow-hidden object-cover h-[350px] md:h-screen"
                        src="{{ asset('Images/register.png') }}" alt="">
                </div>
            </div>
            <div class="p-5 md:p-0 md:m-auto">
                <div
                    class="text-center p-10 shadow-[0px_4px_16px_rgba(17,17,26,0.1),_0px_8px_24px_rgba(17,17,26,0.1),_0px_16px_56px_rgba(17,17,26,0.1)] ">
                    <h1 class="text-3xl font-semibold text-gray-900">{{__('front/auth.register')}}</h1>
                    <p class="mt-2 text-gray-500 hidden md:block">{{__('front/auth.register_heading')}}</p>
                    <p class="mt-2 text-gray-500 md:hidden">{{__('front/auth.register_heading1')}}<br> {{__('front/auth.register_heading2')}}</p>
                    <div class="mt-5">
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            @isset($package)
                                <input type="hidden" name="package" value="{{ $package->id }}">
                            @endisset
                            <div class="relative mt-6">
                                <input type="text" name="first_name" id="first_name" placeholder="Email First Name"
                                    value="{{ old('first_name') }}"A
                                    class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none"
                                    autocomplete="first_name" />
                                <label for="first_name"
                                    class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">{{__('front/auth.first_name')}}</label>
                            </div>
                            <div class="relative mt-6">
                                <input type="text" name="last_name" id="last_name" placeholder="Email Last Name"
                                    value="{{ old('last_name') }}"
                                    class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none"
                                    autocomplete="last_name" />
                                <label for="last_name"
                                    class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">{{__('front/auth.last_name')}}</label>
                            </div>
                            <div class="relative mt-6">
                                <input type="email" name="email" id="email" placeholder="Email Address"
                                    value="{{ old('email') }}"
                                    class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none"
                                    autocomplete="email" />
                                <label for="email"
                                    class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">{{__('front/auth.email')}}</label>
                            </div>
                            <div class="relative mt-6">
                                <input type="password" name="password" id="password" placeholder="Password"
                                    class="peer peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" />
                                <label for="password"
                                    class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">{{__('front/auth.password')}}</label>
                            </div>
                            <div class="relative mt-6">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    placeholder="Confirm Password" value="{{ old('password_confirmation') }}"
                                    class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" />
                                <label for="password_confirmation"
                                    class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">{{__('front/auth.confirm_password')}} </label>
                            </div>
                            <div class="my-6">
                                <input class="form-check-input" name="check" type="checkbox"
                                    id="flexSwitchCheckChecked">
                                <label class="form-check-label" for="flexSwitchCheckChecked">
                                    {{__('front/auth.accept_cond')}} <br> <a
                                        href="{{ route('terms') }}"><u>{{__('front/common.terms')}}</u></a>
                                    & <a href="{{ route('privacy') }}"><u>{{__('front/common.policy')}}</u></a>
                                </label>
                            </div>
                            <div class="my-6">
                                <button type="submit"
                                    class="w-full rounded-md bg-black px-3 py-4 text-white focus:bg-gray-600 focus:outline-none">{{__('front/auth.register')}}
                                     </button>
                            </div>

                            <p class="text-center text-sm text-gray-500">{{__('front/auth.have_account')}}
                                <a href="{{ route('login') }}"
                                    class="font-semibold text-gray-600 hover:underline focus:text-gray-800 focus:outline-none">{{__('front/auth.login')}}
                                </a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

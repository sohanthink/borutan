@extends('auth.layout.app')

@section('body')
    <div class="w-full h-full flex items-center justify-center">
        <div class="flex md:gap-20 gap-5 items-center justify-center flex-col md:flex-row">
            <div class="md:h-[80vh]">

                <img class="h-full bg-cover overflow-hidden object-cover hidden md:block"
                    src="{{ asset('Images/login.png') }}" alt="">

                <img class="bg-cover overflow-hidden object-cover md:hidden" src="{{ asset('Images/mobile/login.webp') }}"
                    alt="">


            </div>

            <!-- right portion/ form -->
            <div
                class=" relative mx-auto h-full w-[295px] lg:w-full max-w-md px-6 pt-10 pb-8 shadow-[0px_4px_16px_rgba(17,17,26,0.1),_0px_8px_24px_rgba(17,17,26,0.1),_0px_16px_56px_rgba(17,17,26,0.1)] sm:rounded-xl sm:px-10">
                <div class="text-center">
                    <h1 class="text-xl md:text-3xl font-semibold text-gray-900">{{ __('front/auth.login') }}</h1>
                    <p class="mt-2 text-gray-500 hidden md:block">{{ __('front/auth.heading') }}</p>
                    <p class="mt-2 text-gray-500 md:hidden">{{ __('front/auth.heading1') }}<br>
                        {{ __('front/auth.heading2') }}</p>
                </div>
                <div class="mt-5">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="relative mt-6">
                            <input type="email" name="email" id="email" placeholder="Email Address"
                                value="{{ old('email') }}"
                                class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none"
                                autocomplete="email" />
                            <label for="email"
                                class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">{{ __('front/auth.email') }}
                            </label>
                        </div>
                        <div class="relative mt-6">
                            <input type="password" name="password" id="password" placeholder="Password"
                                class="peer peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none" />
                            <label for="password"
                                class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">{{ __('front/auth.password') }}</label>
                        </div>
                        <div class="my-6">
                            <button type="submit"
                                class="w-full rounded-md bg-black px-3 py-4 text-white focus:bg-gray-600 focus:outline-none">{{ __('front/auth.login') }}</button>
                        </div>
                        <div class="md:hidden">
                            <p class="text-center text-sm text-gray-500">{{ __('front/auth.not_account') }}<br>
                                <a href="{{ route('register') }}"
                                    class="font-semibold text-gray-600 hover:underline focus:text-gray-800 focus:outline-none">
                                    {{ __('front/auth.register') }}
                                </a>
                            </p> <br>
                            <p class="text-center text-sm text-gray-500">{{ __('front/auth.forgot_text') }}<br>
                                <a href="{{ route('password.request') }}"
                                    class="font-semibold text-gray-600 hover:underline focus:text-gray-800 focus:outline-none">
                                    {{ __('front/auth.forgot') }}
                                </a>
                            </p>
                        </div>
                        <div class="hidden md:block">
                            <p class="text-center text-sm text-gray-500">{{ __('front/auth.not_account') }}
                                <a href="{{ route('register') }}"
                                    class="font-semibold text-gray-600 hover:underline focus:text-gray-800 focus:outline-none">
                                    {{ __('front/auth.register') }}
                                </a>
                            </p> <br>
                            <p class="text-center text-sm text-gray-500">{{ __('front/auth.forgot_text') }}
                                <a href="{{ route('password.request') }}"
                                    class="font-semibold text-gray-600 hover:underline focus:text-gray-800 focus:outline-none">
                                    {{ __('front/auth.forgot') }}
                                </a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

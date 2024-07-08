@extends('auth.layout.app')

@section('body')
    <div class="w-full flex gap-20 items-center justify-center">
        <div class="flex gap-20 items-center justify-center">
            <div
                class="relative mx-auto h-full w-full max-w-md px-6 pt-10 pb-8 shadow-[0px_4px_16px_rgba(17,17,26,0.1),_0px_8px_24px_rgba(17,17,26,0.1),_0px_16px_56px_rgba(17,17,26,0.1)] sm:rounded-xl sm:px-10"">
                <div class="text-center">
                    <h1 class="text-3xl font-semibold text-gray-900">{{__('front/auth.verify')}}</h1>
                    <p class="mt-2 text-gray-500">{{__('front/auth.verify_email')}}</p>
                </div>
                <div class="mt-5">
                    <form method="POST" action="{{ route('verification.resend') }}" class="p-0 ">
                        @csrf
                        <div class="card">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{__('front/auth.new_link_sent')}}
                                </div>
                            @endif

                            <p>  {{__('front/auth.check_email_before_continue')}}</p>


                            <div class="my-6">
                                <button type="submit"
                                    class="w-full rounded-md bg-black px-3 py-2 text-white focus:bg-gray-600 focus:outline-none">
                                    {{__('front/auth.click_here_request_new')}}
                                </button>
                            </div>

                        </div>
                    </form>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <div class="my-6">
                            <button type="submit"
                                class="w-full rounded-md bg-black px-3 py-2 text-white focus:bg-gray-600 focus:outline-none">
                                {{ __('front/auth.logout') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

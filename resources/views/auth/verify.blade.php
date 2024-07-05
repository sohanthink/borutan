@extends('auth.layout.app')

@section('body')
    <div class="w-full flex gap-20 items-center justify-center">
        <div class="flex gap-20 items-center justify-center">
            <div
                class="relative mx-auto h-full w-full max-w-md px-6 pt-10 pb-8 shadow-[0px_4px_16px_rgba(17,17,26,0.1),_0px_8px_24px_rgba(17,17,26,0.1),_0px_16px_56px_rgba(17,17,26,0.1)] sm:rounded-xl sm:px-10"">
                <div class="text-center">
                    <h1 class="text-3xl font-semibold text-gray-900">Verifiera</h1>
                    <p class="mt-2 text-gray-500">Verifiera din e-postadress</p>
                </div>
                <div class="mt-5">
                    <form method="POST" action="{{ route('verification.resend') }}" class="p-0 ">
                        @csrf
                        <div class="card">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('En ny verifieringslänk har skickats till din e-postadress.') }}
                                </div>
                            @endif

                            <p>{{ __('Innan du fortsätter, vänligen kontrollera din e-post för en verifieringslänk.') }}
                                {{ __(' Om du inte har fått e-postmeddelandet,') }}, </p>


                            <div class="my-6">
                                <button type="submit"
                                    class="w-full rounded-md bg-black px-3 py-2 text-white focus:bg-gray-600 focus:outline-none">
                                    {{ __('Klicka här för att begära ett nytt') }}
                                </button>
                            </div>

                        </div>
                    </form>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <div class="my-6">
                            <button type="submit"
                                class="w-full rounded-md bg-black px-3 py-2 text-white focus:bg-gray-600 focus:outline-none">
                                {{ __('Logga ut') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

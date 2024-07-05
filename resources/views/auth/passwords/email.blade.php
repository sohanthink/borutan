@extends('auth.layout.app')

@section('body')
    <div class="h-screen flex justify-center items-center">
        <div
            class="shadow-[0px_4px_16px_rgba(17,17,26,0.1),_0px_8px_24px_rgba(17,17,26,0.1),_0px_16px_56px_rgba(17,17,26,0.1)] rounded-[30px] md:rounded-[36px] bg-[#FAFAFA] overflow-hidden border-[1px] border-gray-200 w-full md:w-[500px] mx-auto p-10 ">
            <div class="">
                <div class="text-center">
                    <h1 class="text-3xl font-semibold text-gray-900"> Återställ mitt lösenord</h1>
                </div>
                <div class="mt-5 ">
                    <form method="POST" action="{{ route('password.email') }}" class="p-0 ">
                        @csrf
                        <div class="">
                            <div class="card- p-3">
                                @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        Vi har mejlat din länk för att återställa ditt lösenord!
                                    </div>
                                @endif
                                <div class="relative mt-6">
                                    <input type="email" name="email" id="email" placeholder="Email Address"
                                        value="{{ old('email') }}"
                                        class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none"
                                        autocomplete="email" />
                                    <label for="email"
                                        class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">E-postadress
                                    </label>
                                </div>

                                <div class="my-6">
                                    <button type="submit"
                                        class="w-full rounded-md bg-black px-3 py-4 text-white focus:bg-gray-600 focus:outline-none">
                                        Skicka länk för att återställa lösenord
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

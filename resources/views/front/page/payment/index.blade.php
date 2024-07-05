@extends('auth.layout.app')

@section('body')
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
                                        </div><span class="pt-1.5">per månad</span>
                                    </div>
                                </div>
                                <div class="">
                                    <ul class="space-y-2 pt-8">
                                        <li class="flex items-center font-medium space-x-2 text-black">
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M16.4444 3.03947C15.1056 2.37412 13.5965 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 11.6244 21.9793 11.2537 21.939 10.8889M9 11L12 14L22 4"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                            <span>24/7 personlig service </span>
                                        </li>
                                        <li class="flex items-center font-medium space-x-2 text-black">
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M16.4444 3.03947C15.1056 2.37412 13.5965 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 11.6244 21.9793 11.2537 21.939 10.8889M9 11L12 14L22 4"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg><span>Få {{ $package->contract }} hyreskontraktsförslag </span>
                                        </li>
                                        <li class="flex items-center font-medium space-x-2 text-black">
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M16.4444 3.03947C15.1056 2.37412 13.5965 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 11.6244 21.9793 11.2537 21.939 10.8889M9 11L12 14L22 4"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg><span>Pengarna tillbaka garanti</span>
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
                            <h1 class="text-3xl font-semibold text-gray-900">Checka Ut</h1>
                            <p class="mt-2 text-gray-500">Vänligen fyll i uppgifterna för betalning</p>
                        </div>
                        <div class="mt-5">
                            <form action="{{ route('user.invoice.payment', $invoice->id) }}" method="POST">
                                @csrf
                                <div class="relative mt-6">
                                    <input type="text" name="cardHolderName" id="cardHolderName"
                                        placeholder="Card Holder Name:" value="{{ old('cardHolderName') }}"
                                        class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none"
                                        autocomplete="cardHolderName" />
                                    <label for="cardHolderName"
                                        class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">
                                        Kortinnehavarens namn :
                                    </label>
                                </div>
                                <div class="relative mt-6">
                                    <input type="text" name="cardNumber" id="cardNumber" placeholder="Card Number:"
                                        value="{{ old('cardNumber') }}"
                                        class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none"
                                        autocomplete="cardNumber" />
                                    <label for="email"
                                        class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">
                                        Kortnummer:
                                    </label>
                                </div>

                                <div class="relative mt-6">
                                    <input type="text" name="expireMonth" id="expireMonth" placeholder="Expire Month:"
                                        value="{{ old('expireMonth') }}"
                                        class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none"
                                        autocomplete="expireMonth" />
                                    <label for="email"
                                        class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">
                                        Utgångsmånad:
                                    </label>
                                </div>

                                <div class="relative mt-6">
                                    <input type="text" name="expireYear" id="expireYear" placeholder="Expire Year:"
                                        value="{{ old('expireYear') }}"
                                        class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none"
                                        autocomplete="expireYear" />
                                    <label for="expireYear"
                                        class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">
                                        Utgångsår:
                                    </label>
                                </div>
                                <div class="relative mt-6">
                                    <input type="text" name="cvc" id="cvc" placeholder="CVC :"
                                        value="{{ old('cvc') }}"
                                        class="peer mt-1 w-full border-b-2 border-gray-300 px-0 py-1 placeholder:text-transparent focus:border-gray-500 focus:outline-none"
                                        autocomplete="cvc" />
                                    <label for="cvc"
                                        class="pointer-events-none absolute top-0 left-0 origin-left -translate-y-1/2 transform text-sm text-gray-800 opacity-75 transition-all duration-100 ease-in-out peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-0 peer-focus:pl-0 peer-focus:text-sm peer-focus:text-gray-800">CVC
                                        :
                                    </label>
                                </div>
                                <div class="my-6">
                                    <button type="submit"
                                        class="w-full rounded-md bg-black px-3 py-4 text-white focus:bg-gray-600 focus:outline-none">Betala
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

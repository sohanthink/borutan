@extends('front.layout.app')
@push('title')
    Pricing
@endpush
@section('body')
<section>
    <div class="space-y-5 px-4 py-12 md:py-20 font-primary w-full md:w-4/6 mx-auto" id="pricing">
        <p
            class="lg:text-7xl md:text-4xl text-2xl text-gray-800 font-bold text-center leading-10 px-10 pb-4 hidden md:block">
            {{__('front/home.price_head')}}</p>
        <p
            class="lg:text-7xl md:text-4xl text-2xl text-gray-800 font-bold text-center leading-10 px-10 pb-4 md:hidden">
            {{__('front/home.price_head_1st')}}<br> {{__('front/home.price_head_end')}}</p>
        <span class=" justify-center pb-2 text-center hidden md:block">{{__('front/home.price_sub_head')}}</p></span>
        <span class="flex justify-center pb-2 text-center md:hidden">{{__('front/home.price_sub_head_1st')}}<br>{{__('front/home.price_sub_head_end')}}</span>

            <div class="demo-container grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 md:gap-3 lg:gap-5 gap-2">
                <!-- premium package -->
                <div
                    class="shadow-[0px_4px_16px_rgba(17,17,26,0.1),_0px_8px_24px_rgba(17,17,26,0.1),_0px_16px_56px_rgba(17,17,26,0.1)] rounded-[30px] md:rounded-[36px] bg-[#FAFAFA] overflow-hidden border-[1px] border-gray-200 p-8 relative">
                    <div class="h-full">
                        <div class="h-full z-10 relative">
                            <div class="flex flex-col flex-1 justify-between h-full space-y-5">
                                <div class="flex justify-between flex-col">
                                    <div class="text-xl md:text-2xl font-bold text-gray-900 flex justify-between">
                                        <span>{{ $package[1]->name }}</span>
                                        <span class="bg-[#9628fd] text-sm rounded-xl text-white p-2">{{__('front/home.most_popular')}}</span>
                                    </div>
                                    <div class="pt-5 text-gray-500 font-medium text-base space-y-1">
                                        <div class="flex items-center align-bottom"><span class="pt-1.5">NOK</span>
                                            <div class="ml-1 mr-2 text-2xl md:text-3xl font-bold text-gray-900">
                                                <span>{{ $package[1]->price }}</span>
                                            </div><span class="pt-1.5">{{__('front/home.per_month')}}</span>
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
                                                <span>24/7 {{__('front/home.personal_service')}} </span>
                                            </li>
                                            <li class="flex items-center font-medium space-x-2 text-black">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.4444 3.03947C15.1056 2.37412 13.5965 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 11.6244 21.9793 11.2537 21.939 10.8889M9 11L12 14L22 4"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg><span>{{__('front/home.get')}} {{ $package[1]->contract }} {{__('front/home.rental_contract')}} </span>
                                            </li>
                                            <li class="flex items-center font-medium space-x-2 text-black">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.4444 3.03947C15.1056 2.37412 13.5965 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 11.6244 21.9793 11.2537 21.939 10.8889M9 11L12 14L22 4"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg><span>{{__('front/home.money_back')}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="pt-2">
                                    @auth
                                        @php
                                            $subscription = App\Models\Subscription::where('user_id', auth()->id())->where('status', 'Active')->first();
                                        @endphp
                                        @if ($subscription && $subscription->package_id == $package[1]->id)
                                            <a href="{{ route('user.invoice.cancel') }}"
                                                type="button"
                                                class="appearance-none inline-flex hover:shadow-2xl transition-all duration-300 hover:scale-105 items-center group space-x-2.5 bg-black text-white py-4 px-5 rounded-2xl cursor-pointer"><span
                                                    class="w-full font-semibold text-base">iptal etmek</span>
                                                <svg class="inline-block h-6" viewBox="0 0 24 25" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M3 12.4999H21L14 19.4999M14 5.5L18 9.5" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                </svg>
                                            </a>
                                        
                                        @else
                                        <a href="{{ route('user.invoice.buy', $package[1]->id) }}"
                                            type="button"
                                            class="appearance-none inline-flex hover:shadow-2xl transition-all duration-300 hover:scale-105 items-center group space-x-2.5 bg-black text-white py-4 px-5 rounded-2xl cursor-pointer"><span
                                                class="w-full font-semibold text-base">{{__('front/home.välj')}} {{ $package[1]->name }}</span>
                                            <svg class="inline-block h-6" viewBox="0 0 24 25" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3 12.4999H21L14 19.4999M14 5.5L18 9.5" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </a>
                                        @endif
                                    @else
                                    <a href=" {{ route('register') }}?package={{ $package[1]->id }} "
                                        type="button"
                                        class="appearance-none inline-flex hover:shadow-2xl transition-all duration-300 hover:scale-105 items-center group space-x-2.5 bg-black text-white py-4 px-5 rounded-2xl cursor-pointer"><span
                                            class="w-full font-semibold text-base">{{__('front/home.välj')}} {{ $package[1]->name }}</span>
                                        <svg class="inline-block h-6" viewBox="0 0 24 25" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3 12.4999H21L14 19.4999M14 5.5L18 9.5" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </a>

                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- standard package -->
                <div
                    class="shadow-[0px_4px_16px_rgba(17,17,26,0.1),_0px_8px_24px_rgba(17,17,26,0.1),_0px_16px_56px_rgba(17,17,26,0.1)] rounded-[30px] md:rounded-[36px] bg-[#FAFAFA] overflow-hidden border-[1px] border-gray-200 p-8 relative">
                    <div class="h-full">
                        <div class="h-full z-10 relative">
                            <div class="flex flex-col flex-1 justify-between h-full space-y-5">
                                <div class="flex justify-between flex-col">
                                    <div class="text-xl md:text-2xl font-bold text-gray-900 flex justify-between">
                                        <span>{{ $package[0]->name }}</span>
                                        <svg class="h-6 w-6 animate-ping-slow text-gray-500" viewBox="0 0 50 50"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M30.5 25C30.5 28.0376 28.0376 30.5 25 30.5C21.9624 30.5 19.5 28.0376 19.5 25C19.5 21.9624 21.9624 19.5 25 19.5C28.0376 19.5 30.5 21.9624 30.5 25Z"
                                                stroke="currentColor" stroke-opacity="0.7" stroke-width="4"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path
                                                d="M38.75 25C38.75 32.5939 32.5939 38.75 25 38.75C17.4061 38.75 11.25 32.5939 11.25 25C11.25 17.4061 17.4061 11.25 25 11.25C32.5939 11.25 38.75 17.4061 38.75 25Z"
                                                stroke="currentColor" stroke-opacity="0.4" stroke-width="4.5"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path
                                                d="M47.5 25C47.5 37.4264 37.4264 47.5 25 47.5C12.5736 47.5 2.5 37.4264 2.5 25C2.5 12.5736 12.5736 2.5 25 2.5C37.4264 2.5 47.5 12.5736 47.5 25Z"
                                                stroke="currentColor" stroke-opacity="0.1" stroke-width="5"
                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                    <div class="pt-5 text-gray-500 font-medium text-base space-y-1">
                                        <div class="flex items-center align-bottom"><span class="pt-1.5">NOK</span>
                                            <div class="ml-1 mr-2 text-2xl md:text-3xl font-bold text-gray-900">
                                                <span>{{ $package[0]->price }}</span>
                                            </div><span class="pt-1.5">{{__('front/home.per_month')}}</span>
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
                                                <span>24/7 {{__('front/home.personal_service')}}</span>
                                            </li>


                                            <li class="flex items-center font-medium space-x-2 text-black">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.4444 3.03947C15.1056 2.37412 13.5965 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 11.6244 21.9793 11.2537 21.939 10.8889M9 11L12 14L22 4"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                                <span>{{__('front/home.get')}} {{ $package[0]->contract }} {{__('front/home.rental_contract')}} </span>
                                            </li>
                                            <li class="flex items-center font-medium space-x-2 text-black">
                                                <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16.4444 3.03947C15.1056 2.37412 13.5965 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 11.6244 21.9793 11.2537 21.939 10.8889M9 11L12 14L22 4"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg><span>{{__('front/home.money_back')}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="pt-2">
                                    @auth
                                        @php
                                            $subscription = App\Models\Subscription::where('user_id', auth()->id())->where('status', 'Active')->first();
                                        @endphp
                                    @if ($subscription && $subscription->package_id == $package[0]->id)
                                        <a href="{{route('user.invoice.cancel')}}"
                                            type="button"
                                            class="appearance-none inline-flex hover:shadow-2xl transition-all duration-300 hover:scale-105 items-center group space-x-2.5 bg-black text-white py-4 px-5 rounded-2xl cursor-pointer"><span
                                                class="w-full font-semibold text-base">iptal etmek</span>
                                            <svg class="inline-block h-6" viewBox="0 0 24 25" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3 12.4999H21L14 19.4999M14 5.5L18 9.5" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </a>
                                     @else
                                     <a href="{{ route('user.invoice.buy', $package[0]->id) }}"
                                            type="button"
                                            class="appearance-none inline-flex hover:shadow-2xl transition-all duration-300 hover:scale-105 items-center group space-x-2.5 bg-black text-white py-4 px-5 rounded-2xl cursor-pointer"><span
                                                class="w-full font-semibold text-base">{{__('front/home.välj')}} {{ $package[0]->name }}</span>
                                            <svg class="inline-block h-6" viewBox="0 0 24 25" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3 12.4999H21L14 19.4999M14 5.5L18 9.5" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </a>
                                     @endif
                                    
                                    @else
                                    <a href="{{ route('register') }}?package={{ $package[0]->id }}"
                                            type="button"
                                            class="appearance-none inline-flex hover:shadow-2xl transition-all duration-300 hover:scale-105 items-center group space-x-2.5 bg-black text-white py-4 px-5 rounded-2xl cursor-pointer"><span
                                                class="w-full font-semibold text-base">{{__('front/home.välj')}} {{ $package[0]->name }}</span>
                                            <svg class="inline-block h-6" viewBox="0 0 24 25" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M3 12.4999H21L14 19.4999M14 5.5L18 9.5" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </a>
                                     @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</section>

    <!-- faq page started from here -->
    <section id="faq">
        <div class="py-24 px-8 max-w-5xl mx-auto flex flex-col md:flex-row gap-12">
            <div class="flex flex-col text-left basis-1/2">
                <p class="inline-block font-semibold text-primary mb-4 text-center md:text-left">{{__('front/home.frequently_questions')}}
                </p>
                <p class="sm:text-4xl text-3xl font-extrabold text-base-content text-center md:text-left">{{__('front/home.frequently_questions_head')}}
                </p>
            </div>
            <ul class="basis-1/2">
                <li>
                    <button
                        class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10"
                        aria-expanded="false" onclick="toggleFAQ(this)">
                        <span class="flex-1 text-base-content">{{__('front/home.ques_1')}}</span>
                        <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center transition duration-200 ease-out false"></rect>
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
                        </svg>
                    </button>
                    <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                        style="transition: max-height 0.3s ease-in-out 0s;">
                        <div class="pb-5 leading-relaxed">
                            <div class="space-y-2 leading-relaxed">{{__('front/home.ans_1')}}</div>
                        </div>
                    </div>
                </li>
                <li>
                    <button
                        class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10"
                        aria-expanded="false" onclick="toggleFAQ(this)">
                        <span class="flex-1 text-base-content">{{__('front/home.ques_2')}}</span>
                        <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center transition duration-200 ease-out false"></rect>
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
                        </svg>
                    </button>
                    <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                        style="transition: max-height 0.3s ease-in-out 0s;">
                        <div class="pb-5 leading-relaxed">
                            <div class="space-y-2 leading-relaxed">{{__('front/home.ans_2')}}</div>
                        </div>
                    </div>
                </li>
                <li>
                    <button
                        class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10"
                        aria-expanded="false" onclick="toggleFAQ(this)">
                        <span class="flex-1 text-base-content">{{__('front/home.ques_3')}}</span>
                        <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center transition duration-200 ease-out false"></rect>
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
                        </svg>
                    </button>
                    <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                        style="transition: max-height 0.3s ease-in-out 0s;">
                        <div class="pb-5 leading-relaxed">
                            <div class="space-y-2 leading-relaxed">{{__('front/home.ans_3')}}</div>
                        </div>
                    </div>
                </li>
                <li>
                    <button
                        class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10"
                        aria-expanded="false" onclick="toggleFAQ(this)">
                        <span class="flex-1 text-base-content">{{__('front/home.ques_4')}}</span>
                        <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center transition duration-200 ease-out false"></rect>
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
                        </svg>
                    </button>
                    <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                        style="transition: max-height 0.3s ease-in-out 0s;">
                        <div class="pb-5 leading-relaxed">
                            <div class="space-y-2 leading-relaxed">{{__('front/home.ans_4')}}</div>
                        </div>
                    </div>
                </li>
                <li>
                    <button
                        class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10"
                        aria-expanded="false" onclick="toggleFAQ(this)">
                        <span class="flex-1 text-base-content">{{__('front/home.ques_5')}}</span>
                        <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center transition duration-200 ease-out false"></rect>
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
                        </svg>
                    </button>
                    <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                        style="transition: max-height 0.3s ease-in-out 0s;">
                        <div class="pb-5 leading-relaxed">
                            <div class="space-y-2 leading-relaxed">{{__('front/home.ans_5')}}</div>
                        </div>
                    </div>
                </li>
                <li>
                    <button
                        class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10"
                        aria-expanded="false" onclick="toggleFAQ(this)">
                        <span class="flex-1 text-base-content">{{__('front/home.ques_6')}}</span>
                        <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center transition duration-200 ease-out false"></rect>
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
                        </svg>
                    </button>
                    <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                        style="transition: max-height 0.3s ease-in-out 0s;">
                        <div class="pb-5 leading-relaxed">
                            <div class="space-y-2 leading-relaxed">{{__('front/home.ans_6')}}</div>
                        </div>
                    </div>
                </li>
                <li>
                    <button
                        class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10"
                        aria-expanded="false" onclick="toggleFAQ(this)">
                        <span class="flex-1 text-base-content">{{__('front/home.ques_7')}}</span>
                        <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center transition duration-200 ease-out false"></rect>
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
                        </svg>
                    </button>
                    <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                        style="transition: max-height 0.3s ease-in-out 0s;">
                        <div class="pb-5 leading-relaxed">
                            <div class="space-y-2 leading-relaxed">{{__('front/home.ans_7')}}</div>
                        </div>
                    </div>
                </li>
                <li>
                    <button
                        class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10"
                        aria-expanded="false" onclick="toggleFAQ(this)">
                        <span class="flex-1 text-base-content">{{__('front/home.ques_8')}}</span>
                        <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center transition duration-200 ease-out false"></rect>
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
                        </svg>
                    </button>
                    <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                        style="transition: max-height 0.3s ease-in-out 0s;">
                        <div class="pb-5 leading-relaxed">
                            <div class="space-y-2 leading-relaxed">{{__('front/home.ans_8')}}</div>
                        </div>
                    </div>
                </li>
                <li>
                    <button
                        class="relative flex gap-2 items-center w-full py-5 text-base font-semibold text-left border-t md:text-lg border-base-content/10"
                        aria-expanded="false" onclick="toggleFAQ(this)">
                        <span class="flex-1 text-base-content">{{__('front/home.ques_9')}}</span>
                        <svg class="flex-shrink-0 w-4 h-4 ml-auto fill-current" viewBox="0 0 16 16"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center transition duration-200 ease-out false"></rect>
                            <rect y="7" width="16" height="2" rx="1"
                                class="transform origin-center rotate-90 transition duration-200 ease-out false"></rect>
                        </svg>
                    </button>
                    <div class="transition-all duration-300 ease-in-out max-h-0 overflow-hidden"
                        style="transition: max-height 0.3s ease-in-out 0s;">
                        <div class="pb-5 leading-relaxed">
                            <div class="space-y-2 leading-relaxed">{{__('front/home.ans_9')}}</div>
                        </div>
                    </div>
                </li>

            </ul>
        </div>

        <script>
            function toggleFAQ(button) {
                const content = button.nextElementSibling;
                button.setAttribute("aria-expanded", button.getAttribute("aria-expanded") === "false" ? "true" : "false");
                content.style.maxHeight = button.getAttribute("aria-expanded") === "true" ? content.scrollHeight + "px" : "0";
            }
        </script>

    </section>
@endsection

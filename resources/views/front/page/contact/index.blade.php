@extends('front.layout.app')
@push('title')
    Contact
@endpush
@section('body')
    <!-- <section>
                                                                                        <div class="h-[400px] flex justify-center items-center">
                                                                                            <h2 class="font-medium font-primary text-4xl">Home > Contact</h2>
                                                                                        </div>
                                                                                    </section> -->


    <section>
        <div class="bg-cover w-100 h-[300px] lg:h-[600px] flex justify-center items-center flex-col"
            style="background-image: url({{ asset('Images/Stockholm-x-Home--1--.webp') }});">
            {{-- <span class="p-3 border">Kontakt</span> --}}
            <div class="w-full h-[300px] lg:h-[600px] flex justify-center items-center bg-black bg-opacity-70">
                <h2 class="lg:text-7xl md:text-4xl text-4xl text-white font-bold text-center pb-10 pt-3">{{ __('front/contact.banner_heading') }}
                </h2>
            </div>
        </div>
    </section>



    <!-- form section starts from here -->
    <section class="body-font relative bg-gray-900 text-gray-400 font-primary">

        <div class="w-10/12 mx-auto px-5 py-24">

            <div class="mb-12 flex w-full flex-col text-center">


                <p class="mx-auto text-base leading-relaxed lg:w-2/3">{{ __('front/contact.banner_sub_heading') }}
                </p>
            </div>

            <div class="flex w-full justify-center">
                <div class="-m-2 flex flex-wrap">
                    <form action="{{ route('contact.store') }}" method="post">
                        @csrf
                        <div class="p-2">
                            <div class="relative md:w-96">
                                <input type="text" id="name" name="name"
                                    class="peer w-full rounded border border-gray-700 bg-gray-800 bg-opacity-40 py-1 px-3 text-base leading-8 text-gray-100 placeholder-transparent outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-gray-900 focus:ring-2 focus:ring-indigo-900"
                                    placeholder="{{ __('front/contact.name') }}" />
                                <label for="name"
                                    class="absolute left-3 -top-6 bg-transparent text-sm leading-7 text-indigo-500 transition-all peer-placeholder-shown:left-3 peer-placeholder-shown:top-2 peer-placeholder-shown:bg-gray-900 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:left-3 peer-focus:-top-6 peer-focus:text-sm peer-focus:text-indigo-500">{{ __('front/contact.name') }}</label>
                            </div>
                        </div>
                        <div class=" p-2">
                            <div class="relative">
                                <input type="email" id="email" name="email"
                                    class="peer w-full rounded border border-gray-700 bg-gray-800 bg-opacity-40 py-1 px-3 text-base leading-8 text-gray-100 placeholder-transparent outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-gray-900 focus:ring-2 focus:ring-indigo-900"
                                    placeholder="{{ __('front/contact.email') }}" />
                                <label for="email"
                                    class="absolute left-3 -top-6 bg-transparent text-sm leading-7 text-indigo-500 transition-all peer-placeholder-shown:left-3 peer-placeholder-shown:top-2 peer-placeholder-shown:bg-gray-900 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:left-3 peer-focus:-top-6 peer-focus:text-sm peer-focus:text-indigo-500">{{ __('front/contact.email') }}</label>
                            </div>
                        </div>
                        <div class=" p-2">
                            <div class="relative">
                                <input type="text" id="subject" name="subject"
                                    class="peer w-full rounded border border-gray-700 bg-gray-800 bg-opacity-40 py-1 px-3 text-base leading-8 text-gray-100 placeholder-transparent outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-gray-900 focus:ring-2 focus:ring-indigo-900"
                                    placeholder="subject" />
                                <label for="subject"
                                    class="absolute left-3 -top-6 bg-transparent text-sm leading-7 text-indigo-500 transition-all peer-placeholder-shown:left-3 peer-placeholder-shown:top-2 peer-placeholder-shown:bg-gray-900 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:left-3 peer-focus:-top-6 peer-focus:text-sm peer-focus:text-indigo-500">{{ __('front/contact.subject') }}</label>
                            </div>
                        </div>
                        <div class="mt-4 w-full p-2">
                            <div class="relative">
                                <textarea id="message" name="message"
                                    class="peer h-32 w-full resize-none rounded border border-gray-700 bg-gray-800 bg-opacity-40 py-1 px-3 text-base leading-6 text-gray-100 placeholder-transparent outline-none transition-colors duration-200 ease-in-out focus:border-indigo-500 focus:bg-gray-900 focus:ring-2 focus:ring-indigo-900"
                                    placeholder="Message"></textarea>
                                <label for="message"
                                    class="absolute left-3 -top-6 bg-transparent text-sm leading-7 text-indigo-500 transition-all peer-placeholder-shown:left-3 peer-placeholder-shown:top-2 peer-placeholder-shown:bg-gray-900 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:left-3 peer-focus:-top-6 peer-focus:text-sm peer-focus:text-indigo-500">{{ __('front/contact.message') }}</label>
                            </div>
                        </div>
                        <div class="w-full p-2">
                            <button
                                class="mx-auto flex rounded border-0 bg-indigo-500 py-2 px-8 text-lg text-white hover:bg-indigo-600 focus:outline-none">{{ __('front/contact.send') }}</button>
                        </div>
                </div>
            </div>
            </form>

            <!-- <div class="flex justify-center flex-col py-20">
                                                                                                <span class="text-center p-2 text-white">Contact Informations</span>
                                                                                                <div class="flex justify-center">
                                                                                                    <span class="lg:text-7xl md:text-4xl text-4xl text-white font-bold text-center pb-10 pt-3">Feel free to contact Us anytime</span>
                                                                                                </div>
                                                                                                <div class="flex justify-between">
                                                                                                    <div class="border-[#45B3BA] border  px-14 py-20 text-white rounded">
                                                                                                        Info@BoRutan.se
                                                                                                    </div>
                                                                                                    <div class="border-[#45B3BA] border  px-14 py-20 text-white rounded">
                                                                                                    08 - 506 362 00
                                                                                                    </div>
                                                                                                    <div class="border-[#45B3BA] border  px-14 py-20 text-white rounded">
                                                                                                    Klarabergsviadukten 70,<br>
                                                                                                    111 64 Stockholm, Sweden
                                                                                                    </div>
                                                                                                    <div class=" border-[#45B3BA] border px-14 py-20 text-white rounded">
                                                                                                        Info@BoRutan.se
                                                                                                    </div>
                                                                                                    
                                                                                                </div>
                                                                                           </div> -->


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
